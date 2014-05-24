<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_home extends CI_Controller 
{
	public function index()
	{
		// Validamos si el usuario esta logeado
		if(isset($_SESSION['user']['cod']) and !empty($_SESSION['user']['cod']))
		{
			redirect('username'); // index
		}

		$this->load->view('view_index');
	}
	public function test()
	{
		die(':)');
		phpinfo();
	}
	public function emailpoints()
	{
		// $this->load->view('view_emailpoints');
		die('Format first :)');
		// $email_destinatario = 'exitoso_17-@hotmail.com';
		$name_destinatario = 'Boris';
		$email_destinatario = 'josemiguelllanosjara@gmail.com';
		$username_points='Conoconito';
		$name_points = 'Constanza';
		$points = '22';
		$codigo_user_points = '17';

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
		$mail->AddAddress($email_destinatario);
		$mail->Subject = "¡".$name_points." @".ucfirst($username_points)." tiene mas puntos que tu! Que no te supere por más!"; // Este es el titulo del email.

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
					Hola '.$name_destinatario.'!<br>
					Tu amigo <a href="http://www.imfitt.com/profile/'.$codigo_user_points.'/?from=em&action=points" style="font-family:arial;text-decoration:none;font-weight:bold;color:#da2424">'.$name_points.' '.$username_points.'</a> ya tiene '.$points.' puntos en Imfitt!<br>
					No dejes que te supere por más!<br>
					Entra ya a <a href="http://www.imfitt.com/?from=em&action=points">www.imfitt.com</a> y gana todos los puntos que puedas!
					<br>
					<br>
					No pierdas el tiempo!
					<br>
					<br>
					Saludos!<br>
					Atentamente,<br>
					El equipo Imfitt.
				</p>
			</td>
		</tr>
	</tbody>
	</table>
	';
	$mail->Body = $body; // Mensaje a enviar
	$mail->AltBody = '
					Hola '.$name_destinatario.'

					Tu amigo '.$name_points.' '.$username_points.' ya tiene '.$points.' puntos en Imfitt!
					No dejes que te supere por más! <br>
					Entra ya a http://www.imfitt.com/?from=em&action=points y empieza ganar puntos!
					<br>
					<br>
					No pierdas el tiempo!
					<br>
					<br>
					Saludos!<br>
					Atentamente,<br>
					El equipo Imfitt.
	';
	$exito = $mail->Send(); // Envía el correo
	die('Listo!');
	}
	public function facebooklike()
	{
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}
		// Validamos si esta previamente logeado
		require_once(APPPATH.'libraries/facebook-3.2.3/src/facebook.php');
		define('_APPID','393545654112411');
		define('_SECRET','72017e7cd23f846dc371236324a1e5f3');
		define('_COOKIE',true);
		// PERMISOS DE FACEBOOK... HEY ! no es necesario tenerlos en la pagina de facevook developers
		$_PERMISSIONS_APP_FACEBOOK = 'email, publish_stream, user_photos'; // Permisos de facebook

		/*Si el usuario no ha aceptado la aplicacion, y no ha iniciado session*/
		$facebook = new Facebook(array('appId'=>_APPID,'secret'=>_SECRET,'cookie'=>_COOKIE));

		$uid=$facebook->getUser();
		if(!$uid=$facebook->getUser())
		{
		 	$url_login = $facebook->getLoginUrl(array('scope'=>$_PERMISSIONS_APP_FACEBOOK));
		 	redirect($url_login);
		}
		// obtener ID
		
		$like = $facebook->api("me/likes/236451043196415");
		if(!empty($like['data']))
		{
			redirect('timeline');
		}

		$this->load->view('view_facebooklike');
	}
	public function username()
	{
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}
		// viene el username del formulario
		if($this->input->post())
		{
			$this->_username();
		}

		// creamos un token
		$tk = md5(time().'fit');
		$_SESSION['tk'][$tk]=$tk;

		// validamos si el usuario tiene un username
		$cod = $_SESSION['user']['cod'];
		$this->db->where('cod',$cod);
		$query = $this->db->get('user');
		$users = $query->result_array();
		// el usuario tiene un username
		if(!empty($users[0]['username']))
		{
			// El usuario ya se registro antiguamente...(OJO HAY DOS SCRIPT IGUALES AL DE ABAJO)
			if(isset($_SESSION['postulation']) and !empty($_SESSION['postulation']))
			{
				$_SESSION['postulation']=FALSE;
				redirect('postulation');
			}else{
				redirect('facebooklike');
			}
		}
		$name = explode(' ',$users[0]['name']);
		$name = array_shift($name);
		
		$data = array();
		$data['tk']=$tk;
		$data['name']=$name;
		$this->load->view('view_username',$data);
	}
	private function _username()
	{
		$tk = $this->input->post('tk');
		$cod = $_SESSION['user']['cod'];
		$username = strtolower($this->input->post('username'));

		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			die("error tk :'( , try again :)");	
		}

		// creamos regla de validacion
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|max_length[15]|trim');
		if($this->form_validation->run() == TRUE)
		{
			$this->db->where('username',$username );
			$q=$this->db->get('user');
			if($q->num_rows()>0)
			{
				die("User is not available");
			}
			$data=array('username'=>$username);
			$this->db->where('cod',$cod);
			$this->db->update('user',$data);
			
			// El usuario se acaba de registrar (OJO HAY DOS SCRIPT IGUALES AL DE ABAJO)
			if(isset($_SESSION['postulation']) and !empty($_SESSION['postulation']))
			{
				$_SESSION['postulation']=FALSE;
				redirect('postulation');
			}else{
				redirect('facebooklike');
			}
		}
	}
	public function loginfacebook()
	{
		$postulation = $this->uri->segment(2); // postulation
		$_SESSION['postulation']=$postulation;
		// login facebook
		// Validamos si esta previamente logeado
		require_once(APPPATH.'libraries/facebook-3.2.3/src/facebook.php');
		define('_APPID','393545654112411');
		define('_SECRET','72017e7cd23f846dc371236324a1e5f3');
		define('_COOKIE',true);
		// PERMISOS DE FACEBOOK... HEY ! no es necesario tenerlos en la pagina de facevook developers
		$_PERMISSIONS_APP_FACEBOOK = 'email, publish_stream, user_photos'; // Permisos de facebook

		/*Si el usuario no ha aceptado la aplicacion, y no ha iniciado session*/
		$facebook = new Facebook(array('appId'=>_APPID,'secret'=>_SECRET,'cookie'=>_COOKIE));

		$uid=$facebook->getUser();
		if(!$uid=$facebook->getUser())
		{
		 	$url_login = $facebook->getLoginUrl(array('scope'=>$_PERMISSIONS_APP_FACEBOOK));
		 	redirect($url_login);
		}
		
		// Desde ahora el usuario inicio session en facebook y acepto app
		// Verificar si el usuario esta registrado
		$sql = 'select u.*,c.em_newpic,c.fb_share_pic, fb_get_noti_comments, fb_get_noti_mentions FROM user u INNER JOIN user_configuration c ON c.cod_user = u.cod WHERE u.cod_social =  '.$uid.'';
		$query=$this->db->query($sql);
		// $this->db->where('cod_social',$uid);
		// $query = $this->db->get('user');
		$users = $query->result_array();

		
		if($query->num_rows==0)
		{
			// Usuario no esta registrado
			// Obtenemos los datos del usuario en facebook por API
			$sql = 'select uid,name,pic_big,email,sex from user where uid = '.$uid.'';
			$params = array(
				'method'=>'fql.query',
				'query'=>$sql
				);
			$data = $facebook->api($params);

			$cod_social_fb = (string) $data[0]['uid'];
			$name_fb = $data[0]['name'];
			$url_pic = $data[0]['pic_big']; // max 50x50
			$email_fb = $data[0]['email'];
			$gender_fb = $data[0]['sex'];
			$tokenaccess =  $facebook->getAccessToken();
			

			//Subimos la pic de el usuario de facebook al servidor (images/user/)
			$name_round = md5(time()); 
			$pic_big = $uid.'.jpg';

			if(!$get = file_get_contents($url_pic))
			{
				show_error('error get pic user facebook');
			}
			if(!file_put_contents('./images/user/'.$pic_big,$get))
			{
				show_error('error put puc user facebook');	
			}
			// redimensionar foto user 100x100
			// si la foto es es validada la pasaremos a redimensionar
			$config['image_library'] = 'gd2';
			$config['source_image']	= './images/user/'.$pic_big;
			// subir imagen max 110px
			$config['new_image']='./images/user/'.$name_round.'_100x100.jpg';
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 100;
			$config['height'] = 100;
			$config['quality'] = 100;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			// subir imagen max 110px
			$config['new_image']='./images/user/'.$name_round.'_40x40.jpg';
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 40;
			$config['height'] = 40;
			$config['quality'] = 80;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			// subir imagen max 110px
			$config['new_image']='./images/user/'.$name_round.'_30x30.jpg';
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 30;
			$config['height'] = 30;
			$config['quality'] = 70;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();


			// if(!$this->redimensionar('./images/user/'.$pic_big,100,100,'./images/user/'.$name_round.'_100x100.jpg',100))
			// {
			// 	show_error('error resize pic user 100x100');	
			// }
			// // redimensionar foto user 40x40
			// if(!$this->redimensionar('./images/user/'.$pic_big,40,40,'./images/user/'.$name_round.'_40x40.jpg',80))
			// {
			// 	show_error('error resize pic user 40x40');	
			// }
			// // redimensionar foto user 30x30
			// if(!$this->redimensionar('./images/user/'.$pic_big,30,30,'./images/user/'.$name_round.'_30x30.jpg',70))
			// {
			// 	show_error('error resize pic user 30x30');	
			// }
			// eliminamos pic_big (molde)
			unlink('./images/user/'.$pic_big);

			// Registramos al usuario con los datos de facebook
			$now = date("Y-m-d H:i:s");
			$data = array('cod_social'=>$cod_social_fb,'name'=>$name_fb,'pic'=>$name_round,'email'=>$email_fb,'gender'=>$gender_fb,'social_registered'=>'facebook','date_registered'=>$now,'token'=>$tokenaccess);
			$this->db->insert('user',$data);

			// le creamos las configuraciones.
			$data2 = array('cod_user'=>$this->db->insert_id());
			$this->db->insert('user_configuration',$data2);
			
			// El usuario ya fue registrado
			// obtenemos los permisos para ver si podemos postear en su muro
			$sql = 'select publish_stream from permissions where uid = '.$uid.'';
				$params = array(
				'method'=>'fql.query',
				'query'=>$sql
			);
			$data = $facebook->api($params);
				if($data[0]['publish_stream']==1)
				{// Tenemos los permisos para postear en el muro de el usuario
						
					$message_welcome = 'Los mejores físicos de tu ciudad en un solo lugar! Descúbrelos y cómetelos vivos!';
					try{
						$facebook->api('/me/feed', 'POST',
					                                   array(
													  'link'=>'http://bit.ly/1bn8QKw',
					                                   'message' => $message_welcome
					                                ));
						}catch(FacebookApiException $e)
						{
						  show_error('Problem post facebook user welcome');
						}
				}

				//Obtenemos los datos para el logeo de usurio
				// $this->db->where('cod_social',$uid);
				// $query = $this->db->get('user');
				$sql = 'select u.*,c.em_newpic, c.fb_share_pic, fb_get_noti_comments, fb_get_noti_mentions FROM user u INNER JOIN user_configuration c ON c.cod_user = u.cod WHERE u.cod_social =  '.$uid.'';
				$query=$this->db->query($sql);
				$users = $query->result_array();

		}else{
			// el usuario ya estaba registrado, actualizaremos ultimo ingreso
			$this->db->where('cod',$users[0]['cod']);
			$data=array();
			$data['last_login']=date("Y-m-d H:i:s");
			$this->db->update('user',$data);
		}// termino de registro del usuario
		// LOGIN 
		$_SESSION['user']['cod'] = $users[0]['cod'];
		$_SESSION['user']['cod_social'] = $users[0]['cod_social'];
		$_SESSION['user']['name'] = $users[0]['name'];
		$_SESSION['user']['username'] = $users[0]['username'];
		$_SESSION['user']['gender'] = $users[0]['gender'];
		$_SESSION['user']['fit'] = $users[0]['fit'];
		$_SESSION['user']['configuration']['fb_share_pic'] = $users[0]['fb_share_pic'];
		$_SESSION['user']['configuration']['fb_get_noti_comments'] = $users[0]['fb_get_noti_comments'];
		$_SESSION['user']['configuration']['fb_get_noti_mentions'] = $users[0]['fb_get_noti_mentions'];
		$_SESSION['user']['configuration']['em_newpic'] = $users[0]['em_newpic'];

		// Redireccionamos a username
		redirect('username');
	}
	public function logout()
	{
		$_SESSION=array();
		redirect('');
	}
	public function postulation()
	{	
		// Validamos si el usuario esta logeado
		if(!isset($_SESSION['user']['cod']) or empty($_SESSION['user']['cod']))
		{
			redirect(''); // index
		}
		// init erro upload
		$error_upload = '0';
		if($this->input->post())
		{
			if(!$this->_postulation()){
				$error_upload = '1';
			}
		}
		// creamos un token para las fotos de la postulacion
		$tk = md5(time().'fit');
		$_SESSION['tk'][$tk]=$tk;

		// Obtener al usuario
		$cod = $_SESSION['user']['cod'];
		$gender = $_SESSION['user']['gender'];
		$fit = $_SESSION['user']['fit'];

		// revisamos si el usuario esta en proceso de postulacion
		$this->db->where('cod_user',$cod);
		$this->db->where('reviced','0');
		$process_postulation = $this->db->count_all_results('postulation');

		// redireccionaremos si el usuario es fit y si esta postulando
		if($fit=='1' or $process_postulation>0)
		{
			redirect('');
		}

		$this->db->where('cod',$cod);
		$q=$this->db->get('user');
		$users = $q->result_array();
		$user=$users[0];

		$data = array();
		$data['user']=$user;
		$data['tk']=$tk;
		$data['error_upload']=$error_upload;
		$this->load->view('view_postulation',$data);
	}
	private function _postulation()
	{
		$tk = $this->input->post('tk');
		if(!isset($_SESSION['tk']) or empty($tk) or !array_key_exists($tk, $_SESSION['tk']))
		{
			die("error tk :'( , try again :)");	
		}
		//chequeamos si vienen las 5 photo
		// if(!empty($_FILES['photo']['name'][0]) and !empty($_FILES['photo']['name'][1]) and !empty($_FILES['photo']['name'][2]) and !empty($_FILES['photo']['name'][3]) and !empty($_FILES['photo']['name'][4]))
		// solo 1 foto
		if(!empty($_FILES['photo']['name'][0]))
		{
			$cod = $_SESSION['user']['cod'];

			for($i=0;$i<count($_FILES['photo']['name']);$i++)
			{
				$ext = strtolower(end(explode('.',$_FILES['photo']['name'][$i])));

				if($ext=='jpg' or $ext=='png')
				{
					$path_imgs_postulation = './images/ps/';
					$file_name = $cod.'_'.($i+1).'.'.'jpg';
					if(!$this->redimensionar($_FILES['photo']['tmp_name'][$i],600,500,$path_imgs_postulation.$file_name,100,false))
					{
						return false;
					}
				}else{
					return false;
				}
				
			}
			// las fotos fueron subidas con exito
			$data = array();
			$data['cod_user']=$cod;
			$data['date']=date("Y-m-d H:i:s");
			$this->db->insert('postulation',$data);
			redirect('timeline');
		}else{
			return false;
		}
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
	public function crop()
	{
		$this->load->view('view_crop');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */