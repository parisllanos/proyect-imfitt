<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Postulation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" type="image/png">
	  <!-- Bootstrap -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <style>
	body{
		background-image:url('<?php echo base_url();?>images/background-g.png');
	}
	.active-mobile
	{
		color:white !important;
	}
	@media(max-width:767px){
		.query-top{
			margin-top:0px;
		}
		.query-border-radius{
			border-radius:0px;
		}
	}
	@media(min-width:768px){
		.query-top{
			margin-top:5%;
		}
	}
	@media(min-width:992px){
		.query-top{
			margin-top:5%;
		}
	}
	@media(min-width:1200px){
		.query-top{
			margin-top:5%;
		}
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
			</button>
			<!--list collapse-->    
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
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
					</ul>
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
	<!--end navbar desktop navbar-->
	<div class="container" style="margin-top:51px">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" style="padding:0px;">
				<div class="panel panel-primary query-top query-border-radius">
				  <div class="panel-heading query-border-radius"><strong><i class="fa fa-bookmark"></i> Postulación</strong></div>
				  <div class="panel-body">
				  	<form id="form-photo" action="<?php echo base_url()?>postulation" method="post" enctype="multipart/form-data">
				  		<div class="hidden-xs hidden-sm">
				  		<p class="alert alert-danger alert-photo" style="display:none;text-align:center;margin:0 0 10px 0;padding:5px"><strong>Debes seleccionar 1 foto.</strong></p>
				  		</div>
				  		<?php if($error_upload=='1'){ ?>
				  		<div class="hidden-xs hidden-sm">
				  		<p class="alert alert-danger" style="text-align:center;margin:0 0 10px 0;padding:5px"><strong>Ha ocurrido un error al subir tu foto, vuelve a intentarlo.<br>(Asegúrate que las extensiones sean .jpg o .png)</strong></p>
					  	</div>
					  	<?php } ?>
					  	<?php $arr_name = explode(' ',$user['name']);$user_name_format=array_shift($arr_name);?>
					  	<p style="text-align:center;font-size:15px;font-family:tahoma;padding:0 30px"><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8');?>, sabemos que si llegaste hasta aquí, es para convertirte en un usuario elite. Ser un usuario elite te permitirá comenzar a compartir tus fotos con todos tus amigos y seguidores, pero antes, debes pasar por esta etapa de postulación.<br><br> <small>Selecciona tu mejor foto y subela. <br>Extensiones permitidas: .jpg y .png</small></p>
					  	<div class="row" style="margin-top:20px;text-align:center;">
					  		<div class="col-lg-8 col-lg-offset-2">
					  			<div style="margin:5px 0">
							  		<input type="file" name="photo[]" id="photo1" class="filestyle pull-right" data-classButton="btn btn-default" data-input="true" data-classIcon="fa fa-camera" data-icon="true" data-buttonText="">
								</div>
								<!-- <div style="margin:5px 0">
							  		<input type="file" name="photo[]" id="photo2" class="filestyle pull-right" data-classButton="btn btn-default" data-input="true" data-classIcon="fa fa-camera" data-icon="true" data-buttonText="">
								</div>
								<div style="margin:5px 0">
							  		<input type="file" name="photo[]" id="photo3" class="filestyle pull-right" data-classButton="btn btn-default" data-input="true" data-classIcon="fa fa-camera" data-icon="true" data-buttonText="">
								</div>
								<div style="margin:5px 0">
							  		<input type="file" name="photo[]" id="photo4" class="filestyle pull-right" data-classButton="btn btn-default" data-input="true" data-classIcon="fa fa-camera" data-icon="true" data-buttonText="">
								</div>
								<div style="margin:5px 0">
							  		<input type="file" name="photo[]" id="photo5" class="filestyle pull-right" data-classButton="btn btn-default" data-input="true" data-classIcon="fa fa-camera" data-icon="true" data-buttonText="">
								</div> -->
							</div>
						</div>
						<br>
						<p style="text-align:center;font-size:15px;font-family:tahoma;padding:0 30px;font-weight:bold;"><small>Nuestro equipo se encargara de revisar tu solicitud y evaluarte.<br>Una vez revisada la solicitud te enviaremos un correo a <span style="color:#ee0000"><?php echo htmlentities($user['email'],ENT_QUOTES,'UTF-8');?></span>  para informarte sobre el resultado final. Si el correo mencionado es incorrecto, puedes modificarlo en la configuración de tu cuenta <a href="<?php echo base_url();?>configuration"><i class="fa fa-cog fa-lg"></i></a> Exito!</small></p>
						<div class="hidden-lg hidden-md">
						<p class="alert alert-danger alert-photo" style="display:none;text-align:center;margin:0 0 10px 0;padding:5px"><strong>Debes seleccionar 1 foto.</strong></p>
						</div>
						<?php if($error_upload=='1'){ ?>
						<div class="hidden-lg hidden-md">
				  		<p class="alert alert-danger" style="text-align:center;margin:0 0 10px 0;padding:5px"><strong>Ha ocurrido un error al subir la foto, vuelve a intentarlo.<br>(Asegúrate que las extensiones sean .jpg o .png)</strong></p>
					  	</div>
					  	<?php } ?>
					  	<div class="hidden-lg hidden-md">
				  		<p id="alert-postulation"class="alert alert-default" style="display:none;border-top:1px dashed #bbb;text-align:center;margin:0 0 10px 0;padding:5px"><strong><small>Cargando postulación, espere unos segundos.</small></strong></p>
					  	</div>
						<button type="button" id="ready" class="btn btn-primary pull-right">Listo</button>
						<a href="<?php echo base_url();?>profile" id="ready" class="btn btn-primary pull-left">Ir a mi perfil</a>
					<input type="hidden" name="tk" value="<?php echo $tk;?>">
					</form>
				  </div>
				</div>
			</div> 
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
	<script>
	$(document).on('ready',function(){
		$(":file").filestyle();
		$('#ready').on('click',function(){
			// if($('#photo1').val()==0 || $('#photo2').val()==0 || $('#photo3').val()==0 || $('#photo4').val()==0 || $('#photo5').val()==0)
			// {
			// 	$('.alert-photo').css('display','block');
			// }else{

			// 	$('#form-photo').submit();
			// }
			if($('#photo1').val()==0)
			{
				$('.alert-photo').css('display','block');
			}else{
				$('#alert-postulation').css('display','block');
				$('#form-photo').submit();
			}
		});
	});
	</script>
</body>
</html>