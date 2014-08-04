<?php
	$img = imagecreate(300, 300);
	$background = imagecolorallocate($img, 225, 225, 225);
	
	$color_green = imagecolorallocate($img, 0, 250, 0);
	imageellipse($img, 100, 100, 100, 100, $color_green);
	
	$color_red = imagecolorallocate($img, 255, 0, 0);
	imagefilledellipse($img, 200, 100, 100, 100, $color_red);
	
	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?>