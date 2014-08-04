<?php
$img = imageCreate(300, 300);
$bg = imageColorAllocate($img, 222, 222, 222);

$black = imageColorAllocate($img, 0, 0, 0);
$red = imageColorAllocate($img, 255, 0, 0);
$green = imageColorAllocate($img, 0, 255, 0);
$blue = imageColorAllocate($img, 0, 0, 255);

//ดวงอาทิตย์
imageFilledEllipse($img, 30,30, 30,30, $red);

//หลังคาบ้าน
$points = array(0,100, 150,20, 300,100);
imageFilledPolygon($img, $points, 3, $green);

//ตัวบ้าน
imageRectangle($img, 50,100, 250,250, $black);

//ประตู
imageFilledRectangle($img, 120,150, 180,250, $blue);

//$str = "Drawing with PHP";
//imageString($img, 5, 80, 270, $str, $black);


$str = "ขายด่วน! บ้านเดี่ยวพร้อมที่ดิน";
$font = "tahoma.ttf";
$text = iconv("tis-620", "utf-8", $str);   

$fontsize = 18;
$x = 10;
//แนวแกน Yให้อยู่ถัดจากขอบล่างเท่ากับครึ่ีงหนึ่งของขนาดฟอนต์
$y = imageSy($img) - $fontsize/2;	

imageTTFText($img, $fontsize, 0, $x,$y, $red, $font, $text);



//ส่งภาพกลับไปยังเบราเซอร์
header("Content-type: image/png");
imagePng($img);

imageDestroy($img);
?>