<?php
 	$img = imagecreate(300, 250);
	$background = imagecolorallocate($img, 225, 225, 225);
	
	$color_red = imagecolorallocate($img, 255, 0, 0);
	imagearc($img, 100, 80, 100, 100, 90, 270, $color_red);

	$color_green = imagecolorallocate($img, 0, 250, 0);
	imagefilledarc($img, 150, 150, 150, 150, 0, 120, $color_green, IMG_ARC_PIE);
	
	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?>