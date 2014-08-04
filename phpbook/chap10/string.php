<?php
	$img = imagecreate(200, 200);
	$background = imagecolorallocate($img, 225, 225, 225);
	
	$color_red = imagecolorallocate($img, 250, 0, 0);
	imagestring($img, 5, 10, 10, "PHP 5 & MySQL 5", $color_red);
	imagestringup($img, 5, 70, 170, "PHP 5 & MySQL 5", $color_red);

	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?>