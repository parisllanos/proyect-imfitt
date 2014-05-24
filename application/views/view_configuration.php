<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Configuration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" type="image/png">
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
		-moz-box-shadow: 0px 3px 5px #aaa;
		-webkit-box-shadow: 0px 3px 5px #aaa;
		box-shadow: 0px 3px 5px #aaa;
	}
	.container-comment-shadow
	{
		-moz-box-shadow: inset 0px 7px 15px #ddd;;
		-webkit-box-shadow: inset 0px 7px 15px #ddd;;
		box-shadow: inset 0px 7px 15px #ddd;
	}
	@media(max-width:767px){
		.query-p{
			text-align:center;
		}
		.query-img-user{
			text-align:center;
			margin:0px auto;
		}
		.query-p-data
		{
			text-align:center;
		}
	}
	@media(min-width:768px){
		.query-p{
			text-align:right;
		}
	}
	@media(min-width:992px){
		.query-p{
			text-align:right;
		}
	}
	@media(min-width:1200px){
		.query-p{
			text-align:right;
		}
	}
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
    </style>
</head>
<body>
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
					<li><a href="#" style="text-align:center;">Configuración</a></li>
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
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog fa-lg"></i></a>
					        <ul class="dropdown-menu">
					          <li><a href="#">Configuración</a></li>
					          <li class="divider"></li>
					          <li><a href="<?php echo base_url();?>logout">Cerrar session</a></li>
					        </ul>
					     </li>
					</ul>
				</div>
		</div><!--end container-->
	</div>
	<!--end navbar desktop navbar-->
	<div class="container" style="margin-top:51px">
	<div class="row">
		<div class="shadow col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2" style="border:1px solid #aaa;border-top:0px;font-family:tahoma !important;padding:20px 20px 40px 20px;background-color:white;color:#444;">			
			<?php  if($conf==TRUE){ ?>
			<p class="alert alert-success" style="text-align:center;margin:0 0 10px 0;padding:5px"><strong>Cambios realizados</strong> <i class="fa fa-check"></i></p>
			<?php } ?>
			<h4>Configuracion de la cuenta</h4>
			<form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
				<div class="row">
					<hr style="margin:10px 0">
					<h5 style="margin:5px 0 25px 16px !important;color:#888;font-weight:bold;">Configuracion personal</h5>
					<?php echo validation_errors('<p class="alert alert-danger" style="margin:0;padding:7px 20px;text-align:center;">', '</p>'); ?>
					<?php echo $this->upload->display_errors('<p class="alert alert-danger" style="margin:0;padding:7px 20px;text-align:center;">', '</p>');?>
					<div class="form-group">
				    	<label for="inputEmail3" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label query-p" style="font-size:13px;">Nombre de cuenta</label>
				    	<div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
				      		<p class="form-control-static query-p-data">@<?php echo htmlentities(ucwords($user['username']),ENT_QUOTES,'UTF-8');?></p>
				    	</div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputEmail3" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label query-p" style="font-size:13px;">Foto actual</label>
					    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 query-p">
					     	<div class="query-img-user img-user" style="width:100px;height:100px;background-color:#222;background-image:url('<?php echo base_url().'images/user/'.$user['pic'].'_100x100.jpg';?>');background-repeat:no-repeat;background-position:center;"></div>
					    </div>
					</div>
					<div class="form-group">
					    <label for="inputEmail3" class="col-lg-4 col-md-4  col-sm-4 col-xs-12 control-label query-p" style="font-size:13px;">Cambiar foto</label>
					    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 query-p-data">
					     	<input type="file" name="new_pic" class="filestyle" data-classButton="btn btn-default" data-input="true" data-classIcon="fa fa-picture-o fa-2x" data-icon="true" data-buttonText="">
					    </div>
					</div>
				  	<div class="form-group">
					    <label for="inputEmail3" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label query-p" style="font-size:13px;">Nombre</label>
					    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 query-p">
					     	<input type="text" class="form-control" id="inputEmail3" placeholder="Escribe tu nombre" value="<?php echo htmlentities(ucwords($user['name']),ENT_QUOTES,'UTF-8');?>" name="name" maxlength="50">
					    </div>
					</div>
					<div class="form-group">
					    <label for="inputEmail3" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label query-p" style="font-size:13px;">Email</label>
					    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 query-p">
					     	<input type="email" class="form-control" id="inputEmail3" placeholder="Escribe tu email" value="<?php echo htmlentities($user['email'],ENT_QUOTES,'UTF-8');?>" name="email">
					    </div>
					</div>
					<div class="form-group">
					    <label for="inputEmail3" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label query-p" style="font-size:13px;">Descripción</label>
					    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 query-p">
					     	<textarea class="form-control" rows="3" placeholder="Escribe una breve descripción" name="description" maxlength="150"><?php echo htmlentities(ucfirst($user['description']),ENT_QUOTES,'UTF-8');?></textarea>
					    </div>
					</div>
					<hr style="margin:10px 0">
					<h5 style="margin:5px 0 25px 15px !important;color:#888;font-weight:bold;">Configuración de Correo electrónico</h5>
					<div class="checkbox col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
					  <label>
					    <input type="checkbox" value="" name="em_newpic" <?php echo $user['em_newpic']=='1'?'checked="checked"':'';?>>
					   	Recibir un correo cuando una persona que sigo suba una nueva foto.
					  </label>
					</div>
					<br>
					<br>
					<hr style="margin:10px 0">
					<h5 style="margin:5px 0 25px 15px !important;color:#888;font-weight:bold;">Configuración de facebook</h5>
				  	<div class="checkbox col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
					  <label>
					    <input type="checkbox" value="" name="share_pic_facebook" <?php echo $user['fb_share_pic']=='1'?'checked="checked"':'';?>>
					   	Compartir mis fotos en facebook.
					  </label>
					</div>
					<div class="checkbox col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
					  <label>
					    <input type="checkbox" value="" name="get_noti_comments_facebook" <?php echo $user['fb_get_noti_comments']=='1'?'checked="checked"':'';?>>
					   	Recibir notificaciones cuando comenten mis fotos.
					  </label>
					</div>
					<div class="checkbox col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
					  <label>
					    <input type="checkbox" value="" disabled name="get_noti_mentions_facebook" <?php echo $user['fb_get_noti_mentions']=='1'?'checked="checked"':'';?>>
					   	Recibir notificaciones cuando sea mencionado.
					  </label>
					</div>
				</div>
				<button class="btn btn-danger" style="display:block;margin:30px auto 0 auto;">Guardar cambios</button>
				<input type="hidden" value="<?php echo $tk;?>" name="tk">
			</form>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="col-lg-12" style="text-align:center">
			<ul class="list-inline" style="font-family:tahoma;font-size:14px">
			  <li><a href="https://www.facebook.com/imfitt" style="color:#d9534f;"><i class="fa fa-facebook-square fa-lg"></i></a></li>
			  <li style="color:#d9534f;">contact@imfitt.com</li>
			  <li>©2013 imfitt</li>
			</ul>
		</div>
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
	$(document).on('ready',function(){
		$(":file").filestyle();
		activeTypeahead();
	});
	function activeTypeahead()
	{
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
	}
	</script>
</body>
</html>