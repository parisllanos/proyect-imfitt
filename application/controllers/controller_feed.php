<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_feed extends CI_Controller 
{
	public function following()
	{
		sleep(1);
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			die('error');
		}
		$tk =  $this->uri->segment(4);
		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			echo 'error';
			die();
		}
		$cod =  $this->uri->segment(3);
		$sql='select u.cod,u.name,u.username,u.pic from user u inner join follower f on u.cod=f.cod_user2 where f.cod_user1 = '.$cod.';';
		$q=$this->db->query($sql);
		$users = $q->result_array();

		foreach($users as $user){ ?>
			<a href="<?php echo base_url().'profile/'.$user['cod'];?>" style="text-decoration:none">
				<div style="position:relative;background-color:;width:100%;padding:5px 0 5px 0;min-height:40px;margin:0px 0 0 0;border-top:1px solid #eee;cursor:pointer">
					<?php  $pic=base_url().'images/user/'.$user['pic'].'_30x30.jpg'?>
					<?php  $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);?>
					<div class="img-user" style="margin:0 0 0 5px;width:30px;height:30px;background:#222 url('<?php echo $pic;?>') no-repeat center;position:absolute">
					</div>
					<p style="color:#444;;margin:0 0 0 40px;padding:4px 0 0 0"><span style="color:#d9534f;font-family:Arial;font-weight:bold;"><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8').'  @'.htmlentities(ucwords($user['username']),ENT_QUOTES,'UTF-8');?></span></p>
				</div>
			</a>
		<?php }
		die(); // end function
	}
	public function followers()
	{	
		sleep(1);
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			die('error');
		}
		$tk =  $this->uri->segment(4);
		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			echo 'error';
			die();
		}
		$cod =  $this->uri->segment(3);
		$sql='select u.cod,u.name,u.username,u.pic from user u inner join follower f on u.cod=f.cod_user1 where f.cod_user2 = '.$cod.';';
		$q=$this->db->query($sql);
		$users = $q->result_array();

		foreach($users as $user){ ?>
			<a href="<?php echo base_url().'profile/'.$user['cod'];?>" style="text-decoration:none">
				<div style="position:relative;background-color:;width:100%;padding:5px 0 5px 0;min-height:40px;margin:0px 0 0 0;border-top:1px solid #eee;cursor:pointer">
					<?php  $pic=base_url().'images/user/'.$user['pic'].'_30x30.jpg'?>
					<?php  $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);?>
					<div class="img-user" style="margin:0 0 0 5px;width:30px;height:30px;background:#222 url('<?php echo $pic;?>') no-repeat center;position:absolute">
					</div>
					<p style="color:#444;;margin:0 0 0 40px;padding:4px 0 0 0"><span style="color:#d9534f;font-family:Arial;font-weight:bold;"><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8').'  @'.htmlentities(ucwords($user['username']),ENT_QUOTES,'UTF-8');?></span></p>
				</div>
			</a>
		<?php }
		die(); // end function
	}
	public function follow()
	{
		sleep(1);
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}
		// validar token
		$tk =  $this->uri->segment(4);
		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			echo 'error';
			die();
		}
		// create comment post
		if($this->input->post())
		{
			$cod_user1 = $_SESSION['user']['cod'];
			$cod_user2 =  $this->uri->segment(3);

			$this->db->where('cod_user1',$cod_user1);
			$this->db->where('cod_user2',$cod_user2);
			$q=$this->db->get('follower');
			if($q->num_rows()>'0')
			{
				// die('seguiremos');
				// Unfollow
				$this->db->where('cod_user1',$cod_user1);
				$this->db->where('cod_user2',$cod_user2);
				$this->db->delete('follower');
				
			}else{
				// die('dejamos de seguiremos');
				// like
				$data=array();
				$data['cod_user1']=$cod_user1;
				$data['cod_user2']=$cod_user2;
				$this->db->insert('follower',$data);
			}
		}
		die(); // end function
	}
	public function username()
	{	
		sleep(1);
		if($this->input->post())
		{
			// Validamos si el usuario esta logeado
			if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
			{
				redirect(''); // index
			}
			// validar token
			$tk = $this->input->post('tk');
			if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
			{
				echo 'error';
				die();
			}
			// validar formulario
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|max-length[15]');
			if($this->form_validation->run() == FALSE)
			{
				echo 'error';
				die();
			}else{
				$this->db->where('username',$this->input->post('username'));
				$q=$this->db->get('user');
				if($q->num_rows()==0)
				{
					echo '1';
					die();
				}else{
					echo '0';
					die();
				}
			}
		}
		die(); // end function
	}
	public function comments()
	{
			sleep(1);
			// Validamos si el usuario esta logeado
			if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
			{
				redirect(''); // index
			}
			// validar token
			$tk =  $this->uri->segment(4);
			if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
			{
				echo 'error';
				die();
			}
			// create comment post
			if($this->input->post())
			{
				$this->_create_comment();
			}else{
				$this->_get_comments_post();
			}
		die(); // end function
	}
	private function _get_comments_post()
	{
		  // get cod_post
			$cod_post =  $this->uri->segment(3);
			$sql = 'select c.cod,u.cod as cod_user,u.name as user_name,u.pic as user_pic,u.username as user_username,c.text,c.date from comment c inner join user u on c.cod_user=u.cod where c.cod_post = '.$cod_post.' order by c.cod asc';
			$q=$this->db->query($sql);
			$comments = $q->result_array();
			
			foreach ($comments as $comment){ 
			?>
				<div class="user-comment" style="padding:5px 0;min-height:40px">
					<?php $url_pic = base_url().'images/user/'.$comment['user_pic'].'_30x30.jpg';?>
					<?php $arr_name = explode(' ',$comment['user_name']);$user_name_format=array_shift($arr_name);?>
					<div class="ph-user-comment" style="background:#222 url('<?php echo $url_pic;?>') no-repeat center;width:30px;height:30px;position:absolute;z-index:3"></div>
					<p style="padding:5px 0 0 0;line-height:15px;margin:0 0 0 40px;font-family:tahoma;font-size:14px;"><a href="<?php echo base_url().'profile/'.$comment['cod_user'];?>" style="color:#d9534f"><span style="color:#d9534f;font-family:Arial;"><strong><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></strong> <?php echo '@'.htmlentities(ucwords($comment['user_username']),ENT_QUOTES,'UTF-8');?></span></a> <?php echo htmlentities(ucfirst($comment['text']),ENT_QUOTES,'UTF-8');?></p>
				</div>
			<?php 
			}// end foreach
		die(); // end function
	}
	private function _create_comment()
	{
		$cod_user = $_SESSION['user']['cod'];
		$cod_post =  $this->uri->segment(3);
		$get_noti_comments = $_SESSION['user']['configuration']['fb_get_noti_comments'];
		$text = $this->input->post('text'); 	
		$this->form_validation->set_rules('text', '', 'max_length[140]|trim');

		if($this->form_validation->run() == FALSE)
		{
			die('validation');
		}

		$data = array();
		$data['cod_post']=$cod_post;
		$data['cod_user']=$cod_user;
		$data['text']=$text;
		$data['date']=date("Y-m-d H:i:s");
		$this->db->insert('comment',$data);
		$id = $this->db->insert_id();

		// incrementar total post mas 1 del post
		$this->db->query('update post set total_comments=total_comments+1 where cod = '.$cod_post.'');

		$sql = 'select c.cod,u.cod as cod_user,u.name as user_name,u.pic as user_pic,u.username as user_username,c.text,c.date,p.cod_user as cod_user_post,cog.fb_get_noti_comments as fb_noti_comments from comment c inner join user u on c.cod_user=u.cod inner join post p on p.cod=c.cod_post inner join user_configuration cog on cog.cod_user = p.cod_user where c.cod = '.$id.'';
		$q=$this->db->query($sql);
		$comments = $q->result_array();
		$comment=$comments[0];

		// create notification si el comentario no lo hice yo mismo
		if($comment['cod_user_post']!=$cod_user)
		{
			$data=array();
			$data['cod_user']=$cod_user;
			$data['cod_post']=$cod_post; // last post inserted
			$data['description']='ha comentado tu foto';
			$this->db->insert('notification',$data);

			// Crear comentario de facebook si el creador del post tiene el checkbox notificar x fb
			if($comment['fb_noti_comments']=='1')
			{
				$this->db->where('cod',$comment['cod_user_post']);
				$q=$this->db->get('user');
				$users = $q->result_array();
				$user = $users[0];
				$post = array();
				$post['cod_post']=$cod_post;
				$post['cod_creator_post']=$comment['cod_user_post'];
				$post['cod_social_creator_post']=$user['cod_social'];
				$post['cod_creator_comment']=$comment['cod_user']; // me
				$post['name_creator_comment']=$comment['user_name']; // me

				$this->_fb_noti_comments($post);
			}
		}

		?>
		<div class="user-comment" style="padding:5px 0;min-height:40px">
			<?php $url_pic = base_url().'images/user/'.$comment['user_pic'].'_30x30.jpg';?>
			<?php $arr_name = explode(' ',$comment['user_name']);$user_name_format=array_shift($arr_name);?>
			<div class="ph-user-comment" style="background:#222 url('<?php echo $url_pic;?>');width:30px;height:30px;position:absolute;z-index:3"></div>
			<p style="padding:5px 0 0 0;line-height:15px;margin:0 0 0 40px;font-family:tahoma;font-size:14px;"><a href="<?php echo base_url().'profile/'.$comment['cod_user'];?>" style="color:#d9534f"><span style="color:#d9534f;font-family:Arial;"><strong><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></strong> <?php echo '@'.htmlentities(ucwords($comment['user_username']),ENT_QUOTES,'UTF-8');?></span></a> <?php echo htmlentities(ucfirst($comment['text']),ENT_QUOTES,'UTF-8');?></p>
		</div>
		<?php 
		die(); // end function
	}
	private function _fb_noti_comments($post)
	{
		// Seteamos la config de facebook
		$cod_post = $post['cod_post'];
		$cod_creator_post = $post['cod_creator_post'];
		$cod_social_creator_post = $post['cod_social_creator_post'];
		$name_creator_comment = $post['name_creator_comment']; // me
		$cod_creator_comment = $post['cod_creator_comment']; // me
		
		$arr = explode(' ',$name_creator_comment);
		if(count($arr)>1)
		{
			$name_creator_comment=$arr[0].' '.$arr[1];
		}else{
			$name_creator_comment=$arr[0];
		}


		// Validamo si esta previamente logeado
		require_once(APPPATH.'libraries/facebook-3.2.3/src/facebook.php');
		define('_APPID','393545654112411');
		define('_SECRET','72017e7cd23f846dc371236324a1e5f3');
		define('_COOKIE',true);
		/*Si el usuario no ha aceptado la aplicacion, y no ha iniciado session*/
		$facebook = new Facebook(array('appId'=>_APPID,'secret'=>_SECRET,'cookie'=>_COOKIE));

		$token_url =  "https://graph.facebook.com/oauth/access_token?" .
                "client_id=" . _APPID .
                "&client_secret=" . _SECRET .
                "&grant_type=client_credentials";
        $resp = file_get_contents($token_url);
		$arr = explode('=', $resp);
		$app_access_token = $arr[1];

		try {
				 $response = $facebook->api( '/'.$cod_social_creator_post.'/notifications/', 'POST', array(

            	'template' => ''.$name_creator_comment.' commented your photo.',

            	'href' => '?action=post&cod_post='.$cod_post.'',

            	'access_token' => $app_access_token
        		));

		 } catch (Exception $e){
		// 	     //write log
		 	
		 	die('error notification facebook');
		 }

	}
	public function pts()
	{		
			// Validamos si el usuario esta logeado
			if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
			{
				redirect(''); // index
			}
			// validar token
			$tk =  $this->uri->segment(4);
			if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
			{
				echo 'error';
				die();
			}
			if($this->input->post())
			{
				// validamos un tk que viene por medio de post, el de arriba es get
				$tk2 = $this->input->post('tk');
				if(!isset($_SESSION['tk']) or empty($tk2) or !array_key_exists($tk2, $_SESSION['tk']))
				{
					echo 'error';
					die();
				}

				$cod_user = $_SESSION['user']['cod'];
				$cod_post =  $this->uri->segment(3);

				$this->db->where('cod_post',$cod_post);
				$this->db->where('cod_user',$cod_user);
				$q=$this->db->get('pt');
				if($q->num_rows() > '0')
				{
					// unlike
					$this->db->where('cod_post',$cod_post);
					$this->db->where('cod_user',$cod_user);
					$this->db->delete('pt');
					// set total pts on post
					$sql = 'update post set total_pts=total_pts-1 where cod='.$cod_post.'';
					$this->db->query($sql);
				}else{
					// like
					$data=array();
					$data['cod_post']=$cod_post;
					$data['cod_user']=$cod_user;
					$this->db->insert('pt',$data);
					// set total pts on post
					$sql = 'update post set total_pts=total_pts+1 where cod='.$cod_post.'';
					$this->db->query($sql);
				}
			}
		die(); // end function
	}
	public function post()
	{
		// Dado que el usuario puede obtener el post sin estar logeado en profile no validamos un usuario logeado
		sleep(1);
		// validar token
		$tk =  $this->uri->segment(4);
		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			die('error');
		}
		if($this->input->post())
		{	
			// no validamos usuarios ya que profile es abierto
			if($this->input->post('action')=='posts_profile'){
				$this->_get_posts_profile();
			}
			// Validamos si el usuario esta logeado aqui y no arriba ya que puede pedir post sin login
			if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
			{
				die('error');
			}
			// no validamos ya que 
			if($this->input->post('action')=='posts_discover'){
				$this->_get_posts_discover();
			}
			if($this->input->post('action')=='posts_timeline'){
				$this->_get_posts_timeline();
			}
			if($this->input->post('action')=='delete'){
				$this->_delete_post_by_id();
			}	
		}else{
			// obtenemos un post (carga en un modal)
			$this->_get_post_by_id();
		}
		die(); // end function
	}
	private function _get_posts_profile()
	{
		// dado que el usuario puede o no puede estar logeado, inicializaremos variables
		$login=FALSE;
		$cod_user = $this->input->post('cod_user');
		$num_load =  $this->uri->segment(3);
		$total_rows = 20;
		$offset = ($total_rows*$num_load);
		$me='0';

		// Validamos si el usuario esta logeado
		if(isset($_SESSION['user']['cod']) and !empty($_SESSION['user']['cod']))
		{
			$login=TRUE;
		}

		// Obtener al usuario si esta logeado
		if($login==TRUE)
		{
			$cod = $_SESSION['user']['cod'];
			$gender = $_SESSION['user']['gender'];
			$fit = $_SESSION['user']['fit'];
		}

		// verificamos si se busca el perfil de un usuario
		if($login==TRUE)
		{
			if($cod_user==$cod)
			{
				$me='1';
			}
		}
		// obtenemos los datos de el usuario a buscar
		$this->db->where('cod',$cod_user);
		$q = $this->db->get('user');
		$users = $q->result_array();
		if(empty($users))
		{
			die('error');
		}
		$user = $users[0];
		// // obtener a todos los post
		$sql='select *,date_format(date(date),"%d %M %y") as date_format from post where cod_user='.$cod_user.' order by cod desc limit '.$offset.','.$total_rows.'';
		$q=$this->db->query($sql);
		$posts=$q->result_array();
		if(empty($posts))
		{
			die('0');
		}else{
			foreach ($posts as $post)
			{ ?>
								<div id="container-photo-<?php echo $post['cod'];?>" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 single-user" style="display:none;text-align:center;padding-top:20px">
									<div style="display:inline-block;color:#777;background-color:white;width:184px;border:1px solid #ccc;">
										<div class="container-single-user" data-cod="<?php echo $post['cod'];?>">
											<!--date-->
											<p style="height:28px;margin:0px;text-align:center;line-height:29px;font-family: arial;font-size: 12px;font-weight: bold;"><?php echo $post['date_format'];?></p>
											<!--ph-->
											<?php $photo=base_url().'images/sp/'.$post['photo'].'_160x160.jpg'?>
											<div style="background:#222 url('<?php echo $photo;?>') center no-repeat;width:160px;height:160px;margin: 0 auto;"></div>
											<!--pts - comments-->
											<p style="height:28px;margin:0px;text-align:center;line-height:25px;font-family:Lucida Sans Unicode;font-size: 12px;"><span style="margin-right:5px"><i class="fa fa-plus"></i> <span id="photo-count-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></span></span> <span><i class="fa fa-comment"></i> <span id="photo-count-comments-<?php echo $post['cod'];?>"><?php echo $post['total_comments'];?></span></span></p>
										</div>
										<?php if($login==TRUE && $me=='1'){ ?>
										<p class="btn-delete" style="cursor:pointer;background-color:;height:28px;margin:0px;text-align:center;line-height:26px;font-family:Lucida Sans Unicode;font-size: 12px;" data-cod="<?php echo $post['cod'];?>">Eliminar</p>
										<?php } ?>
									</div>
								</div>
			<?php
			}
		}
		die();
	}
	private function _get_posts_discover()
	{
		// Obtener al usuario
		$cod = $_SESSION['user']['cod'];
		$gender = $_SESSION['user']['gender'];
		$fit = $_SESSION['user']['fit'];
		$num_load =  $this->uri->segment(3);
		$total_rows = 10;
		$offset = ($total_rows*$num_load);
		
		$this->db->where('cod',$cod);
		$q=$this->db->get('user');
		$users = $q->result_array();
		$user=$users[0];

		// obtener los post de las personas independiente si sigue (Discover)
		$sql = 'select p.cod,p.cod_user,u.name,u.pic,p.photo,p.text,date_format(date(p.date),"%d/%m/%Y") as date,p.total_pts,total_comments from post p inner join user u on p.cod_user = u.cod where u.cod!='.$cod.' order by p.cod desc limit '.$offset.','.$total_rows.'';
		$q=$this->db->query($sql);
		$posts = $q->result_array();

		// obtener los todos los mis likes de los post obtenidos
		$cods_posts = '';
		foreach($posts as $post)
		{
			$cods_posts=$cods_posts.','.$post['cod'];	
		}
		$sql = 'select * from pt where cod_post in (0'.$cods_posts.') and cod_user="6"';
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

		if(empty($posts))
		{
			die('0');
		}else{
			foreach ($posts as $post)
			{
			?>
			<!--Single user-->
						<div class="shadow single-user" style="width:100%;max-width:510px;background-color:white;margin:0 auto 30px auto;border:1px solid #aaa;">
							<!--head-->
							<div style="padding:10px;width:auto;background-color:white;min-height:60px;border-left:5px solid #d9534f;">
								<!--pic-->
								<?php $pic=base_url().'images/user/'.$post['pic'].'_40x40.jpg'?>
								<a href="<?php echo base_url().'profile/'.$post['cod_user'];?>">
									<div class="d-ph-user" style="width:40px;height:40px;background:#222 url('<?php echo $pic;?>') no-repeat center;float:left;clear:both;">
									</div>
								</a>
								<!--end pic-->
								<!--user data-->
								<div class="d-user-data" style="float:left">
									<?php $arr_name = explode(' ',$post['name']);$user_name_format=array_shift($arr_name);$user_name_format=$user_name_format.' '.array_shift($arr_name);?>
									<p class="d-user-data-name" style="margin: 0;font-family:tahoma;font-size:16px;padding:0 5px;"><i><a href="<?php echo base_url().'profile/'.$post['cod_user'];?>" style="color:#222;"><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></a></i></p>
									<p class="d-user-data-time" style="margin: 0;font-family:Lucida Sans Unicode;font-size:11px;padding:0 5px;line-height:10px"><?php echo $post['date'];?></p>
								</div>
								<!--end user data-->		
							</div>
							<!--end head-->
							<!--photo-->
							<div style="background-color:#222;">
							<?php $img=base_url().'images/sp/'.$post['photo'].'_640x640.jpg'?>
							<img src="<?php echo $img;?>" class="img-responsive" alt="" style="margin:0px auto;">
							</div>
							<!--photo-->
							<!--container-data count-->
							<div class="container-data" style="background-color:#222;height:auto;width:100%;border-top:4px solid #d9534f">
								<div>
									<!-- <p style="color:white;margin:0;padding:4px 20px 0 20px;width:50%;text-align:left;font-family:Lucida Sans Unicode;font-size:15px;position:absolute"><button style="margin-top:-35px;width:47px;height:47px;" class="disabled btn btn-default btn-lg"><i class="fa fa-comment"></i></button><i> <?php echo $post['total_comments'];?></i></p> -->
									<?php if($post['pt']=='1'){ ?>
									<p style="color:white;margin:0;padding:4px 20px 0 20px;width:100%;text-align:right;font-family:Lucida Sans Unicode;font-size:15px;"><i id="container-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></i></span><i>pts</i> <button style="margin-top:-35px;width:47px;height:47px;" data-pt="<?php echo $post['pt'];?>" class="btn btn-danger btn-lg btn-pt" data-cod="<?php echo $post['cod'];?>"><i class="fa fa-minus"></i></button></p>
									<?php }else{ ?>
									<p style="color:white;margin:0;padding:4px 20px 0 20px;width:100%;text-align:right;font-family:Lucida Sans Unicode;font-size:15px;"><i id="container-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></i></span><i>pts</i> <button style="margin-top:-35px;width:47px;height:47px;" data-pt="<?php echo $post['pt'];?>" class="btn btn-info btn-lg btn-pt" data-cod="<?php echo $post['cod'];?>"><i class="fa fa-plus"></i></button></p>
									<?php } ?>
								</div>
								<p style="font-style:italic;color:white;margin:0;padding:0px 25px 20px 25px;width:100%;"><small><i class="fa fa-chevron-right"></i></small> <?php echo htmlentities(ucfirst($post['text']),ENT_QUOTES,'UTF-8');?></p>
							</div>
							<!--end container data-->
							<!--comments-->
							<div class="container-comments container-comment-shadow" style="background-color:white;padding:0px 0px;">
								<?php if($post['total_comments']=='0'){$disabled_load_comments='disabled';$text_btn_load_comments='0 Comentarios';}else{$disabled_load_comments='';$text_btn_load_comments='Ver los '.$post['total_comments'].' Comentarios';} ?>
								<div id="container-loader-<?php echo $post['cod'];?>" style="text-align:center;display:none"><button class="btn btn-default btn-sm btn-block" style="border-radius:0px;padding:10px 0;"><img src="<?php echo base_url().'images/loader.gif';?>" alt=""></button></div>
								<div style="text-align:center"><button class="btn btn-default btn-sm btn-block btn-load-comments <?php echo $disabled_load_comments;?>" id="btn-load-comments-<?php echo $post['cod'];?>" data-cod="<?php echo $post['cod'];?>" style="border-top:none;border-radius:0px;padding:10px 0;"><strong><?php echo $text_btn_load_comments;?></strong></button></div>
								<div style="padding:15px 25px">
									<div class="comments" id="comments-<?php echo $post['cod'];?>" style="margin-bottom:10px;display:none;max-height:120px;overflow-y:auto;position:relative">
										<!--<div class="user-comment" style="padding:5px 0;min-height:40px">								
											<div class="ph-user-comment" style="background-color:#222;width:30px;height:30px;position:absolute;z-index:-1"></div>
											<p style="padding:5px 0 0 0;line-height:15px;margin:0 0 0 40px;font-family:tahoma;font-size:14px;"><span style="color:#d9534f;font-family:Arial;"><strong>Jose @ParisLlanos</strong></span> Lorem ipsum dolor sit amet addd ada ada, consectetur adipisicing elit. Earum unde adipisci quidem assumenda reiciendis ab in delectus totam laboriosam consectetur.</p>
										</div>-->
									</div>
									<div class="create-comment">
										<input type="text" data-cod="<?php echo $post['cod'];?>" class="input-create-comment form-control" maxlength="140" placeholder="Escribe un comentario..." style="margin:" name="text">
									</div>
								</div>
							</div>
							<!--end conmment-->
						</div>
						<!--end singler user-->
			<?php
			}
		}
		die(); // end function
	}
	private function _get_posts_timeline()
	{
		// Obtener al usuario
		$cod = $_SESSION['user']['cod'];
		$gender = $_SESSION['user']['gender'];
		$num_load =  $this->uri->segment(3);
		$total_rows = 10;
		$offset = ($total_rows*$num_load);


		$this->db->where('cod',$cod);
		$q=$this->db->get('user');
		$users = $q->result_array();
		$user=$users[0];

		// obtener los post de las personas que el usuario sigue
		$sql = 'select p.cod,p.cod_user,u.name,u.pic,p.photo,p.text,date_format(date(p.date),"%d/%m/%Y") as date,p.total_pts,total_comments from post p inner join user u on p.cod_user = u.cod where cod_user in (select cod_user2 from follower where cod_user1='.$cod.') order by p.cod desc limit '.$offset.','.$total_rows.'';
		$q=$this->db->query($sql);
		$posts = $q->result_array();

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
		if(empty($posts))
		{
			die('0');
		}else{
			foreach ($posts as $post)
			{
			?>
			<!--Single user-->
						<div class="shadow single-user" style="display:none;width:100%;max-width:510px;background-color:white;margin:0 auto 30px auto;border:1px solid #aaa;">
							<!--head-->
							<div style="padding:10px;width:auto;background-color:white;min-height:60px;border-left:5px solid #d9534f;">
								<!--pic-->
								<?php $pic=base_url().'images/user/'.$post['pic'].'_40x40.jpg'?>
								<a href="<?php echo base_url().'profile/'.$post['cod_user'];?>">
									<div class="d-ph-user" style="width:40px;height:40px;background:#222 url('<?php echo $pic;?>') no-repeat center;float:left;clear:both;">
									</div>
								</a>
								<!--end pic-->
								<!--user data-->
								<div class="d-user-data" style="float:left">
									<?php $arr_name = explode(' ',$post['name']);$user_name_format=array_shift($arr_name);$user_name_format=$user_name_format.' '.array_shift($arr_name);?>
									<p class="d-user-data-name" style="margin: 0;font-family:tahoma;font-size:16px;padding:0 5px;"><i><a href="<?php echo base_url().'profile/'.$post['cod_user'];?>" style="color:#222;"><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></a></i></p>
									<p class="d-user-data-time" style="margin: 0;font-family:Lucida Sans Unicode;font-size:11px;padding:0 5px;line-height:10px"><?php echo $post['date'];?></p>
								</div>
								<!--end user data-->		
							</div>
							<!--end head-->
							<!--photo-->
							<div style="background-color:#222;">
							<?php $img=base_url().'images/sp/'.$post['photo'].'_640x640.jpg'?>
							<img src="<?php echo $img; ?>" class="img-responsive" alt="" style="margin:0px auto;">
							</div>
							<!--photo-->
							<!--container-data count-->
							<div class="container-data" style="background-color:#222;height:auto;width:100%;border-top:4px solid #d9534f">
								<div>
									<!-- <p style="color:white;margin:0;padding:4px 20px 0 20px;width:50%;text-align:left;font-family:Lucida Sans Unicode;font-size:15px;position:absolute"><button style="margin-top:-35px;width:47px;height:47px;" class="disabled btn btn-default btn-lg"><i class="fa fa-comment"></i></button><i> <?php echo $post['total_comments'];?></i></p> -->
									<?php if($post['pt']=='1'){ ?>
									<p style="color:white;margin:0;padding:4px 20px 0 20px;width:100%;text-align:right;font-family:Lucida Sans Unicode;font-size:15px;"><i id="container-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></i></span><i>pts</i> <button style="margin-top:-35px;width:47px;height:47px;" data-pt="<?php echo $post['pt'];?>" class="btn btn-danger btn-lg btn-pt" data-cod="<?php echo $post['cod'];?>"><i class="fa fa-minus"></i></button></p>
									<?php }else{ ?>
									<p style="color:white;margin:0;padding:4px 20px 0 20px;width:100%;text-align:right;font-family:Lucida Sans Unicode;font-size:15px;"><i id="container-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></i></span><i>pts</i> <button style="margin-top:-35px;width:47px;height:47px;" data-pt="<?php echo $post['pt'];?>" class="btn btn-info btn-lg btn-pt" data-cod="<?php echo $post['cod'];?>"><i class="fa fa-plus"></i></button></p>
									<?php } ?>
								</div>
								<p style="font-style:italic;color:white;margin:0;padding:0px 25px 20px 25px;width:100%;"><small><i class="fa fa-chevron-right"></i></small> <?php echo htmlentities(ucfirst($post['text']),ENT_QUOTES,'UTF-8')?></p>
							</div>
							<!--end container data-->
							<!--comments-->
							<div class="container-comments container-comment-shadow" style="background-color:white;padding:0px 0px;">
								<?php if($post['total_comments']=='0'){$disabled_load_comments='disabled';$text_btn_load_comments='0 Comentarios';}else{$disabled_load_comments='';$text_btn_load_comments='Ver los '.$post['total_comments'].' Comentarios';} ?>
								<div id="container-loader-<?php echo $post['cod'];?>" style="text-align:center;display:none"><button class="btn btn-default btn-sm btn-block" style="border-radius:0px;padding:10px 0;"><img src="<?php echo base_url().'images/loader.gif';?>" alt=""></button></div>
								<div style="text-align:center"><button class="btn btn-default btn-sm btn-block btn-load-comments <?php echo $disabled_load_comments;?>" id="btn-load-comments-<?php echo $post['cod'];?>" data-cod="<?php echo $post['cod'];?>" style="border-top:none;border-radius:0px;padding:10px 0;"><strong><?php echo $text_btn_load_comments;?></strong></button></div>
								<div style="padding:15px 25px">
									<div class="comments" id="comments-<?php echo $post['cod'];?>" style="margin-bottom:10px;display:none;max-height:120px;overflow-y:auto;position:relative">
										<!--<div class="user-comment" style="padding:5px 0;min-height:40px">								
											<div class="ph-user-comment" style="background-color:#222;width:30px;height:30px;position:absolute;z-index:-1"></div>
											<p style="padding:5px 0 0 0;line-height:15px;margin:0 0 0 40px;font-family:tahoma;font-size:14px;"><span style="color:#d9534f;font-family:Arial;"><strong>Jose @ParisLlanos</strong></span> Lorem ipsum dolor sit amet addd ada ada, consectetur adipisicing elit. Earum unde adipisci quidem assumenda reiciendis ab in delectus totam laboriosam consectetur.</p>
										</div>-->
									</div>
									<div class="create-comment">
										<input type="text" data-cod="<?php echo $post['cod'];?>" class="input-create-comment form-control" maxlength="140" placeholder="Escribe un comentario..." style="margin:" name="text">
									</div>
								</div>
							</div>
							<!--end conmment-->
						</div>
					<!--end singler user-->
			<?php
			}
		}
		die(); // end function
	}
	private function _delete_post_by_id()
	{
		// ya se valido el login
		$cod = $_SESSION['user']['cod'];
		$cod_post =  $this->uri->segment(3);
		$sql = 'delete from post where cod='.$cod_post.' and cod_user='.$cod.'';
		$this->db->query($sql);

		die(); // end function
	}
	private function _get_post_by_id()
	{
		$cod_user='';
		$login = FALSE;
		$cod_post =  $this->uri->segment(3);
		
		if(isset($_SESSION['user']['cod']) and !empty($_SESSION['user']['cod']))
		{
				$login = TRUE;
		}

		if($login==TRUE)
		{
			$cod_user = $_SESSION['user']['cod'];
		}
		$sql = 'select p.cod, p.cod_user, u.name, u.pic, p.photo, p.text, date_format(date(p.date),"%d/%m/%Y") as date,p.total_pts,total_comments from post p inner join user u on p.cod_user = u.cod where p.cod='.$cod_post.' order by p.cod desc';
		$q=$this->db->query($sql);
		$posts=$q->result_array();
		if(empty($posts))
		{
			die('error');
		}
		$post=$posts[0];

		if($login)
		{
			// obtener si le di un like o no
			$this->db->where('cod_post',$cod_post);
			$this->db->where('cod_user',$cod_user);
			$pt=$this->db->count_all_results('pt');
			if($pt>0)
			{
				$post['pt']='1';
			}else{
				$post['pt']='0';
			}
		}

		?>		<!--btn close-->
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position:absolute;left:95%;top:10px;">&times;</button>
				<!--Single user-->
					<div style="width:100%;max-width:510px;background-color:white;margin:0 auto 10px auto;">
						<!--head-->
						<div style="padding:10px;width:auto;background-color:white;min-height:60px;border-left:5px solid #d9534f;">
							<!--pic-->
							<?php $pic=base_url().'images/user/'.$post['pic'].'_40x40.jpg'?>
							<a href="<?php echo base_url().'profile/'.$post['cod_user'];?>">
								<div class="d-ph-user" style="width:40px;height:40px;background:#222 url('<?php echo $pic;?>') no-repeat center;float:left;clear:both;">
								</div>
							</a>
							<!--end pic-->
							<!--user data-->
							<div class="d-user-data" style="float:left">
								<?php $arr_name = explode(' ',$post['name']);$user_name_format=array_shift($arr_name);$user_name_format=$user_name_format.' '.array_shift($arr_name);?>
								<p class="d-user-data-name" style="margin: 0;font-family:tahoma;font-size:16px;padding:0 5px;"><i><a href="<?php echo base_url().'profile/'.$post['cod_user'];?>" style="color:#222;"><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></a></i></p>
								<p class="d-user-data-time" style="margin: 0;font-family:Lucida Sans Unicode;font-size:11px;padding:0 5px;line-height:10px"><?php echo $post['date'];?></p>
							</div>
							<!--end user data-->		
						</div>
						<!--end head-->
						<!--photo-->
						<div style="background-color:#222;">
						<?php $img=base_url().'images/sp/'.$post['photo'].'_640x640.jpg'?>
						<img src="<?php echo $img;?>" class="img-responsive" alt="" style="margin:0px auto;">
						</div>
						<!--photo-->
						<!--container-data count-->
						<div class="container-data" style="background-color:#222;height:auto;width:100%;border-top:4px solid #d9534f">
							<div>
								<?php if($login){ ?>
									<!-- <p style="color:white;margin:0;padding:4px 20px 0 20px;width:50%;text-align:left;font-family:Lucida Sans Unicode;font-size:15px;position:absolute"><button style="margin-top:-35px;width:47px;height:47px;" class="disabled btn btn-default btn-lg"><i class="fa fa-comment"></i></button><i> <?php echo $post['total_comments'];?></i></p> -->
									<?php if($post['pt']=='1'){ ?>
									<p style="color:white;margin:0;padding:4px 20px 0 20px;width:100%;text-align:right;font-family:Lucida Sans Unicode;font-size:15px;"><i id="container-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></i></span><i>pts</i> <button style="margin-top:-35px;width:47px;height:47px;" data-pt="<?php echo $post['pt'];?>" class="btn btn-danger btn-lg btn-pt" data-cod="<?php echo $post['cod'];?>"><i class="fa fa-minus"></i></button></p>
									<?php }else{ ?>
									<p style="color:white;margin:0;padding:4px 20px 0 20px;width:100%;text-align:right;font-family:Lucida Sans Unicode;font-size:15px;"><i id="container-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></i></span><i>pts</i> <button style="margin-top:-35px;width:47px;height:47px;" data-pt="<?php echo $post['pt'];?>" class="btn btn-info btn-lg btn-pt" data-cod="<?php echo $post['cod'];?>"><i class="fa fa-plus"></i></button></p>
									<?php } ?>
								<?php }else{ ?>
									<p style="color:white;margin:0;padding:4px 20px 0 20px;width:100%;text-align:right;font-family:Lucida Sans Unicode;font-size:15px;"><i id="container-pts-<?php echo $post['cod'];?>"><?php echo $post['total_pts'];?></i></span><i>pts</i> <button style="margin-top:-35px;width:47px;height:47px;" class="btn btn-info btn-lg btn-modal-register"><i class="fa fa-plus"></i></button></p>
								<?php } ?>
							</div>
							<p style="font-style:italic;color:white;margin:0;padding:0px 25px 20px 25px;width:100%;"><small><i class="fa fa-chevron-right"></i></small> <?php echo htmlentities(ucfirst($post['text']),ENT_QUOTES,'UTF-8');?></p>
						</div>
						<!--end container data-->
						<!--comments-->
						<div class="container-comments container-comment-shadow" style="background-color:white;padding:0px 0px;">
							<?php if($post['total_comments']=='0'){$disabled_load_comments='disabled';$text_btn_load_comments='0 Comentarios';}else{$disabled_load_comments='';$text_btn_load_comments='Ver los '.$post['total_comments'].' Comentarios';} ?>
							<div id="container-loader-<?php echo $post['cod'];?>" style="text-align:center;display:none"><button class="btn btn-default btn-sm btn-block" style="border-radius:0px;padding:10px 0;"><img src="<?php echo base_url().'images/loader.gif';?>" alt=""></button></div>
							<div style="text-align:center"><button class="btn btn-default btn-sm btn-block btn-load-comments <?php echo $disabled_load_comments;?>" id="btn-load-comments-<?php echo $post['cod'];?>" data-cod="<?php echo $post['cod'];?>" style="border-top:none;border-radius:0px;padding:10px 0;"><strong><?php echo $text_btn_load_comments;?></strong></button></div>
							<div style="padding:15px 25px">
								<div class="comments" id="comments-<?php echo $post['cod'];?>" style="margin-bottom:10px;display:none;max-height:120px;overflow-y:auto;position:relative">
									<!--<div class="user-comment" style="padding:5px 0;min-height:40px">								
										<div class="ph-user-comment" style="background-color:#222;width:30px;height:30px;position:absolute;z-index:-1"></div>
										<p style="padding:5px 0 0 0;line-height:15px;margin:0 0 0 40px;font-family:tahoma;font-size:14px;"><span style="color:#d9534f;font-family:Arial;"><strong>Jose @ParisLlanos</strong></span> Lorem ipsum dolor sit amet addd ada ada, consectetur adipisicing elit. Earum unde adipisci quidem assumenda reiciendis ab in delectus totam laboriosam consectetur.</p>
									</div>-->
								</div>
								<div class="create-comment">
									<input type="text" data-cod="<?php echo $post['cod'];?>" class="input-create-comment form-control" maxlength="140" placeholder="Escribe un comentario..." style="margin:" name="text">
								</div>
							</div>
						</div>
						<!--end conmment-->
					</div>
					<!--end singler user-->
		<?php 
		die(); // end function
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */