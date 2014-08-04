<?php
session_start();

$str = md5(crypt("captcha"));
$captcha = strtoupper(substr($str, 0, 4)); //เอา 4 ตัวแรกแล้วแปลงเป็นตัวพิมพ์ใหญ่
$_SESSION['captcha'] = $captcha;	//เก็บรหัสไว้แบบเซสชัน เพื่อใช้ตรวจสอบในภายหลัง

$img = imageCreate(55, 35);
$bg = imageColorAllocate($img, 0, 0, 0);
$color = imageColorAllocate($img, 255, 255, 255);
imageString($img, 5, 10, 10, "$captcha", $color);

header("Content-type: image/gif");
imageGif($img);
imageDestroy($img);
?>