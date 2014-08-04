<?php
	$img = imagecreate(200, 250);
	$background = imagecolorallocate($img, 225, 225, 225);
	
	$color_green = imagecolorallocate($img, 0, 250, 0);
	imagerectangle($img, 10, 10, 100, 100, $color_green);

	$color_red = imagecolorallocate($img, 255, 0, 0);
	imagefilledrectangle($img, 10, 120, 100, 210, $color_red);
	
	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?>

