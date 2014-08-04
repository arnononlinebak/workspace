<?php
 	session_start();
	$img = imagecreate(55, 35);
	$background = imagecolorallocate($img, 225, 225, 225);
	
 	$code = rand(1000, 9999);
	$color_red = imagecolorallocate($img, 250, 0, 0);
	imagestring($img, 5, 10, 10, "$code", $color_red);
	
	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
	$_SESSION['code'] = $code;
?>
