<?php
	$src = createImage(100, 100);
	$color = imageColorAllocate($src, 0, 255, 0);
	imageLine($src, 10, 20, 70, 80, $color);
	header("Content-type:image/png");
	imagePng($src);
	imageDestroy($src);
?>