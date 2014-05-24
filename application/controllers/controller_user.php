<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_user extends CI_Controller 
{
	private function _create_post_facebook($post)
	{	
			$cod = $_SESSION['user']['cod'];
			$cod_social = $_SESSION['user']['cod_social'];
			$cod_post = $post['cod'];
			$text_post = $post['text'];
			$pic_post = $post['pic'];

			// Seteamos la config de facebook
			require_once(APPPATH.'libraries/facebook-3.2.3/src/facebook.php');
			define('_APPID','393545654112411');
			define('_SECRET','72017e7cd23f846dc371236324a1e5f3');
			define('_COOKIE',true);

			$_PERMISSIONS_APP_FACEBOOK = 'email, publish_stream, user_photos'; // Permisos de facebook
			$facebook = new Facebook(array('appId'=>_APPID,'secret'=>_SECRET,'cookie'=>_COOKIE));
			
			// obtenemos los permisos del usuario en facebook
			$sql = 'select user_photos,publish_stream from permissions where uid = '.$cod_social.'';
			$params = array(
			'method'=>'fql.query',
			'query'=>$sql
			);
			$data = $facebook->api($params);

			// Si no tiene los permisos, lo llevaremos a que los acepte.
			if($data[0]['user_photos']==0)
			{
				$url_login = $facebook->getLoginUrl(array('scope'=>$_PERMISSIONS_APP_FACEBOOK));
				redirect($url_login);	

			}elseif($data[0]['publish_stream']==0){

				$url_login = $facebook->getLoginUrl(array('scope'=>$_PERMISSIONS_APP_FACEBOOK));
				redirect($url_login);	
			}

			// Verificaremos si tiene un album creado
			// Obtenemos los albunes de fotos de el.
			$albums = $facebook->api('me/albums');
			$exist_album = FALSE;

			//Vemos si ya existe un album imfitt.com para obtener el id 
			foreach($albums['data'] as $album)
			{ // Recoreremos todos los albunes
				if($album['name']=='imfitt.com')
				{
					$exist_album = TRUE;
					$id_album_be=$album['id'];
				}
			}

			// Si el album no existe lo creamos :)
			if($exist_album==FALSE)
			{
				$data = $facebook->api('me/albums','POST',array(
														'name'=>'imfitt.com',
														'message'=>'www.imfitt.com'));
				$id_album_be  = $data['id'];
			}

			//Le avisamos a facebook que subiremos una foto 
	 		$facebook->setFileUploadSupport(true);

	 		// set message OJO .. HAY UN SALTO EN LINEA
	 		$message = $text_post.' 

			via: '.site_url('post/'.$cod_post);

			$photo_details = array(
				            'message'=>$message
		    	);

			$file = './images/sp/'.$pic_post.'';
	        $photo_details['image'] = '@' . realpath($file);

	        //Luego de esto enviamos a $facebook los datos de nuestra imagen
        	$upload_photo = $facebook->api('/'.$id_album_be.'/photos', 'post', $photo_details);

        	return true;
	}
	public function timeline()
	{
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}

		// creamos un token para el form que va hacia profile
		$tk = md5(time().'fit');
		$_SESSION['tk'][$tk]=$tk;

		// Obtener al usuario
		$cod = $_SESSION['user']['cod'];
		$gender = $_SESSION['user']['gender'];
		$fit = $_SESSION['user']['fit'];
		$process_postulation='0';
		
		$this->db->where('cod',$cod);
		$q=$this->db->get('user');
		$users = $q->result_array();
		$user=$users[0];

		// obtenemos si esta en proceso de postulacion
		if($fit=='0')
		{
			$this->db->where('cod_user',$cod);
			$this->db->where('reviced','0');
			$process_postulation = $this->db->count_all_results('postulation');
			if($process_postulation>0)
			{
				$process_postulation='1';
			}else{
				$process_postulation='0';
			}
		}
		$total_rows = '10';
		// obtener los post de las personas que el usuario sigue
		$sql = 'select p.cod,p.cod_user,u.name,u.pic,p.photo,p.text,date_format(date(p.date),"%d/%m/%Y") as date,p.total_pts,total_comments from post p inner join user u on p.cod_user = u.cod where cod_user in (select cod_user2 from follower where cod_user1='.$cod.') order by p.cod desc limit 0,'.$total_rows.'';
		$q=$this->db->query($sql);
		$posts = $q->result_array();
		// obtener los todos los mis likes de los post obtenidos
		$cods_posts = '';
		foreach($posts as $post)
		{
			$cods_posts=$cods_posts.','.$post['cod'];	
		}

		$sql = 'select * from pt where cod_post in (0'.$cods_posts.') and cod_user='.$cod.'';
		$q=$this->db->query($sql);
		$pts = $q->result_array();
		// Agregar like al el objeto post
		for($i=0;$i<count($posts);$i++)
		{
			// config like a 0
			$posts[$i]['pt']='0';

			foreach ($pts as $pt)
			{
				if($pt['cod_post']==$posts[$i]['cod'])
				{
					$posts[$i]['pt']='1';
				}
			}
		}
		// obtener usuarios "conoce"
		if(!empty($gender))
		{
			$this->db->where('gender !=',$gender);
		}
		$this->db->where('fit','1');
		$this->db->where('cod !=',$cod);
		$this->db->order_by('cod','RANDOM');
		$q = $this->db->get('user',6);
		$users_meet = $q->result_array();
		// shuffle($users_meet);

		// obtenemos las notificaciones no leidas para el menu
		$sql = 'select count(cod) as notifications from notification where cod_post in (select cod from post where cod_user = '.$cod.') and view="0" ';
		$q = $this->db->query($sql);
		$total_notifications = $q->result_array();
		$total_notifications =  $total_notifications[0]['notifications'];

		//obtenemos los usuarios fit para typeahead
		$this->db->where('fit','1');
		$this->db->select('cod,username,pic');
		$q=$this->db->get('user');
		$users_typeahead = $q->result_array();

		$local_typeahead = '[';
		foreach($users_typeahead as $user_typeahead)
		{
			// $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);
			// $name = htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');
			$local_typeahead.='{id:'.$user_typeahead['cod'].',username:"'.ucfirst($user_typeahead['username']).'",img:"'.base_url().'images/user/'.$user_typeahead['pic'].'_30x30.jpg"},';
		}
		$local_typeahead .= ']';
		// echo $local_typeahead;die();

		$data=array();
		$data['user']=$user;
		$data['tk']=$tk;
		$data['posts']=$posts;
		$data['users_meet']=$users_meet;
		$data['fit']=$fit;
		$data['total_notifications']=$total_notifications;
		$data['process_postulation']=$process_postulation;
		$data['local_typeahead']=$local_typeahead;


		$this->load->view('view_timeline',$data);
	}
	private function _create_post()
	{
		$tk = $this->input->post('tk');
		$cod = $_SESSION['user']['cod'];
		$me_name = $_SESSION['user']['name'];
		$me_username = $_SESSION['user']['username'];
		$fit = $_SESSION['user']['fit'];
		
		if($fit!='1')
		{
			die("error fit :'( , try again :)");	
		}

		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			die("error tk :'( , try again :)");	
		}
		//chequeamos si viene photo
		if(!empty($_FILES['photo']['name']))
		{
				$name_round = md5(time()); // nombre de la foto final
				// seteamos la subida de foto
				$config['upload_path'] = './images/sp/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '10240';
				$config['max_width'] = '3264';
				$config['max_height'] = '3264';
			    $ext = strtolower(end(explode('.',$_FILES['photo']['name'])));
				$config['file_name'] = $cod.'.'.$ext;
				$this->upload->initialize($config);
				$pic_big=$config['file_name'];


				// validamos la foto
				if($this->upload->do_upload('photo')==TRUE)
				{
					
					// si la foto es es validada la pasaremos a redimensionar
					$config['image_library'] = 'gd2';
					$config['source_image']	= $config['upload_path'].$config['file_name'];

					// subir imagen max 640px
					$config['new_image']=$config['upload_path'].$name_round.'_640x640.'.$ext;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 640;
					$config['height'] = 640;
					$config['quality'] = 100;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();

					// subir imagen max 160px
					$config['new_image']=$config['upload_path'].$name_round.'_160x160.'.$ext;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 160;
					$config['height'] = 160;
					$config['quality'] = 100;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();

					if($ext!='jpg')
					{	
							// si la extension no es jpg la redimensionaremos
							//640x640
							$source_image = './images/sp/'.$name_round.'_640x640.'.$ext;
							if(!$this->redimensionar($source_image ,640,640,'./images/sp/'.$name_round.'_640x640.jpg',100,FALSE))
							{
								show_error('error resize pic user 640x640');	
							}
							// eliminamos la foto
							unlink($source_image);
							//160x160
							$source_image = './images/sp/'.$name_round.'_160x160.'.$ext;
							if(!$this->redimensionar($source_image ,640,640,'./images/sp/'.$name_round.'_160x160.jpg',100,FALSE))
							{
								show_error('error resize pic user 640x640');	
							}
							// eliminamos la foto
							unlink($source_image);
					}
					// elimianos la foto molde (grande) independiente de la extension
					unlink('./images/sp/'.$config['file_name']);

					// creamos regla de validacion del texto
					$this->form_validation->set_rules('text', '', 'max_length[140]|trim');
					$this->form_validation->set_message('max_length', '%s no debe superar los 140 caracteres');

					// OJO QUE SI NO HAY TEXTO LA VALIDACION ES TRUE.
					if($this->form_validation->run() == TRUE)
					{	
						// subimos la foto a la base de datos
						$data=array();
						$data['cod_user']=$cod;
						$data['date']=$now = date("Y-m-d H:i:s");
						$data['text']=$this->input->post('text');
						$data['photo']=$name_round;
						$this->db->insert('post',$data);
						$id_post_inserted=$this->db->insert_id();
						// subimos la foto a facebook
						if(isset($_SESSION['user']['configuration']['fb_share_pic']) and $_SESSION['user']['configuration']['fb_share_pic']=='1')
						{
							$post=array();
							$post['cod']= $id_post_inserted;
							$post['text']= $data['text'];
							$post['pic'] = $data['photo'].'_640x640.jpg';
							$this->_create_post_facebook($post);
						}

						 // le avisamos a todos los usuarios que lo siguen y quieran que le avisen por correo.
						$sql = 'select u.email
						from follower f 
						inner join user_configuration c on f.cod_user1=c.cod_user
						inner join user u on u.cod=f.cod_user1
						where f.cod_user2 = '.$cod.' and c.em_newpic=1';
						$q=$this->db->query($sql);
						$destinatarios = $q->result_array();
						// verificamos si hay usuarios que lo siguen y quieren recibir el correo
						if(!empty($destinatarios))
						{
							$this->em_newpic($id_post_inserted,$cod,$me_name,$me_username,$destinatarios);
						}

						return TRUE;
					}// end validation text
				}
		}
	}
	public function profile()
	{
		// dado que el usuario puede o no puede estar logeado, inicializaremos variables
		$login=FALSE;
		$cod = ''; // cod my user
		$gender=''; // my sex
		$user=''; // obj user search
		$follow = '0'; // follow user
		$cod_url=$this->uri->segment(2); // cod user url
		$me='0'; // iniciador, no soy yo
		$total_notifications = '0'; // total de notificaciones
		$fit='0';
		$total_rows = 20;
		$local_typeahead = '';

		// Validamos si el usuario esta logeado
		if(isset($_SESSION['user']['cod']) and !empty($_SESSION['user']['cod']))
		{
			$login=TRUE;
		}

		// init default 0 .... (show message if upload done)
		$create_post = false;

		// Si el usuario logeado envia un post
		if($login==TRUE and $this->input->post())
		{
			if($this->_create_post()==TRUE)
			{
				$create_post = true; // show message if upload done
			}
		}
		// creamos un token
		$tk = md5(time().'fit');
		$_SESSION['tk'][$tk]=$tk;

		// Obtener al usuario si esta logeado
		if($login==TRUE)
		{
			$cod = $_SESSION['user']['cod'];
			$gender = $_SESSION['user']['gender'];
			$fit = $_SESSION['user']['fit'];
		}

		// verificamos si se busca el perfil de un usuario
		if(!empty($cod_url))
		{
			// validamos si soy el mismo
			if($login==TRUE and $cod_url==$cod)
			{
				redirect('profile');
			}
			// el usuario no soy yo
			// veamos si lo estoy siguiendo
			if($login==TRUE)
			{
				$this->db->where('cod_user1',$cod);
				$this->db->where('cod_user2',$cod_url);
				$q=$this->db->get('follower');
				if($q->num_rows()>0)
				{
					// lo estoy siguiendo
					$follow = '1';
					// follow = 0 esta iniciado al principio por default
				}
			}
			// el cod del usuario queda como cod_user
			$cod_user=$cod_url;
		}else{
			$cod_user=$cod;
			$me='1';
		}
		// obtenemos los datos de el usuario a buscar
		$this->db->where('cod',$cod_user);
		$q = $this->db->get('user');
		$users = $q->result_array();
		if(empty($users))
		{
			show_404();
		}	
		$user = $users[0];
		// obtenemos a todas las personas que sigue
		$this->db->where('cod_user1',$cod_user);
		$total_following=$this->db->count_all_results('follower');
		// obtenemos a todas las personas que lo siguen
		$this->db->where('cod_user2',$cod_user);
		$total_followers=$this->db->count_all_results('follower');
		// obtenemos a todos los post
		$this->db->where('cod_user',$cod_user);
		$total_post=$this->db->count_all_results('post');
		// obtenemos el total de puntos
		$sql ='select IFNULL(sum(total_pts),0) as pts from post where cod_user='.$cod_user.'';
		$q=$this->db->query($sql);
		$pts = $q->result_array();
		$total_pts = $pts[0]['pts'];
		// agregarle los totales al usuario como bjeto
		$user['total_following']=$total_following;
		$user['total_followers']=$total_followers;
		$user['total_post']=$total_post;
		$user['total_pts']=$total_pts;

		// obtener a todos los post
		$sql="select *,date_format(date(date),'%d %M %y') as date_format from post where cod_user=".$cod_user." order by cod desc limit 0,".$total_rows."";
		$q=$this->db->query($sql);
		$posts=$q->result_array();

		// obtener usuarios "conoce"
		if($login==TRUE)
		{
			if(!empty($gender))
			{
				$this->db->where('gender !=',$gender);
			}
			$this->db->where('cod !=',$cod);

		}
		$this->db->where('fit','1');
		$this->db->order_by('cod','RANDOM');
		$q = $this->db->get('user',6);
		$users_meet = $q->result_array();
		// shuffle($users_meet);

		if($login==TRUE)
		{
			// obtenemos las notificaciones no leidas para el menu
			$sql = 'select count(cod) as notifications from notification where cod_post in (select cod from post where cod_user = '.$cod.') and view="0" ';
			$q = $this->db->query($sql);
			$total_notifications = $q->result_array();
			$total_notifications =  $total_notifications[0]['notifications'];

				//obtenemos los usuarios fit para typeahead
				$this->db->where('fit','1');
				$this->db->select('cod,username,pic');
				$q=$this->db->get('user');
				$users_typeahead = $q->result_array();

				$local_typeahead = '[';
				foreach($users_typeahead as $userty)
				{
					// $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);
					// $name = htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');
					$local_typeahead.='{id:'.$userty['cod'].',username:"'.ucfirst($userty['username']).'",img:"'.base_url().'images/user/'.$userty['pic'].'_30x30.jpg"},';
				}
				$local_typeahead .= ']';
				// echo $local_typeahead;die();
		}

		$data = array();
		$data['user']=$user;
		$data['tk']=$tk;
		$data['me']=$me;
		$data['follow']=$follow;
		$data['posts']=$posts;
		$data['users_meet']=$users_meet;
		$data['create_post']=$create_post;
		$data['login']=$login;
		$data['total_notifications']=$total_notifications;
		$data['fit']=$fit;
		$data['local_typeahead']=$local_typeahead;
		$this->load->view('view_profile',$data);
	}
	public function discover()
	{
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}

		if($this->input->post())
		{
			$this->_create_post();
		}

		// creamos un token
		$tk = md5(time().'fit');
		$_SESSION['tk'][$tk]=$tk;

		// Obtener al usuario
		$cod = $_SESSION['user']['cod'];
		$gender = $_SESSION['user']['gender'];
		$fit = $_SESSION['user']['fit'];
		
		$this->db->where('cod',$cod);
		$q=$this->db->get('user');
		$users = $q->result_array();
		$user=$users[0];
		// total row ssql
		$total_rows = '10';

		// obtener los post de las personas independiente si sigue (Discover)
		$sql = 'select p.cod,p.cod_user,u.name,u.pic,p.photo,p.text,date_format(date(p.date),"%d/%m/%Y") as date,p.total_pts,total_comments from post p inner join user u on p.cod_user = u.cod where u.cod!='.$cod.' order by p.cod desc limit 0,'.$total_rows.'';
		$q=$this->db->query($sql);
		$posts = $q->result_array();

		// obtener los todos los mis likes de los post obtenidos
		$cods_posts = '';
		foreach($posts as $post)
		{
			$cods_posts=$cods_posts.','.$post['cod'];	
		}
		$sql = 'select * from pt where cod_post in (0'.$cods_posts.') and cod_user='.$cod.'';
		$q=$this->db->query($sql);
		$pts = $q->result_array();
		// Agregar like al el objeto post
		for($i=0;$i<count($posts);$i++)
		{
			// config like a 0
			$posts[$i]['pt']='0';

			foreach ($pts as $pt)
			{
				if($pt['cod_post']==$posts[$i]['cod'])
				{
					$posts[$i]['pt']='1';
				}
			}
		}
		// obtener usuarios "conoce"

		if(!empty($gender))
		{
			$this->db->where('gender !=',$gender);
		}
		$this->db->where('fit','1');
		$this->db->where('cod !=',$cod);
		$this->db->order_by('cod','RANDOM');
		$q = $this->db->get('user',6);
		$users_meet = $q->result_array();
		// shuffle($users_meet);

		// obtenemos las notificaciones no leidas para el menu
		$sql = 'select count(cod) as notifications from notification where cod_post in (select cod from post where cod_user = '.$cod.') and view="0" ';
		$q = $this->db->query($sql);
		$total_notifications = $q->result_array();
		$total_notifications =  $total_notifications[0]['notifications'];

		//obtenemos los usuarios fit para typeahead
		$this->db->where('fit','1');
		$this->db->select('cod,username,pic');
		$q=$this->db->get('user');
		$users_typeahead = $q->result_array();

		$local_typeahead = '[';
		foreach($users_typeahead as $user)
		{
			// $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);
			// $name = htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');
			$local_typeahead.='{id:'.$user['cod'].',username:"'.ucfirst($user['username']).'",img:"'.base_url().'images/user/'.$user['pic'].'_30x30.jpg"},';
		}
		$local_typeahead .= ']';
		// echo $local_typeahead;die();

		$data=array();
		$data['user']=$user;
		$data['tk']=$tk;
		$data['posts']=$posts;
		$data['users_meet']=$users_meet;
		$data['total_notifications']=$total_notifications;
		$data['fit']=$fit;
		$data['local_typeahead']=$local_typeahead;
		$this->load->view('view_discover',$data);
	}
	public function post()
	{
		// dado que el usuario puede o no puede estar logeado, inicializaremos variables
		$login = FALSE;
		$cod = '';
		$gender='';
		$user='';
		$total_notifications='0';
		$local_typeahead = '';

		// Validamos si el usuario esta logeado
		if(isset($_SESSION['user']['cod']) and !empty($_SESSION['user']['cod']))
		{
			$login=TRUE;
		}

		// creamos un token para el form que va hacia profile
		$tk = md5(time().'fit');
		$_SESSION['tk'][$tk]=$tk;

		// Obtener al usuario si esta logeado
		if ($login==TRUE)
		{
			$cod = $_SESSION['user']['cod'];
			$gender = $_SESSION['user']['gender'];
			$this->db->where('cod',$cod);
			$q=$this->db->get('user');
			$users = $q->result_array();
			$user=$users[0];
		}
		// Obtenemos el cod del post en url
		$cod_post=$this->uri->segment(2);

		// obtenemos el post by cod post
		$sql = 'select p.cod,p.cod_user,u.name,u.pic,p.photo,p.text,date_format(date(p.date),"%d/%m/%Y") as date,p.total_pts,total_comments from post p inner join user u on p.cod_user = u.cod where p.cod='.$cod_post.' order by p.cod desc';
		$q=$this->db->query($sql);
		$posts = $q->result_array();
		if(!empty($posts))
		{
			$post=$posts[0];
		}else{
			$post='';
		}

		if(!empty($post))
		{
			// obtenemos 20 comentarios como maximo
			$sql = 'select c.cod,u.cod as cod_user,u.name as user_name,u.pic as user_pic,u.username as user_username,c.text,c.date from comment c inner join user u on c.cod_user=u.cod where c.cod_post = '.$cod_post.' order by c.cod asc limit 20';
			$q=$this->db->query($sql);
			$comments = $q->result_array();
			$post['comments']=$comments;

			// Ver si le dimos Like la foto
			if($login==TRUE)
			{
				$this->db->where('cod_user',$cod);
				$this->db->where('cod_post',$cod_post);
				$count=$this->db->count_all_results('pt');
				if($count>0)
				{
					$post['pt']='1';
				}else{
					$post['pt']='0';
				}
			}
		}
		
		// obtener usuarios "conoce"
		if($login==TRUE)
		{
			if(!empty($gender))
			{
				$this->db->where('gender !=',$gender);
			}
			$this->db->where('cod !=',$cod);

		}
		$this->db->where('fit','1');
		$q = $this->db->get('user',6);
		$this->db->order_by('cod','RANDOM');
		$users_meet = $q->result_array();
		// shuffle($users_meet);
		if($login==TRUE)
		{
			// obtenemos las notificaciones no leidas para el menu
			$sql = 'select count(cod) as notifications from notification where cod_post in (select cod from post where cod_user = '.$cod.') and view="0" ';
			$q = $this->db->query($sql);
			$total_notifications = $q->result_array();
			$total_notifications =  $total_notifications[0]['notifications'];

			//obtenemos los usuarios fit para typeahead
				$this->db->where('fit','1');
				$this->db->select('cod,username,pic');
				$q=$this->db->get('user');
				$users_typeahead = $q->result_array();

				$local_typeahead = '[';
				foreach($users_typeahead as $userty)
				{
					// $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);
					// $name = htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');
					$local_typeahead.='{id:'.$userty['cod'].',username:"'.ucfirst($userty['username']).'",img:"'.base_url().'images/user/'.$userty['pic'].'_30x30.jpg"},';
				}
				$local_typeahead .= ']';
				// echo $local_typeahead;die();
		}

		$data=array();
		$data['login']=$login;
		$data['user']=$user;
		$data['tk']=$tk;
		$data['post']=$post;
		$data['users_meet']=$users_meet;
		$data['total_notifications']=$total_notifications;
		$data['local_typeahead']=$local_typeahead;
		$this->load->view('view_post',$data);
	}
	public function configuration()
	{
		$conf = FALSE;
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}

		if($this->input->post())
		{
			if($this->_configuration()==TRUE)
			{
				$conf=TRUE;
			}
		}

		// creamos un token
		$tk = md5(time().'fit');
		$_SESSION['tk'][$tk]=$tk;

		// Obtener al usuario
		$cod = $_SESSION['user']['cod'];
		// $sql = 'select *';
		$sql = 'select * from user u  inner join user_configuration c on u.cod=c.cod_user where u.cod='.$cod.'';
		$q=$this->db->query($sql);
		$users = $q->result_array();
		$user=$users[0];

		// obtenemos las notificaciones no leidas para el menu
		$sql = 'select count(cod) as notifications from notification where cod_post in (select cod from post where cod_user = '.$cod.') and view="0" ';
		$q = $this->db->query($sql);
		$total_notifications = $q->result_array();
		$total_notifications =  $total_notifications[0]['notifications'];

		//obtenemos los usuarios fit para typeahead
		$this->db->where('fit','1');
		$this->db->select('cod,username,pic');
		$q=$this->db->get('user');
		$users_typeahead = $q->result_array();
		$local_typeahead = '[';
		foreach($users_typeahead as $userty)
		{
			// $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);
			// $name = htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');
			$local_typeahead.='{id:'.$userty['cod'].',username:"'.ucfirst($userty['username']).'",img:"'.base_url().'images/user/'.$userty['pic'].'_30x30.jpg"},';
		}
		$local_typeahead .= ']';
		// echo $local_typeahead;die();
		
		// datos de vista
		$data=array();
		$data['user']=$user;
		$data['tk']=$tk;
		$data['total_notifications']=$total_notifications;
		$data['conf']=$conf;
		$data['local_typeahead']=$local_typeahead;
		// vista
		$this->load->view('view_configuration',$data);
	}
	private function _configuration()
	{
		$tk = $this->input->post('tk');
		$cod = $_SESSION['user']['cod'];

		// init
		$error_upload=TRUE;
		$error_text=TRUE;
		$send_pic=FALSE;

		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			die("error tk :'( , try again :)");	
		}

		//chequeamos si viene photo
		if(!empty($_FILES['new_pic']['name']))
		{		
				$send_pic=TRUE;
				$name_round = md5(time()); // nombre de la foto final
				// seteamos la subida de foto
				$config['upload_path'] = './images/user/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '1024';
				$config['max_width'] = '1024';
				$config['max_height'] = '1024';
			    $ext = strtolower(end(explode('.',$_FILES['new_pic']['name'])));
				$config['file_name'] = $cod.'.'.$ext;
				$this->upload->initialize($config);
				$pic_big=$config['file_name'];

				// validamos la foto
				if($this->upload->do_upload('new_pic')==TRUE)
				{
					// si la foto es es validada la pasaremos a redimensionar
					// si la foto es subida, la pasaremos a redimensionar
					$config['image_library'] = 'gd2';
					$config['source_image']	= $config['upload_path'].$config['file_name'];

					// subir imagen 100x100
					$config['new_image']=$config['upload_path'].$name_round.'_100x100.'.$ext;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 100;
					$config['height'] = 100;
					$config['quality'] = 100;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();
					// subir imagen 40x40
					$config['new_image']=$config['upload_path'].$name_round.'_40x40.'.$ext;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 40;
					$config['height'] = 40;
					$config['quality'] = 80;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();
					//subir imagen 30x30
					$config['new_image']=$config['upload_path'].$name_round.'_30x30.'.$ext;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 30;
					$config['height'] = 30;
					$config['quality'] = 80;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();
					// ahora pasaremos todas las fotos a jpg
					if($ext!='jpg')
					{
						// si la extension no es jpg la redimensionaremos
							//100x100
							$source_image = './images/user/'.$name_round.'_100x100.'.$ext;
							if(!$this->redimensionar($source_image ,100,100,'./images/user/'.$name_round.'_100x100.jpg',100,FALSE))
							{
								show_error('error resize pic user 100x100');	
							}
							// eliminamos la foto
							unlink($source_image);
							//40x40
							$source_image = './images/user/'.$name_round.'_40x40.'.$ext;
							if(!$this->redimensionar($source_image,40,40,'./images/user/'.$name_round.'_40x40.jpg',80,FALSE))
							{
								show_error('error resize pic user 40x40');	
							}
							unlink($source_image);
							//30x30
							$source_image = './images/user/'.$name_round.'_30x30.'.$ext;
							if(!$this->redimensionar($source_image,30,30,'./images/user/'.$name_round.'_30x30.jpg',80,FALSE))
							{
								show_error('error resize pic user 40x40');	
							}
							unlink($source_image);
					}

					// elimianos la foto molde (grande) independiente de la extension
					unlink('./images/user/'.$config['file_name']);

					// actualizar foto en la base de datos
					$data=array('pic'=>$name_round);
					$this->db->where('cod',$cod);
					$this->db->update('user',$data);
					$error_upload=FALSE;
				}
		}
		// creamos regla de validacion del texto
		$this->form_validation->set_rules('name', 'El nombre', 'required|max_length[50]|trim');
		$this->form_validation->set_rules('email', 'El correo', 'required|valid_email|trim');
		$this->form_validation->set_rules('description', 'La descripción', 'max_length[150]|trim');

		$this->form_validation->set_message('required', '%s es requerido');
		$this->form_validation->set_message('email', '%s no es valido');
		$this->form_validation->set_message('max_length', '%s no debe superar los 50 caracteres');

		if($this->form_validation->run() == TRUE)
		{
			// datos personales
			$data=array();
			$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['description']=$this->input->post('description');
			$this->db->where('cod',$cod);
			$this->db->update('user',$data);

			// datos configuraciones
			$data=array();
			$data['fb_share_pic']=$this->input->post('share_pic_facebook')!==FALSE?'1':'0';
			$data['fb_get_noti_comments']=$this->input->post('get_noti_comments_facebook')!==FALSE?'1':'0';
			$data['fb_get_noti_mentions']=$this->input->post('get_noti_mentions_facebook')!==FALSE?'1':'0';
			$data['em_newpic']=$this->input->post('em_newpic')!==FALSE?'1':'0';
			$this->db->where('cod_user',$cod);
			$this->db->update('user_configuration',$data);

			// update configurations if it's create a new post
			$_SESSION['user']['name'] = $this->input->post('name');
			$_SESSION['user']['configuration']['fb_share_pic'] = $data['fb_share_pic'];
			$_SESSION['user']['configuration']['fb_get_noti_comments'] = $data['fb_get_noti_comments'];
			$_SESSION['user']['configuration']['fb_get_noti_mentions'] = $data['fb_get_noti_mentions'];
			$_SESSION['user']['configuration']['em_newpic'] = $data['em_newpic'];
			$error_text=FALSE;
		}

		// validate with pic
		if($send_pic==TRUE and $error_upload==FALSE and $error_text==FALSE)
		{
			return true;
		}
		// validate no pic
		if($send_pic==FALSE and $error_text==FALSE)
		{
			
			return true;
		}
	}
	public function notifications()
	{
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}
		// Obtener al usuario
		$cod = $_SESSION['user']['cod'];
		// obtenemos las notificaciones
		$sql = 'select n.*,u.pic,u.name,u.username from notification n inner join user u on u.cod = n.cod_user  where cod_post in (select cod from post where cod_user = '.$cod.') order by n.cod desc';
		$q = $this->db->query($sql);
		$notifications = $q->result_array();

		// obtenemos las notificaciones no leidas para el menu
		$sql = 'select count(cod) as notifications from notification where cod_post in (select cod from post where cod_user = '.$cod.') and view="0" ';
		$q = $this->db->query($sql);
		$total_notifications = $q->result_array();
		$total_notifications =  $total_notifications[0]['notifications'];

		// update view 1
		$data=array();
		$data['view']='1';
		$this->db->update('notification',$data);

		//obtenemos los usuarios fit para typeahead
		$this->db->where('fit','1');
		$this->db->select('cod,username,pic');
		$q=$this->db->get('user');
		$users_typeahead = $q->result_array();
		$local_typeahead = '[';
		foreach($users_typeahead as $userty)
		{
			// $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);
			// $name = htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');
			$local_typeahead.='{id:'.$userty['cod'].',username:"'.ucfirst($userty['username']).'",img:"'.base_url().'images/user/'.$userty['pic'].'_30x30.jpg"},';
		}
		$local_typeahead .= ']';
		// echo $local_typeahead;die();

		$data = array();
		$data['notifications']=$notifications;
		$data['total_notifications']=$total_notifications;
		$data['local_typeahead']=$local_typeahead;
		$this->load->view('view_notifications',$data);
	}
	private function redimensionar ($nombre_archivo,$ancho,$alto,$destino,$calidad,$redimension=TRUE)
	{	
			  $info = getimagesize($nombre_archivo);
			  switch($info['mime']){
				case 'image/jpeg':
				  $image = imagecreatefromjpeg($nombre_archivo);
				  break;
				case 'image/gif';
				  $image = imagecreatefromgif($nombre_archivo);
				  break;
				case 'image/png':
				  $image = imagecreatefrompng($nombre_archivo);
				  break;
			  }
			// Establecer un ancho y alto m&aacute;ximo
			
			// Tipo de contenido
			
			// Obtener las nuevas dimensiones
			list($ancho_orig, $alto_orig) = getimagesize($nombre_archivo);
			
			if($redimension==FALSE)
			{
				$ancho=$ancho_orig;
				$alto=$alto_orig;
			}
			// Redimensionar
			$image_p = imagecreatetruecolor($ancho, $alto);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $ancho, $alto, $ancho_orig, $alto_orig);
			
			// Imprimir
			imagejpeg($image_p,$destino,$calidad);

			return true;
	}
	private function em_newpic($post_id,$post_id_user,$post_name,$post_username,$destinatarios)
	{
		$arr_name = explode(' ',$post_name);
		$post_name=array_shift($arr_name);
		$user_link = base_url().'profile/'.$post_id_user.'/?from=em';
		$post_link = base_url().'post/'.$post_id.'/?from=em';

		// $this->load->view('view_emailpoints');

		require_once(APPPATH.'libraries/phpmailer/class.phpmailer.php');
		require_once(APPPATH.'libraries/phpmailer/language/phpmailer.lang-en.php');

		$mail = new PHPMailer();
		$mail->CharSet = "UTF-8";  
		$mail->Encoding = "quoted-printable";
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = "ccsaikoja@gmail.com"; // Correo completo a utilizar
		$mail->Password = "1973.perlita"; // Contraseña
		$mail->From = "no-reply@imfitt.com"; // Desde donde enviamos (Para mostrar)
		$mail->FromName = "Imfitt.com";
		$mail->IsHTML(true); // El correo se envía como HTML
		// $mail->AddAddress($recipient_emails);
		foreach($destinatarios as $destinatario)
		{
			if(empty($destinatario['email']))
			{
				continue;
			}
			$mail->AddAddress($destinatario['email']);
		}
		$mail->Subject = "¡@".ucfirst($post_username)." acaba de subir una nueva foto!"; // Este es el titulo del email.

		$body = '
				
				<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto;border:1px solid #ccc" bgcolor="#ffffff">
	<tbody>
		<tr>
			<td align="center" bgcolor="#ff0000" height="40" style="margin:0px;padding:0px">
				<img src="http://www.imfitt.com/images/logo_mini_40.png" alt="" style="margin:0px;padding:0px">
			</td>
		</tr>
		<tr>
			<td bgcolor="#fafafa" height="40" style="margin:0px;padding:5px 20px;font-family:Lucida Sans Unicode;font-size:13px">
				<p style="color:#666">
					Hola!<br>
					Te queremos informar que <a href="'.$user_link.'" style="font-family:arial;text-decoration:none;font-weight:bold;color:#da2424">'.ucwords($post_name).' @'.ucwords($post_username).'</a> (persona a la cual sigues) acaba de subir una nueva foto.
					Puedes verla en el siguiente enlace:
					<a href="'.$post_link.'">'.$post_link.'</a>
					<br>
					No te la puedes perder!<br><br>
					Saludos!<br>
					Atentamente,<br> 
					El equipo Imfitt.com
				</p>
			</td>
		</tr>
	</tbody>
	</table>		
	';
	$mail->Body = $body; // Mensaje a enviar
	$mail->AltBody = 'Hola!

	Te queremos informar que '.$post_name.' @'.$post_username.' (persona cual sigues) acaba de subir una nueva foto.

	Puedes verla en el siguiente enlace: '.$post_link.'

	No te la puedes perder!

	Saludos!
	Atentamente
	El quipo Imfitt.com
	';

	$exito = $mail->Send(); // Envía el correo.
	if(!$exito)
	{
		echo 'Tu foto fue subida con exito, pero ocurrio un problema al enviar el correo electronico a tus seguidores.';
		echo '<hr>';
		echo $mail->ErrorInfo;
		die();
	}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */