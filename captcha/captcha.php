<?php

session_start();

function random(){
	$string = "abcdefghijklmnopqrstuvwxyz0123456789";
	
	$return = "";
	
	while(strlen($return) < 4){
		$number = rand(0,strlen($string) - 1);
		$return .= $string[$number]; 
	}
	
	return $return;
}

$text =  random();

$img = imagecreate("60","20");

$text_r = rand(0,255);
$text_g = rand(0,255);
$text_b = rand(0,255);

$line_r = rand(0,255);
$line_g = rand(0,255);
$line_b = rand(0,255);

$bgcolor = imagecolorallocate($img, 255, 255, 255);
$textcolor = imagecolorallocate($img, $text_r, $text_g, $text_b);
$linecolor = imagecolorallocate($img, $line_r, $line_g, $line_b);

imagefill($img, 0, 0, $bgcolor);

imagestring($img, 5, 10, 0, $text, $textcolor);

imagesetthickness($img, 2);

imageline($img, 0, 10, 60, 10, $linecolor);


$_SESSION['captcha'] = $text;


header("Content-Type: image/gif");
imagegif($img);
imagedestroy($img);



?>