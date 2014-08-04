<?php
$img = imageCreateFromJpeg("images/eclipse.jpg");
$white = imageColorAllocate($img, 255,255,255);

$font = "tahoma.ttf";
$str = "สุริยคราส";
$text = iconv('tis-620', 'utf-8', $str);
$fontsize = 20;

//ให้ข้อความอยู่กึ่งกลางในแนวแกน X ซึ่งเทียบกับฟอนต์  Tahoma (ฟอนต์อื่นๆอาจต้องเทียบใหม่)
$x = ceil((imageSx($img) - (($fontsize/5) * strlen($text)))/2);

//แนวแกน Y ให้อยู่ถัดจากขอบล่างขึ้นมาเท่ากับครึ่งหนึ่งของความสูงของฟอนต์
$y = imagesy($img) - ($fontsize/2);

imageTTFText($img, $fontsize, 0, $x, $y, $white, $font, $text);

header("Content-type: image/jpeg");
imageJpeg($img);

imageDestroy($img);
?>