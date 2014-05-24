<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" type="image/png">
	<meta property="og:title" content="imfitt"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.imfitt.com"/>
    <meta property="og:image" content="http://www.imfitt.com/images/logo_meta_facebook.png"/>
    <meta property="og:site_name" content="imfitt"/>
    <meta property="fb:admins" content="100002189287259"/>
    <meta property="og:description" content="imfitt es una exclusiva plataforma para personas FIT, entra y descubre a los cuerpos mas atractivos de tu ciudad!"/>
	<meta name="keywords" content="" /> 
	<meta name="description" content="imfitt es una exclusiva plataforma para personas FIT, entra y descubre a los cuerpos mas atractivos de tu ciudad!"/>
	  <!-- Bootstrap -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <style>
	body
	{
		background:#edeeef url('<?php echo base_url();?>images/background-center.png');
		/*background:#e0e1e2 url('images/background-center.png');*/
	}
	html,body
	{
		height:100% !important;
	}
	.shadow
	{
		-moz-box-shadow: 0px 0px 5px #aaa;
		-webkit-box-shadow: 0px 0px 5px #aaa;
		box-shadow: 0px 0px 5px #aaa;
	}
	.container-comment-shadow
	{
		-moz-box-shadow: inset 0px 7px 15px #ddd;;
		-webkit-box-shadow: inset 0px 7px 15px #ddd;;
		box-shadow: inset 0px 7px 15px #ddd;
	}
	@media(max-width:767px){
		.query-p{
			padding:0 0 0 0 ;
		}
	}
	@media(min-width:768px){
		.query-p{
			padding:0 0 0 0;
		}
	}
	@media(min-width:992px){
		.query-p{
			padding:30px 25px 0 25px;
		}
		.query-sidebar
		{
			margin-left:1.5%
		}
	}
	@media(min-width:1200px){
		.query-p{
			padding:30px 25px 0 25px;
		}
		.query-sidebar
		{
			margin-left:3%
		}
	}
	<?php if($login){ ?>
	/*typeahead form control*/
	.twitter-typeahead {
	    width: 100%;
	    position: relative;
	}
	.twitter-typeahead .tt-query,
	.twitter-typeahead .tt-hint {
	    margin-bottom: 0;
	    width:100%;
	    height: 34px;
	    position: absolute;
	    top:0;
	    left:0;
	    background-color:transparent !important;
	}
	.twitter-typeahead .tt-query
	{
		background-color:white !important;
	}
	.twitter-typeahead .tt-hint {
	    color:#a1a1a1;
	    z-index: 1;
	    padding: 6px 12px;
	    border:1px solid transparent;
	}
	.twitter-typeahead .tt-query {
	    z-index: 2;
	    border-radius: 4px!important;
	    /* add these 2 statements if you have an appended input group */
	    border-top-right-radius: 0!important;
	    border-bottom-right-radius: 0!important;
	    /* add these 2 statements if you have an prepended input group */
	   /*  border-top-left-radius: 0!important;
	    border-bottom-left-radius: 0!important; */
	}
	/*typeahead menu*/
	.tt-dropdown-menu {
	    min-width: 160px;
	    margin-top: 2px;
	    padding: 5px 0;
	    background-color: #fff;
	    border: 1px solid #ccc;
	    border: 1px solid rgba(0,0,0,.2);
	    *border-right-width: 2px;
	    *border-bottom-width: 2px;
	    -webkit-border-radius: 6px;
	    -moz-border-radius: 6px;
	    border-radius: 6px;
	    -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
	    -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
	    box-shadow: 0 5px 10px rgba(0,0,0,.2);
	    -webkit-background-clip: padding-box;
	    -moz-background-clip: padding;
	    background-clip: padding-box;
	    width: 100%;
	}

	.tt-suggestion {
	    display: block;
	    padding: 3px 20px;
	}

	.tt-suggestion.tt-is-under-cursor {
	    color: #fff;
	    background-color: #d9534f;
	}

	.tt-suggestion.tt-is-under-cursor a {
	    color: #fff;
	}

	.tt-suggestion p {
	    margin: 0;
	}
	<?php } ?>
    </style>
</head>
<body>
	<!-- Modal -->
	<?php if(!$login){?>
	<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close btn-close-problem" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h5 class="modal-title" id="myModalLabel" style="font-family:Lucida Sans Unicode;text-align:center;font-size:17px;">Entrar</h5>
	      </div>
	      <div class="modal-body">
	        <p style="font-family:Lucida Sans Unicode;text-align:center;font-size:13px;">Solo puedes comentar  y obsequiar puntos a usuarios si estás registrado.<br><br><a href="<?php echo base_url()?>loginfacebook"><button class="btn btn-danger btn-sm" style="font-size:13px">Estoy registrado!</button></a><br> o <br><a href="<?php echo base_url()?>loginfacebook"><button class="btn btn-danger btn-sm" style="font-size:13px;margin-top:4px;">Deseo Registrarme!</button></a></p>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<?php } ?>
	<?php if($login){ ?>
	<!--navbar mobile-->
	<div class="visible-xs navbar navbar-inverse navbar-fixed-top" style="padding:0px 10px;margin:0px;border-bottom:1px solid #222;font-family:Tahoma;">		
			<a href="<?php echo base_url();?>timeline" class="btn btn-link navbar-btn"><i class="glyphicon glyphicon-home fa-lg" style="color:#aaa"></i></a>
			<a href="<?php echo base_url();?>profile" class="btn btn-link navbar-btn"><i class="glyphicon glyphicon-user fa-lg" style="color:#aaa"></i></a>
			<a href="<?php echo base_url();?>discover" class="btn btn-link navbar-btn"><i class="glyphicon glyphicon-plus fa-lg" style="color:#aaa"></i></a>
			<!--btn collapse-->
			<button style="color:white;text-decoration:none" class="btn btn-link navbar-btn pull-right" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <i class="glyphicon glyphicon-cog fa-lg" style="color:#aaa"></i>
			    <?php if($total_notifications!='0'){ ?>
					<span class="label label-danger"><?php echo $total_notifications;?></span>
				<?php } ?>
			</button>
			<!--list collapse-->    
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form style="max-width:500px;" action="" class="navbar-form">
					<div class="input-group">
					    <input autocomplete="off" class="form-control typeahead" placeholder="Buscar"/>
					    <div class="input-group-btn">
					      	<button class="btn btn-danger disabled">
					        	<span class="glyphicon glyphicon-search"></span>
					        </button>
					    </div>
					</div>
				</form>
				<ul class="nav navbar-nav">
					<li>
						<a href="<?php echo base_url();?>notifications" style="text-align:center;">
							<i class="glyphicon glyphicon-bell fa-lg"></i>
							<?php if($total_notifications!='0'){ ?>
							    <span class="label label-danger"><?php echo $total_notifications;?></span>
							<?php } ?>
						</a>
					</li>
					<li><a href="<?php echo base_url();?>configuration" style="text-align:center;">Configuración</a></li>
					<li class="divider"></li>
     				<li><a href="<?php echo base_url();?>logout" style="text-align:center;">Salir</a></li>
     			</ul>
			</div>
	</div>
	<!--navbar-->
	<!--navbar desktop-->
	<div class="hidden-xs navbar navbar-inverse navbar-fixed-top" style="margin:0px;border-bottom:1px solid #222;font-family:Tahoma;">
		<div class="container">
				<div class="navbar-left">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url();?>timeline"><i class="glyphicon glyphicon-home fa-lg"></i></a></li>
						<li><a href="<?php echo base_url();?>profile"><i class="glyphicon glyphicon-user fa-lg"></i></a></li>
						<li><a href="<?php echo base_url();?>discover"><i class="glyphicon glyphicon-plus fa-lg"></i></a></li>
						<li>
							<a href="<?php echo base_url();?>notifications"><i class="glyphicon glyphicon-bell fa-lg"></i>
								<?php if($total_notifications!='0'){ ?>
							    <span class="label label-danger"><?php echo $total_notifications;?></span>
							    <?php } ?>
							</a>
						</li>
					</ul>
					<form style="max-width:500px;width:1000px" action="" class="navbar-form">
					   <div class="input-group">
					       <input autocomplete="off" class="form-control typeahead" placeholder="Buscar"/>
					       <div class="input-group-btn">
					           <button class="btn btn-danger disabled">
					           <span class="glyphicon glyphicon-search"></span>
					           </button>
					       </div>
					   </div>
					</form>
				</div>
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog fa-lg"></i></a>
					        <ul class="dropdown-menu">
					          <li><a href="<?php echo base_url();?>configuration">Configuración</a></li>
					          <li class="divider"></li>
					          <li><a href="<?php echo base_url();?>logout">Cerrar session</a></li>
					        </ul>
					     </li>
					</ul>
				</div>
		</div><!--end container-->
	</div>
	<?php }else{ ?>
	<!--navbar mobile-->
	<div class="visible-xs navbar navbar-inverse navbar-fixed-top" style="padding:0px 10px;margin:0px;border-bottom:1px solid #222;font-family:Tahoma;">
	<button class="btn btn-danger navbar-btn pull-right btn-home"><i class="glyphicon glyphicon-user fa-lg" style="color:white"></i> <strong>Entrar</strong></button>
	</div>
	<!--navbar desktop-->
	<div class="hidden-xs navbar navbar-inverse navbar-fixed-top" style="margin:0px;border-bottom:1px solid #222;font-family:Tahoma;">
		<div class="container">
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<li><button class="btn btn-danger navbar-btn btn-home"><i class="glyphicon glyphicon-user fa-lg"></i> <strong>Entrar</strong></button></li>
					</ul>
				</div>
		</div>
	</div>
	<?php } ?>
	<!--end navbar desktop navbar-->
	<div class="container" style="margin-top:51px;">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-1  hidden-xs"></div>
		<div class="col-lg-6 col-md-6 col-sm-10 col-xs-12" style="padding:0px;">
			<!--Center-->
			<div class="query-p" style="height:100%;background:#e0e1e2 url('<?php echo base_url();?>images/background-center.png');border-width:0 2px;border-color:#ccc;border-style:solid;">
				<?php if(empty($post)){ ?>
				<p style="text-align:center;margin-bottom:1000px;font-family:Lucida Sans Unicode;font-size:17px;color:#666"><small>Este post fue eliminado.</small><br><br><a href="<?php base_url();?>/discover" style="color:#444;text-decoration:none">Haz click aquí para descubrir los cuerpos más atractivos de este mundo.<br><i class="fa fa-plus fa-2x" id="this-icon-plus"></i></a></p>
				<?php }else{ ?>
					<!--Single user-->
					<div class="shadow" style="width:100%;max-width:510px;background-color:white;margin:0 auto 30px auto;border:1px solid #aaa;">
						<!--head-->
						<div style="padding:10px;width:auto;background-color:white;min-height:60px;border-left:5px solid #d9534f;">
							<!--pic-->
							<?php $pic=base_url().'images/user/'.$post['pic'].'_40x40.jpg' ?>
							<a href="<?php echo base_url().'profile/'.$post['cod_user'];?>">
								<div class="d-ph-user" style="width:40px;height:40px;background:#222 url('<?php echo $pic;?>') center no-repeat;float:left;clear:both;">
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
						<!--end photo-->
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
							<div id="container-loader-<?php echo $post['cod'];?>" style="text-align:center;display:none"><button class="btn btn-default btn-sm btn-block" style="border-radius:0px;padding:10px 0;"><img src="<?php echo base_url().'images/loader.gif';?>" alt=""></button></div>
							
							<?php
							// seteamos el boton total de comentarios
							 if($post['total_comments']=='0'){$disabled_load_comments='disabled';$text_btn_load_comments='0 Comentarios';}else{$disabled_load_comments='';$text_btn_load_comments='Ver mas comentarios';}
							?>
							<?php 
							// seteamos si el boton para cargar los comentarios sera visible si es mayor a los comentarisos iniciales maximo(20)
							if($post['total_comments']>count($post['comments'])){$btn_display='display:block';}else{$btn_display='display:none';}
							 ?>
							 <!--btn load comments-->
							<div style="text-align:center"><button class="btn btn-default btn-sm btn-block btn-load-comments <?php echo $disabled_load_comments;?>" id="btn-load-comments-<?php echo $post['cod'];?>" data-cod="<?php echo $post['cod'];?>" style="border-top:none;border-radius:0px;padding:10px 0;<?php echo $btn_display;?>"><strong><?php echo $text_btn_load_comments;?></strong></button></div>
							<div style="padding:15px 25px">
								<?php if(!empty($post['comments'])){$display_comments='display:block';}else{$display_comments='display:none';} ?>
								<div class="comments" id="comments-<?php echo $post['cod'];?>" style="margin-bottom:10px;max-height:120px;overflow-y:auto;position:relative">
									<?php foreach ($post['comments'] as $comment){ ?>
										<div class="user-comment" style="padding:5px 0;min-height:40px">
											<?php $url_pic = base_url().'images/user/'.$comment['user_pic'].'_30x30.jpg';?>
											<?php $arr_name = explode(' ',$comment['user_name']);$user_name_format=array_shift($arr_name);?>
											<div class="ph-user-comment" style="background:#222 url('<?php echo $url_pic;?>');width:30px;height:30px;position:absolute;z-index:3"></div>
											<p style="padding:5px 0 0 0;line-height:15px;margin:0 0 0 40px;font-family:tahoma;font-size:14px;"><a href="<?php echo base_url().'profile/'.$comment['cod_user'];?>" style="color:#d9534f"><span style="color:#d9534f;font-family:Arial;"><strong><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></strong> <?php echo '@'.htmlentities(ucwords($comment['user_username']),ENT_QUOTES,'UTF-8');?></span></a> <?php echo htmlentities(ucfirst($comment['text']),ENT_QUOTES,'UTF-8');?></p>
										</div>
									<?php } ?>
									<!--<div class="user-comment" style="padding:5px 0;min-height:40px">								
										<div class="ph-user-comment" style="background-color:#222;width:30px;height:30px;position:absolute;z-index:-1"></div>
										<p style="padding:5px 0 0 0;line-height:15px;margin:0 0 0 40px;font-family:tahoma;font-size:14px;"><span style="color:#d9534f;font-family:Arial;"><strong>Jose @ParisLlanos</strong></span> Lorem ipsum dolor sit amet addd ada ada, consectetur adipisicing elit. Earum unde adipisci quidem assumenda reiciendis ab in delectus totam laboriosam consectetur.</p>
									</div>-->
								</div>
								<div class="create-comment">
									<?php if($login){$data_login='1';}else{$data_login='0';}?>
									<input type="text" data-cod="<?php echo $post['cod'];?>" data-login="<?php echo $data_login;?>" class="input-create-comment form-control" maxlength="140" placeholder="Escribe un comentario..." style="margin:" name="text">
								</div>
							</div>
						</div>
						<!--end conmment-->
					</div>
					<!--end singler user-->
				<?php } ?><!--end post>0-->
			</div>
			<!--end center-->
		</div>
		<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<div class="sidebar query-sidebar" style="width:100%;max-width:220px;;border-right:1px solid #888;position:fixed;">
					<div style="height:10px"></div>
					<p class="head-sidebar" style="border-top:1px solid #888;border-left:5px solid #d9534f;padding:0 10px;color:#888;font-family:Arial;font-size:15px;margin:0 0 0 0;background-color:white;width:100%">
						<strong>Conoce</strong>
						<i class="fa fa-plus pull-right" style="margin-top:4px;color:#888"></i>
					</p>
					<div class="container-meet-user">
						<?php foreach ($users_meet as $user_meet){ ?>
							<div class="meet-user" style="padding:10px 0;border-top:1px solid #888;width:100%;">
								<!--photo-->
								<?php $pic=base_url().'images/user/'.$user_meet['pic'].'_40x40.jpg'?>
								<a href="<?php echo base_url().'profile/'.$user_meet['cod'];?>">
									<div class="meet-ph-user" style="width:40px;height: 40px;background:#222 url('<?php echo $pic;?>') center no-repeat;position:absolute"></div>
								</a>
								<!--Name-->
								<?php $arr_name = explode(' ',$user_meet['name']);$user_name_format=array_shift($arr_name);$user_name_format=$user_name_format.' '.array_shift($arr_name);?>
								<p class="meet-name-user" style="line-height:15px;font-family:tahoma;font-size:13px;margin:0 0 0 45px;min:width:100%;font-family:tahoma;min-height:40px;"><a href="<?php echo base_url().'profile/'.$user_meet['cod'];?>" style="color:#d9534f;"><strong><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></strong></a><br>@<?php echo htmlentities(ucwords($user_meet['username']),ENT_QUOTES,'UTF-8');?></p>
								<div style="clear:both"></div>
							</div>
						<?php } ?>
					</div>
				</div>
		</div>
	</div>
	<!-- line center -->
	</div>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-39149255-5', 'imfitt.com');
	  ga('send', 'pageview');

	</script>
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap-filestyle.min.js"></script>
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap-typeahead.min.js"></script>
	<script src="<?php echo base_url();?>js/hogan.js"></script>
	<script>
	var login = '<?php if($login){echo "1";}else{echo "0";};?>';
	var tk = '<?php echo $tk;?>';
	var base_url = '<?php echo base_url();?>';
	var bol_create_post = false;
	$(document).on('ready',function(){
		$('.btn-load-comments').on('click',load_comments);
		$('.input-create-comment').on('keypress',create_comment);
		$('.btn-pt').on('click',pt);
		$('.comments').scrollTop(1000000);
		$('.btn-home').on('click',home);
		$('body').on('click','.btn-modal-register',modal_register);
		activeTypeahead();
	});
	function modal_register()
	{
		$('#modal-register').modal();
	}
	function home()
	{
		location.href = base_url;
	}
	function activeTypeahead()
	{
		<?php if($login){ ?>
		$('.typeahead').typeahead({
			name:'pepi',
			valueKey:'username',
			limit:3,
			template: [                                                                 
		    '<img src="{{img}}" style="width:25px;height:25px;background:black;"> <p style="line-height:8px;display:inline-block;font-size:15px;">@{{username}}</p>',                              
		  	].join(''),                                                                 
		  	engine: Hogan, 
			local:<?php echo $local_typeahead;?>
		}).on('typeahead:selected',function(event,datum){
			location.href = base_url+'profile/'+datum.id;
			return;
		});
		<?php } ?>
	}
	function load_comments()
	{
		if(login=='0')
		{
			location.href = base_url;
			return;
		}
		var cod = $(this).attr('data-cod');
		var url = base_url+'feed/comments/'+cod+'/'+tk;
		// loader
		 $('#btn-load-comments-'+cod).css('display','none');
		 $('#container-loader-'+cod).css('display','block');

		// get comment
		$.get(url).done(function(resp){
			if(resp=='error')
			{
				alert('ha ocurrido un error, vuelve a intentarlo');
				$('#container-loader-'+cod).css('display','none');
				$('#btn-load-comments-'+cod).css('display','block');

			}else{
				// hidden btn load comment
				$('#btn-load-comments-'+cod).css('display','none');
				$('#container-loader-'+cod).css('display','none');
				// put content
				$('#comments-'+cod).css('display','block');
				$('#comments-'+cod).html(resp);
				$('#comments-'+cod).scrollTop(1000000);
			}
		});
	}
	function create_comment(e)
	{
		if(e.which==13)
		{
			if(login=='0')
			{
				modal_register();
				return;
			}
			var cod = $(this).attr('data-cod');
			var url = base_url+'feed/comments/'+cod+'/'+tk;
			var comment = $(this).val();
			var data = 
			{
				'text':comment
			}

			// loader
		 	$('#container-loader-'+cod).css('display','block');

			$.post(url,data).done(function(resp){
				
				if(resp=='validation'){
					// loader
					$('#container-loader-'+cod).css('display','none');
					alert('El texto del comentario no es valido');
					return;
					
				}else if(resp=='error')
				{
					// loader
					$('#container-loader-'+cod).css('display','none');
					alert('ha ocurrido un error, vuelve a intentarlo');
					return;
					
				}else{
					$('#comments-'+cod).css('display','block');
					$('#comments-'+cod).append(resp);
					$('#comments-'+cod).scrollTop(1000000);
					$('#container-loader-'+cod).css('display','none');
				}	
			});

			$(this).val(''); // value 0 input create 
		}
	}
	function pt()
	{
		var cod = $(this).attr('data-cod');
		var url = base_url+'feed/pts/'+cod+'/'+tk;
		var pts = parseInt($('#container-pts-'+cod).html());
		var pt = $(this).attr('data-pt');

		$(this).addClass('disabled');	
		var obj = $(this);

		if(pt=='1')
		{
			$('#container-pts-'+cod).html(pts-1);
			$(this).removeClass('btn-danger');
			$(this).addClass('btn-info');
			$(this).html('<i class="fa fa-plus"></i>');
			$(this).attr('data-pt','0');	
		}else{
			$('#container-pts-'+cod).html(pts+1);
			$(this).removeClass('btn-info');
			$(this).addClass('btn-danger');	
			$(this).html('<i class="fa fa-minus"></i>');	
			$(this).attr('data-pt','1');	
		}
	
		var data = {
			'tk':tk
		}

		$.post(url,data).done(function(resp){
			if(resp=='error')
			{
				alert('ha ocurrido un error, vuelve a intentarlo');
				$(obj).removeClass('disabled');
				return;
			}else{
				$(obj).removeClass('disabled');
				//ok
			}
		});
		
	}
	</script>
</body>
</html>