<?php
	$img = imagecreate(250, 250);

	$bg   = imagecolorallocate($img, 225, 225, 225);
	$black = imagecolorallocate($img, 0, 0, 0);

	imageellipse($img, 100, 100, 100, 100, $black);
	imageellipse($img, 150, 100, 100, 100, $black);
 	imageellipse($img, 125, 150, 100, 100, $black);

	$red = imagecolorallocate($img, 255, 0, 0);
	$white = imagecolorallocate($img, 255, 255, 255);
	$light_gray = imagecolorallocate($img, 192, 192, 192);

	imagefill($img, 120, 80, $red);
	imagefill($img, 100, 120, $white);
	imagefill($img, 150, 120, $light_gray);

	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?> 