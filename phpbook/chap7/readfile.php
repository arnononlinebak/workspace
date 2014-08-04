<?php
 	$path = "c:/006.jpg";
	$file = fopen($path, "rb");
 	header("Content-Type: image/jpg");
 	//header("Content-Length: " . filesize($path));
 	fpassthru($file);
	fclose($file);
?>
