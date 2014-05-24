<?php
if($this->input->post())
{
	$info = getimagesize($_FILES['img']['tmp_name']);
	$w = $info[0];
	$h = $info[1];
	
	if($h>$w)
	{// la altura es mayor que la anchura
		$config['image_library'] = 'gd2';
		$config['source_image']	= $_FILES['img']['tmp_name'];
		$config['new_image']	= './images/crop/imagen_crop.jpg';
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 640;
		$config['height']	= 640;
		$config['master_dim']	= 'width';
		$this->image_lib->initialize($config); 
		if (!$this->image_lib->resize())
		{
	  	  echo $this->image_lib->display_errors();
		}

		



		// die('readyaaa');
		$info2 = getimagesize('./images/crop/imagen_crop.jpg');
		$w2 = $info2[0];
		$h2 = $info2[1];
		$rest = ($h2-$w2);
		// echo ($h2-$rest);die();

		$config2['image_library'] = 'gd2';
		$config2['source_image']	= './images/crop/imagen_crop.jpg';
		$config2['new_image']	= './images/crop/imagen_crop.jpg';
		$config2['maintain_ratio'] = FALSE;
		$config2['width']	 = 640;
		$config2['height']	= ($h2-$rest);

		$this->image_lib->initialize($config2); 
		if ( ! $this->image_lib->resize())
		{
		    echo $this->image_lib->display_errors();
		}
		die('ready');

	}else{
		die('el ancho es mayor o igual');
	}
	

	die('listo');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>crop</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="img">
		<input type="hidden" name="aca" value="aca">
		<button type="submit">Enviar</button>
	</form>
</body>
</html>