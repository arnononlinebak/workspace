<?php
	$img = imagecreate(400, 200);
	$background = imagecolorallocate($img, 225, 225, 225);
	
	$color_red = imagecolorallocate($img, 250, 0, 0);
	imageellipse($img, 200, 100, 300, 100, $color_red);
	
	$color_black = imagecolorallocate($img, 0, 0, 0);
	imagefilledellipse($img, 200, 100, 100, 100, $color_black);
	
	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?>