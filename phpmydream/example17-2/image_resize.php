<?php
$w_max = 150;	//กำหนดขนาดตามที่เราต้องการ
$h_max = 150;

$img_src = imageCreateFromJpeg("images/sunset.jpg");
$w_src = imagesx($img_src);
$h_src = imagesy($img_src);

if($w_src > $w_max || $h_src > $h_max) {
	if($w_src > $h_src) {
		$ratio = $w_max/$w_src;
	}
	else {
		$ratio = $h_max/$h_src;
	}
	$w_new = round($ratio * $w_src);
 	$h_new = round($ratio * $h_src);

 	$img_new = imageCreateTrueColor($w_new, $h_new);
	imageCopyResampled($img_new, $img_src, 0,0,0,0, $w_new, $h_new, $w_src, $h_src);	
}

else {
	$img_new = $img_src;
}

header("Content-type: image/jpeg");
imageJpeg($img_new);

imageDestroy($img_src);
imageDestroy($img_new);
?>