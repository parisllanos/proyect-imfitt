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
				  <div class="panel-heading query-border-radius"><strong>Únete a nuestro facebook</strong></div>
				  <div class="panel-body">
				  	<p style="text-align:center;font-size:15px;font-family:tahoma;padding:0 30px">Te invitamos a conocer nuestra página de Facebook!<br><small>Haz click en "Me gusta" y ayudanos a crecer cada día más!</small></p>
					<div style="text-align:center">
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fimfitt&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=393545654112411" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
					</div>
					<button class="btn btn-primary pull-right" id="btn-ready">Estoy listo!</button>
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
	var base_url = '<?php echo base_url();?>';
	$(document).on('ready',function(){
		$('#btn-ready').on('click',send);// init check username
	});
  	function send()
  	{	
  		location.href = base_url+'timeline';
  	}
	</script>
</body>
</html>