<?php
	$img = imagecreate(200, 200);
	$background = imagecolorallocate($img, 225, 225, 225);
	imagesetthickness($img, 5);

	$black_line = imagecolorallocate($img, 0, 0, 0);
	imagerectangle($img, 100, 20, 100, 180, $black_line);

	$red_line = imagecolorallocate($img, 255, 0, 0);
	imageline($img, 20, 100, 180, 100, $red_line);
	
	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?>

