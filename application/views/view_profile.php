<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
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
	<meta name="description" content="imfitt es una exclusiva plataforma para personas FIT, entra y descubre a los cuerpos mas atractivos de tu ciudad!" />
	  <!-- Bootstrap -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <style>
	@media(max-width:767px){
		.query-p{
			padding:0 0 0 0 ;
		}
		.query-data
		{
			float:none;
			width:100% !important;
		}
		.query-data-user
		{
			margin:10px 0 0 0;
			text-align: center;
		}
		.query-img-user
		{
			display:block;
			margin:0 auto;
		}
		.query-p-accountant
		{
			text-align:center;
		}
		.query-container-create-post
		{
			padding:10px 5px
		}
	}
	@media(min-width:768px){
		.query-p{
			padding:0 0 0 0;
		}
		.query-data
		{
			float:left;
		}
		.query-data-user
		{
			float:left;
			margin:0px 0px 0px 120px;
		}
		.query-img-user
		{
			position:absolute;
		}
		.query-panel-create-post
		{
			margin:10px 0 0 0;
		}
		.query-container-create-post
		{
			padding:20px 20px
		}
	}
	@media(min-width:992px){
		.query-p{
			padding:30px 25px 0 25px;
		}
		.query-data
		{
			float:left;
		}
		.query-data-user
		{
			float:left;
			margin:0px 0px 0px 120px;
		}
		.query-img-user
		{
			position:absolute;
		}
		.query-panel-create-post
		{
			margin:0 0 0 40px;
		}
		.query-container-create-post
		{
			padding:20px 20px
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
		.query-data
		{
			float:left;
		}
		.query-data-user
		{
			float:left;
			margin:0px 0px 0px 120px;
		}
		.query-img-user
		{
			position:absolute;
		}
		.query-panel-create-post
		{
			margin:0 0 0 40px;
		}
		.query-container-create-post
		{
			padding:20px 20px
		}
		.query-sidebar
		{
			margin-left:3%
		}
	}
	body
	{
		background:#edeeef url('<?php echo base_url();?>images/background-center.png');
		/*background:#e0e1e2 url('images/background-center.png');*/
	}
	html,body
	{
		height:100% !important;
	}
	.shadow-bottom
	{
		-moz-box-shadow: 0px 1px 5px #aaa;
		-webkit-box-shadow: 0px 1px 5px #aaa;
		box-shadow: 0px 1px 5px #aaa;
	}
	.active-mobile
	{
		color:white !important;
	}
	.container-photos
	{
		-moz-box-shadow: inset 0px 7px 15px #ccc;
		-webkit-box-shadow: inset 0px 7px 15px #ccc;
		box-shadow: inset 0px 7px 15px #ccc;
		padding-bottom:28px;
	}
	.container-single-user:hover
	{
		cursor:pointer;
	}
	.modal-backdrop{}
	.bootstrap-filestyle:focus
	{
		overflow:none;
		border:none
	}
	.bootstrap-filestyle input
	{
		background-color:white;
		border:none;
		font-size: 13px;
		overflow: hidden;
		max-width: 100px;
		margin-right:10px;
	}
	.btn-delete:hover
	{
		background-color:#ddd;
	}
	#btn-following,#btn-followers
	{
		cursor:pointer;
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
	<!--view photo-->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="border:none">
		  <div class="modal-dialog">
		    <div id="modal-content" class="modal-content" style="max-width:510px;border-radius:0px;margin:0 auto;">
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!---->
	<!--alert delete-->
		<div class="modal fade" id="modal-alert-delete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align:center;font-size:16px;padding:25px 0 0 0;margin:0px;"><strong>¿Realmente deseas eliminar la foto?</strong></p>
		      </div>
		      <div class="modal-footer" style="padding:15px 20px;background-color:#f5f5f5;">
		        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
		        <button type="button" class="btn btn-danger" id="btn-ok-remove"><i class="fa fa-check"></i></button>
		        <input type="hidden" id="i-delete-data-cod" data-cod="">
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!---->
	<?php if($login){ ?>
	<!--modal following-->
		<div class="modal fade" id="modal-following" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content" style="max-width:400px;margin:0 auto">
		      <div class="modal-body">
		      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position:absolute;left:93%;top:10px;">&times;</button>
		      	<div id="container-following" style="margin:20px; 0 0 0;max-height:400px;overflow-y:auto">
			      	<div id="loader-following" style="text-align:center;display:none;">
			      		<img src="<?php echo base_url()?>images/loader.gif" alt="">
			      	</div>
				</div>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!---->
	<!--modal followers-->
		<div class="modal fade" id="modal-followers" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content" style="max-width:400px;margin:0 auto">
		      <div class="modal-body">
		      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position:absolute;left:93%;top:10px;">&times;</button>
		      	<div id="container-followers" style="margin:20px; 0 0 0;max-height:400px;overflow-y:auto">
			      	<div id="loader-followers" style="text-align:center;display:none;">
			      		<img src="<?php echo base_url()?>images/loader.gif" alt="">
			      	</div>
				</div>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!---->
	<?php } ?>
	<?php if($login){ ?>
	<!--navbar mobile-->
	<div class="visible-xs navbar navbar-inverse navbar-fixed-top" style="padding:0px 10px;margin:0px;border-bottom:1px solid #222;font-family:Tahoma;">		
			<?php if($fit=='1'){ ?>
			<button class="btn btn-danger navbar-btn pull-right btn-create-post"><i class="glyphicon glyphicon-camera fa-lg" style="color:white"></i></button>
			<?php } ?>
			<a href="<?php echo base_url();?>timeline" class="btn btn-link navbar-btn"><i class="glyphicon glyphicon-home fa-lg" style="color:#aaa"></i></a>
			<a href="<?php echo base_url();?>profile" class="btn btn-link navbar-btn"><i class="glyphicon glyphicon-user fa-lg active-mobile" style="color:#aaa"></i></a>
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
						<li class="active"><a href="<?php echo base_url();?>profile"><i class="glyphicon glyphicon-user fa-lg"></i></a></li>
						<li><a href="<?php echo base_url();?>discover"><i class="glyphicon glyphicon-plus fa-lg"></i></a></li>
						<li>
							<a href="<?php echo base_url();?>notifications">
								<i class="glyphicon glyphicon-bell fa-lg"></i>
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
						<?php if($fit=='1'){ ?>
						<li><button class="btn btn-danger navbar-btn btn-create-post"><i class="glyphicon glyphicon-camera fa-lg"></i></button></li>
						<?php } ?>
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
	<!--navbar device-->
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
	<!--Create post-->
	<div style="display:none;width:100%;position:fixed;z-index:9999;" id="container-create-post">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding:0px;border-left:1px solid #aaa;border-right:1px solid #aaa;">
					<div class="shadow-bottom query-container-create-post" style="margin:0px auto;background-color:white;width:100%;border-left:6px solid #d9534f;border-right:1px solid #bbb;">
						<!--alert-->
						<p class="alert alert-danger" id="alert-create-post-js" style="text-align:center;margin:0 0 10px 0;padding:5px;display:none"><strong>Debes seleccionar una foto</strong></p>
						<!--pic-->
						<div class="hidden-xs query-create-post-img create-post-img" style="background:#222 url('<?php echo base_url()?>/images/user/<?php echo $user['pic'];?>_30x30.jpg') no-repeat center;width:30px;height:30px;position:absolute">
						</div>
						<!--panel-->
						<div style="width:auto;min-height:30px;" class="query-panel-create-post">
							<form id="form-create-post" action="#" style="margin:0px;" method="post" enctype="multipart/form-data">
								<textarea class="form-control" rows="3" placeholder="Escribe un comentario..." name="text" maxlength="140"></textarea>
								<div style="margin-top:10px;" class="btns-create">
									<div style="float:right;">
										<input type="file" name="photo" id="photo" class="filestyle pull-right" data-classButton="btn btn-default" data-input="true" data-classIcon="fa fa-camera" data-icon="true" data-buttonText="">
										<button type="button" class="btn btn-danger" id="btn-create-post-ready" style="margin-left:6px;">Listo <i class="fa fa-check"></i></button>
									</div>
									<div style="clear:both"></div>
								</div>
								<input type="hidden" name="tk" value="<?php echo $tk;?>">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End create post-->
	<!--end navbar desktop navbar-->
	<div class="container" style="margin-top:51px;">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding:0px;border-left:1px solid #aaa;border-right:1px solid #aaa;">
			<div style="background-color:white;border-bottom:3px solid #d9534f" class="container-data-profile">
				<div style="width:70%;background-color:white;padding:10px;" class="query-data">
					<?php echo $this->upload->display_errors('<p class="alert alert-danger" style="text-align:center;margin:0 0 10px 0;padding:5px">','</p>'); ?>
					<?php  if($create_post==TRUE){ ?>
					<p class="alert alert-success" style="text-align:center;margin:0 0 10px 0;padding:5px"><strong>Foto subida</strong> <i class="fa fa-check"></i></p>
					<?php } ?>
					<?php $pic=base_url().'images/user/'.$user['pic'].'_100x100.jpg'?>
					<div class="img-user query-img-user" style="width:100px;height:100px;background:#222 url('<?php echo $pic;?>') no-repeat center;">
					</div>
					<div class="data-user query-data-user">
						<p style="margin: 0;">
						<span style="font-size:20px;font-family:Arial;font-style:italic;color:#444;"><?php echo htmlentities(ucwords($user['name']),ENT_QUOTES,'UTF-8');?></span><br>
						<span style="font-size:14px;font-family:Arial;font-weight:bold;color:#444;">@<?php echo htmlentities(ucwords($user['username']),ENT_QUOTES,'UTF-8');?></span><br>
						<?php if($me=='0'){?>
							<span id="container-btn-follow">
								<?php if($follow=='1'){ ?>
								<button class="btn btn-danger" id="btn-follow" data-follow="1" style="margin:5px 0"><strong>Siguiendo</strong></button>
								<?php }else{ ?>
								<button class="btn btn-info" id="btn-follow" data-follow="0" style="margin:5px 0"><strong>Seguir</strong></button>
								<?php } ?>
							</span>
							<br>
						<?php } ?>
						<span style="font-size:14px;font-family:Arial;font-style:italic;color:#444;"><?php echo htmlentities(ucwords($user['description']),ENT_QUOTES,'UTF-8');?></span>
						</p>
					</div>
				</div>
				<div style="width:30%;background-color:#222;padding:10px;overflow:hidden" class="query-data">				
					<p class="query-p-accountant" style="margin: 0;">
						<?php if($login==TRUE and $user['total_following']>0){$id_following='btn-following';}else{$id_following='';}?>
						<span style="font-family:arial;font-size:14px;color:white;font-weight:bold;" id="<?php echo $id_following;?>">Siguiendo</span><br>
						<span style="font-family:Lucida Sans Unicode;font-size:13px;color:white;margin-left:10px;"><?php echo $user['total_following'];?></span><br>
						<?php if($login==TRUE and $user['total_followers']>0){$id_followers='btn-followers';}else{$id_followers='';}?>
						<span style="font-family:arial;font-size:14px;color:white;font-weight:bold" id="<?php echo $id_followers;?>">Seguidores</span><br>
						<span style="font-family:Lucida Sans Unicode;font-size:13px;color:white;margin-left:10px"><?php echo $user['total_followers'];?></span><br>
						<span style="font-family:arial;font-size:14px;color:white;font-weight:bold">Post</span><br>
						<span style="font-family:Lucida Sans Unicode;font-size:13px;color:white;margin-left:10px"><?php echo $user['total_post'];?></span><br>
						<span style="font-family:arial;font-size:14px;color:white;font-weight:bold">Puntos</span><br>
						<span style="font-family:Lucida Sans Unicode;font-size:13px;color:white;margin-left:10px"><?php echo $user['total_pts'];?></span><br>
					</p>
				</div>
				<div style="clear:both"></div>
			</div>
			<!--container-photos-->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div style="background:#e0e1e2 url('<?php echo base_url();?>images/background-center.png');width:100%;" class="container-photos">
						<?php if(empty($posts)){ ?>
						<?php $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);?>
							<p style="text-align:center;font-family:Lucida Sans Unicode;font-size:17px;color:#666;padding:40px 10px 500px 10px"><small>En este momento <?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?> no tiene fotos.</small><br><br><a href="<?php base_url();?>/discover" style="color:#444;text-decoration:none">Haz click aquí para descubrir más cuerpos atractivos.<br><i class="fa fa-plus fa-2x" id="this-icon-plus"></i></a></p>
						<?php }else{ ?>
							<div id="container-single-user">
							<?php foreach($posts as $post){ ?>
								<div id="container-photo-<?php echo $post['cod'];?>" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 single-user" style="text-align:center;padding-top:20px">
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
							<?php } ?>
							</div>
							<div style="clear:both;"></div>
							<br>
							<p class="alert" id="load-noloader" style="color:#777;background-color:white;border:1px solid #ccc;max-width:512px;margin:0 auto 20px auto;text-align:center;"><strong>No more publications</strong></p>
							<p class="alert" id="load-loader" style="display:none;background-color:white;border:1px solid #ccc;max-width:512px;margin:0 auto 20px auto;text-align:center;"><img src="<?php echo base_url();?>images/loader.gif" alt=""></p>
						<?php } ?>
					</div>
				</div>				
			</div>
		</div>
		<!--Sidebar-->
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
								<p class="meet-name-user" style="line-height:15px;font-family:tahoma;font-size:13px;margin:0 0 0 45px;min:width:100%;font-family:tahoma;min-height:40px;"><a href="<?php echo base_url().'profile/'.$user_meet['cod'];?>" style="color:#d9534f;"><strong><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?></strong></a><br>@<?php echo htmlentities(ucwords($user_meet['username']),ENT_QUOTES,'UTF-8');?></p>
								<div style="clear:both"></div>
							</div>
						<?php } ?>
					</div>
				</div>
		</div>
	</div>
	<!-- line center -->
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
	<script src="<?php echo base_url();?>js/inview.js"></script>
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap-typeahead.min.js"></script>
	<script src="<?php echo base_url();?>js/hogan.js"></script>
	<script>
	var login = '<?php if($login){echo "1";}else{echo "0";};?>';
	var cod_user = '<?php echo $user["cod"];?>';
	var tk = '<?php echo $tk;?>';
	var base_url = '<?php echo base_url();?>';
	var bol_create_post = false;
	var num = 0;
	var getItems=true
	var num_load = 1; // init to first load
	$(document).on('ready',function(){
		$('#btn-following').on('click',view_following);
		$('#btn-followers').on('click',view_followers);
		$('body').on('click','.btn-delete',delete_photo);
		$('body').on('click','#btn-follow',follow);
		$(":file").filestyle();
		$('.btn-create-post').on('click',create_post);
		$('#btn-create-post-ready').on('click',send_post);
		$('body').on('click','.container-single-user',view_modal);
		$('body').on('click','.btn-load-comments',load_comments);
		$('body').on('keypress','.input-create-comment',create_comment);
		$('body').on('click','.btn-pt',pt);
		$('.btn-home').on('click',home);
		$('body').on('click','.btn-modal-register',modal_register);
		getScroll();
		activeTypeahead();

	});
	function modal_register()
	{
		$('#modal').modal('hide');
		$('#modal-register').modal();
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
	function getScroll()
	{
		// max posts in view
		var num = $('.single-user').length;
		if(num<20)
    	{
    		// thinking
    	}else{
    		$('#load-noloader').css('display','none');
    		$('#load-loader').css('display','block');
    		
    		$('#load-loader').on('inview', function (event, visible) {
					
				 if (visible == true && getItems==true) 
				 {
					var url = base_url+'feed/post/'+num_load+'/'+tk; 

				 	var data = 
				 	{
				 		action:'posts_profile',
				 		'cod_user':cod_user
				 	}
				 	$.post(url,data).done(function(resp){
				 		if(resp=='0')
				 		{
				 			$('#load-noloader').css('display','block');
    						$('#load-loader').css('display','none');
    						getItems=false;
				 		}else{
				 			num_load=(num_load+1);
				 			$('#container-single-user').append(resp);
				 			$('.single-user').fadeIn("slow");
				 		}
				 	});
				 }
			});
    	}
		
	}
	function view_following()
	{
		var url = base_url+'feed/following/'+cod_user+'/'+tk;
		$('#modal-following').modal();
		$('#loader-following').css('display','block');
		$.get(url).done(function(resp){
			if(resp=='error')
			{
				alert('Ha ocurrido un error, vuelve a intentarlo');
			}else{
				$('#loader-following').css('display','none');
				$('#container-following').html(resp);
			}
		});

	}
	function view_followers()
	{
		var url = base_url+'feed/followers/'+cod_user+'/'+tk;
		$('#modal-followers').modal();
		$('#loader-followers').css('display','block');
		$.get(url).done(function(resp){
			if(resp=='error')
			{
				alert('Ha ocurrido un error, vuelve a intentarlo');
			}else{
				$('#loader-followers').css('display','none');
				$('#container-followers').html(resp);
			}
		});

	}
	function delete_photo()
	{	
		var obj = $(this);
		var cod_post = $(this).attr('data-cod');
		var url = base_url+'feed/post/'+cod_post+'/'+tk;
		$('#modal-alert-delete').modal();
		$('#btn-ok-remove').unbind('click');
		$('#btn-ok-remove').on('click',function(){
			$('#modal-alert-delete').modal('hide');
			var text_delete = $(obj).html();
			$(obj).html('Eliminando...');
			var data = 
			{
				'action':'delete'
			}
			$.post(url,data).done(function(resp){
				if(resp=='error')
				{
					alert('Ha ocurrio un error, vuelve a intentarlo');
					$(obj).html(text_delete );
				}else{
					// $('#container-photo-'+cod_post).hidden('display','none');
					$('#container-photo-'+cod_post).hide(500);
				}
			});
		});
	}
	function home()
	{
		location.href = base_url;
	}
	function create_post()
	{
		if(bol_create_post==false)
		{
			$('#container-create-post').css('display','block');
			$('#btn-close-create-post').on('click',function(){
				
				$('#container-create-post').css('display','none');
				$('#alert-create-post-js').css('display','none');
				bol_create_post = false;
			});
			bol_create_post = true;
		}else{
			
			$('#container-create-post').css('display','none');
			$('#alert-create-post-js').css('display','none');
			bol_create_post = false;
		}
	}
	function send_post()
	{
		var photo = $('.bootstrap-filestyle input').val();
		if(photo==0)
		{
			$('#alert-create-post-js').css('display','block');
		}else{
			$('#form-create-post').submit();
		}
	}
	function view_modal()
	{
		var cod = $(this).attr('data-cod');
		var url = base_url+'feed/post/'+cod+'/'+tk;
		$('#modal').modal();
		$('#modal-content').html('<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position:absolute;left:95%;top:10px;">&times;</button><div style="background-color:white;height:150px;padding:80px 0 100px 0;;text-align:center"><img src="<?php echo base_url()?>images/loader.gif" alt=""></div>');
		
		$.get(url).done(function(resp){
			if(resp=='error')
			{
				alert('Ha ocurrio un error, vuelve a intentarlo');
			}else{
				$('#modal-content').html(resp);
			}
		});
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
		// // loader
		 $('#btn-load-comments-'+cod).css('display','none');
		 $('#container-loader-'+cod).css('display','block');

		// // get comment
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
					// single photo count pt
					$('#photo-count-comments-'+cod).html(parseInt($('#photo-count-comments-'+cod).html())+1);	
				}	
			});

			$(this).val(''); // value 0 input create 
		}
	}
	function pt()
	{
		if(login=='0')
		{
			location.href = base_url;
			return;
		}

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
			// single photo count pt
			// $('#photo-count-pts-'+cod).html(pts-1);	
			$('#photo-count-pts-'+cod).html(parseInt($('#photo-count-pts-'+cod).html())-1);
		}else{
			$('#container-pts-'+cod).html(pts+1);
			$(this).removeClass('btn-info');
			$(this).addClass('btn-danger');	
			$(this).html('<i class="fa fa-minus"></i>');	
			$(this).attr('data-pt','1');
			// single photo count pt
			$('#photo-count-pts-'+cod).html(parseInt($('#photo-count-pts-'+cod).html())+1);	
			// $('#photo-count-pts-'+cod).html(+1);	
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
	function follow()
	{
		if(login=='0')
		{
			modal_register();
			return;
		}

		var follow = $(this).attr('data-follow');
		var url = base_url+'feed/follow/'+cod_user+'/'+tk;
		var data_follow = '';

		if(follow=='0')
		{
			$('#container-btn-follow').html('<button class="btn btn-danger" id="btn-follow" data-follow="1" style="margin:5px 0"><strong>Siguiendo</strong></button>');
			$(this).attr('data-follow','1');
			$('#btn-follow').addClass('disabled');
			data_follow='1';
		}else{
			$('#container-btn-follow').html('<button class="btn btn-info" id="btn-follow" data-follow="0" style="margin:5px 0"><strong>Seguir</strong></button>');
			$(this).attr('data-follow','0');
			$('#btn-follow').addClass('disabled');
			data_follow='0';
		}
		var data = 
		{
			'follow':data_follow
		}
		$.post(url,data).done(function(resp)
		{

			if(resp=='error')
			{
				alert('ha ocurrido un error, vuelve a intentarlo');
				if(follow=='0')
				{
					$('#container-btn-follow').html('<button class="btn btn-danger" id="btn-follow" data-follow="1" style="margin:5px 0"><strong>Siguiendo</strong></button>');
					$(this).attr('data-follow','1');
					data_follow='1';
				}else{
					$('#container-btn-follow').html('<button class="btn btn-info" id="btn-follow" data-follow="0" style="margin:5px 0"><strong>Seguir</strong></button>');
					$(this).attr('data-follow','0');
					data_follow='0';
				}
			}else{
				$('#btn-follow').removeClass('disabled');
				//ok
			}
		});
		
	}
	</script>
</body>
</html>