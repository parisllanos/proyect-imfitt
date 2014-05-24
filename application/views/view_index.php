<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido a imfitt!</title>
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
    html,body
    {
    	height: 100% !important;
    }
	body > .no-m
	{
    	margin-left:-20px;
    	margin-right:-20px;
	}
	body { overflow-x: hidden;}
    </style>
</head>
<body>
	<!--navbar-->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:transparent;border:0;">
		<div class="container" style="margin-top:5%">
			<div class="col-lg-11"><a href="<?php echo base_url();?>loginfacebook"><button class="btn btn-default btn-lg pull-right" style="font-family:tahoma;font-size:18px;">Ingresar</button></a></div>
		</div>
	</div>
	<!--end navbar-->
	<div class="row no-m" id="video" style="background-color:white;height:50%;overflow:hidden;background-image:url('<?php echo base_url();?>images/background1.png');background-position:center;" >
	</div>
	<!--red line-->
	<div class="row" style="background-color:yellow;border-top:5px solid #d9534f;"></div>
	<!--end line-->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 visible-xs" style="">
				<img src="<?php echo base_url()?>images/phone.png" class="img-responsive" alt="" style="margin:-50% auto 0 auto">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" style="padding:10px;">
				<h3 style="font-family:tahoma;font-weight:bold;">¿Qué es imfitt?</h3>
				<p style="margin:3px;font-family:tahoma;font-size:13px;font-weight:bold;"><i class="fa fa-check"></i> imfitt es una exclusiva aplicación para personas FIT (Un cuerpo trabajado).</p>
				<p style="margin:3px;font-family:tahoma;font-size:13px;font-weight:bold;"><i class="fa fa-check"></i> imfitt es una forma rápida de compartir tus mejores fotos con amigos.</p>
				<p style="margin:3px;font-family:tahoma;font-size:13px;font-weight:bold;"><i class="fa fa-check"></i> imfitt se sincroniza con tu red social preferida.</p>
				<p style="margin:3px;font-family:tahoma;font-size:13px;font-weight:bold;"><i class="fa fa-check"></i> imfitt logra agrupar a los físicos más atractivos de tu ciudad en un solo lugar.</p>
				<p style="margin:3px;font-family:tahoma;font-size:13px;font-weight:bold;"><i class="fa fa-check"></i> imfitt es totalmente gratis.</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs" style="">
				<img src="<?php echo base_url()?>images/phone.png" class="img-responsive" alt="" style="margin:-70% auto 0 auto">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" style="padding:10px;">
				<h3 style="font-family:tahoma;font-weight:bold;">Llegó la hora</h3>
				<p style="margin:3px;font-family:tahoma;font-size:14px;font-weight:bold;">¿Crees tener lo necesario para ser un usuario imfitt?</p>
				<p style="margin:3px;font-family:tahoma;font-size:13px;">No, pero me gustaría ver fotos, seguir a usuarios imfitt, escribirles comentarios, etc.</p>
				<div style="text-align:center;"><a href="<?php echo base_url();?>loginfacebook" class="btn btn-info btn-sm" style="font-family:tahoma;font-size:14px;">Registrarme</a></div>
				<p style="margin:3px;font-family:tahoma;font-size:13px;">Woow si, creo que tengo todo lo necesario para llegar a ser un usuario imfitt.</p>
				<div style="text-align:center"><a href="<?php echo base_url();?>loginfacebook/postulation" class="btn btn-info btn-sm" style="font-family:tahoma;font-size:14px;">Deseo postular!</a></div>
			</div>
			 <!-- col-lg-offset-4 col-md-offset-4 col-sm-offset-4 -->
		</div>
	</div>
	<!-- <div class="col-lg-12" style="background-color:transparent;height:100%;margin-top:-5%">
			<iframe width="100%" height="150%" border="0px" src="//www.youtube.com/embed/ggmXoCfRIOA?wmode=opaque&amp;autoplay=1&amp;loop=1&amp;playlist=ggmXoCfRIOA&amp;controls=0&amp;showinfo=0&amp;modestbranding=1">
            </iframe>
	</div> -->
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
	 <script>
	 $(document).on('ready',function(){
	 	if($('body').width()>=992)
	 	{
  			$('#video').html('<div class="col-lg-12 hidden-sm hidden-xs" style="background-color:transparent;height:100%;margin-top:-5%"><iframe width="100%" height="150%" src="//www.youtube.com/embed/ggmXoCfRIOA?wmode=opaque&amp;autoplay=1&amp;loop=1&amp;playlist=ggmXoCfRIOA&amp;controls=0&amp;showinfo=0&amp;modestbranding=1"></iframe></div>');
	 	}
  	 });
	 </script>
</body>
</html>