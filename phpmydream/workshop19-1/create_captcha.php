<?php
session_start();

$str = md5(crypt("captcha"));
$captcha = strtoupper(substr($str, 0, 4)); //��� 4 ����á�����ŧ�繵�Ǿ�����˭�
$_SESSION['captcha'] = $captcha;	//���������Ẻ�ʪѹ �������Ǩ�ͺ������ѧ

$img = imageCreate(55, 35);
$bg = imageColorAllocate($img, 0, 0, 0);
$color = imageColorAllocate($img, 255, 255, 255);
imageString($img, 5, 10, 10, "$captcha", $color);

header("Content-type: image/gif");
imageGif($img);
imageDestroy($img);
?>