<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Username</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" type="image/png">
	  <!-- Bootstrap -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <style>
	body{
		background-image:url('<?php echo base_url();?>images/background-g.png');
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
			margin-top:20%;
		}
	}
	@media(min-width:992px){
		.query-top{
			margin-top:20%;
		}
	}
	@media(min-width:1200px){
		.query-top{
			margin-top:20%;
		}
	}
    </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" style="padding:0px;">
				<div class="panel panel-primary query-top query-border-radius">
				  <div class="panel-heading query-border-radius"><strong>Nombre de tu cuenta</strong></div>
				  <div class="panel-body">
				  	<p style="text-align:center;font-size:15px;font-family:tahoma;padding:0 30px"><?php echo htmlentities(ucwords($name),ENT_QUOTES,'UTF-8');?>, para finalizar debes escoger el nombre de tu cuenta. <br> <small>El nombre de cuenta es unica y es utilizada para que tus amigos y seguidores te mencionen en fotos y comentarios. Por ejemplo @jaimi, @jani , @ricks</small></p>
				  	<div class="row" style="margin-top:20px">
				  		<form id="form-username" action="#" method="post" style="margin:0">
				  		<div class="col-lg-8 col-lg-offset-2">
						  	<div class="input-group">
							  <span class="input-group-addon">@</span>
							  <input type="text" name="username" id="input-username" class="form-control" placeholder="Escribela aquí" maxlength="15">
							</div>
							<span class="help-block" id="response-user" style="text-align:center;"></span>
						</div>
						<input type="hidden" name="tk" value="<?php echo $tk;?>">
						</form>
					</div>
					<button class="disabled btn btn-primary pull-right" id="btn-ready">Listo</button>
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
	<script>
	var username_ready = false;
	$(document).on('ready',function(){
		$('#input-username').on('blur',check_username);// init check username
		$('#input-username').on('keypress',avalaible);// init check username
		$('#btn-ready').on('click',send);// init check username
	});
	function avalaible(e)
	{
		if(e.which==13)
		{
			return false;
		}
		$('#btn-ready').addClass('disabled');
		
	}
	function check_username()
	{	
		var url = '<?php echo base_url();?>feed/username';
		var tk = '<?php echo $tk;?>';
		var username = $('#input-username').val();
		
		if(username==0)
		{
			$('#response-user').html('<strong style="">No olvides tu username!</strong>');
			return false;
		}

		var expreg = /^[A-Za-z_0-9]{1,15}$/;
  		if(!expreg.test(username))
  		{
  			$('#response-user').html('<strong style="">Solo está permitido letras, numeros y "_".</strong>');
  			return false;
  		}

  		var data = 
  		{
  			'tk':tk,
  			'username':username
  		}
  		// img loader
  		$('#response-user').html('<img src="images/loader.gif" alt=""/>');
  		
  		$.post(url,data).done(function(resp){
  			if(resp=='error')
  			{
  				$('#response-user').html('<strong style="">Ocurrio un error, vuelve a intentarlo.</strong>');
  				return false;
  			}
  			if(resp=='1')
  			{
  				$('#response-user').html('<strong style="color:green">Usuario disponible <i class="fa fa-check"></i></strong>');
  				$('#btn-ready').removeClass('disabled');
  				username_ready=true;
  				return true;
  			}
  			if(resp=='0')
  			{
  				$('#response-user').html('<strong style="color:red">Usuario ocupado <i class="fa fa-times"></i></strong>');
  				return false;
  			}
  		});
  	}
  	function send()
  	{	
  		if(username_ready==true)
  		{
  		 	$('#form-username').submit();
  		}
  	}
	</script>
</body>
</html>