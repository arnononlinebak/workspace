<?php
$img = imageCreate(130, 50);
$bg = imageColorAllocate($img, 0, 0, 0);		//พื้นหลังสีดำ
$gray = imageColorAllocate($img, 150, 150, 150);	//เส้นสีเทา
$red = imageColorAllocate($img, 255, 0, 0);		//สตริงสีแดง

$width = imagesx($img);
$height = imagesy($img);

//เส้นในแนวตั้ง
$x1 = 0; $y1 = 0;
$x2 = 0; $y2 = $height;
$num_vr_lines = ceil($width/10);	  
for($i = 0; $i < $num_vr_lines; $i++) {
	imageLine($img, $x1, $y1, $x2, $y2, $gray);
	$x1 += 10; $x2 += 10;	
}

//เส้นในแนวนอน 
$x1 = 0; $y1 = 0;
$x2 = $width; $y2 = 0;
$num_hr_lines = ceil($height/10);
for($i = 0; $i < $num_hr_lines; $i++) {
	imageLine($img, $x1, $y1, $x2, $y2, $gray);
	$y1 += 10; $y2 += 10;
}

$font = "tahoma.ttf";
$fontsize = 20;
$str = md5(crypt("captcha"));
$captcha = strtoupper(substr($str, 0, 4));		//เอา 4 ตัวแรกและแปลงเป็นตัวพิมพ์ใหญ่

$x = 10; $y = 30;				//จุดเริ่มต้นในการอักขระตัวแรก
$deg = array(0, 30, -30);	//มุมในการหมุน

for($i = 0; $i < strlen($str); $i++) {
	$d = rand(0, 2);			
	imageTTFText($img, $fontsize, $deg[$d], $x, $y, 
	 						$red, $font, $captcha[$i]);
							
	$x += 30;	//ระยะห่างระหว่างอักขระนี้ต้องให้สัมพันธ์กับขนาดฟอนต์ด้วย
}

header("Content-type: image/png");
imagePng($img);
imageDestroy($img);
?>