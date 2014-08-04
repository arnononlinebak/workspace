<?php
	$points = array(
            40,  50,  // Point 1
            20,  240, // Point 2
            60,  60,  // Point 3
            240, 20,  // Point 4
            50,  40,  // Point 5
            10,  10   // Point 6
            );

	$img = imagecreate(250, 250);

	$bg   = imagecolorallocate($img, 225, 225, 225);
	$red = imagecolorallocate($img, 255, 0, 0);

	imagefilledpolygon($img, $points, 6, $red);

	header("Content-type: image/gif");
	imagegif($img);

	imagedestroy($img);
?> 