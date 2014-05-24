<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notifications</title>
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
		
	}
	@media(min-width:768px){
		
	}
	@media(min-width:992px){
		
	}
	@media(min-width:1200px){
		
	}
	.container-notification:hover
	{
		background-color:#f0f0f0;
	}
	.no-read
	{
		background-color:#FBEFEF !important;
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
						<a href="#" style="text-align:center;">
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
						<li class="active">
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
	<div class="container" style="margin-top:51px;">
	<div class="row">
		<div class="shadow col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2" style="border:1px solid #aaa;border-top:0px;font-family:tahoma !important;padding:20px 20px 60px 20px;background-color:white;color:#444;">
			<h4><i class="fa fa-bell"></i> Notificaciones</h4>
			<?php if(empty($notifications)){ ?>
			<div style="background-color:;width:100%;padding:5px 0 5px 0;min-height:40px;margin:0px;border-top:1px solid #ccc">
				<p style="padding:50px 0 0 0;text-align:center;font-family:Arial;font-weight:bold;">No tienes ninguna notificación.</p>
			</div>
			<?php }else{ ?>
				<?php foreach ($notifications as $notification){ ?>
					<?php $no_read = $notification['view']=='0'?'no-read':'';?>
					<div class="container-notification <?php echo $no_read;?>" data-cod="<?php echo $notification['cod_post'];?>" style="background-color:;width:100%;padding:5px 0 5px 0;min-height:40px;margin:0px;border-top:1px solid #ccc;cursor:pointer">
						<?php $pic=base_url().'images/user/'.$notification['pic'].'_30x30.jpg'?>
						<?php $arr_name = explode(' ',$notification['name']);$user_name_format=array_shift($arr_name);?>
						<div class="img-user" style="margin:0 0 0 5px;width:30px;height:30px;background:#222 url('<?php echo $pic;?>') no-repeat center;position:absolute">
						</div>
						<p style="color:#444;;margin:0 0 0 40px;padding:4px 0 0 0"><span style="color:#d9534f;font-family:Arial;font-weight:bold;"><?php echo htmlentities(ucwords($user_name_format),ENT_QUOTES,'UTF-8').'  @'.htmlentities(ucwords($notification['username']),ENT_QUOTES,'UTF-8');?></span> <?php echo htmlentities(ucfirst($notification['description']),ENT_QUOTES,'UTF-8');?>.</p>
					</div>
				<?php } ?>
			<?php } ?>
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
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap-typeahead.min.js"></script>
	<script src="<?php echo base_url();?>js/hogan.js"></script>
	<script>
	var base_url = '<?php echo base_url();?>';
	$(document).on('ready',function()
	{
		$('.container-notification').on('click',go);
		$('.container-notification').on('click',view);
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
	function go()
	{
		var cod = $(this).attr('data-cod');
		var url = base_url+'post/'+cod;
		window.open(url,'_blank');
	}
	function view()
	{

	}
	</script>
</body>
</html>