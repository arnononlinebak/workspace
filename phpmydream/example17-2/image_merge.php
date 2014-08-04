<?php
$img_bg = imageCreateFromJpeg("images/eclipse_big.jpg");
$img_logo = imageCreateFromGif("images/php_logo.gif");

$w_bg = imagesx($img_bg);
$h_bg = imagesy($img_bg);
$w_logo = imagesx($img_logo);
$h_logo = imagesy($img_logo);

//���˹���������¢ͧ�Ҿ�����ҧ�Ҿ ��ҵ�ͧ����ҧ�Ҿ��������ҧ��ҡ��˹��ѧ���
$x = $w_bg - $w_logo;
$y = $h_bg - $h_logo;

//�� transpanrent �վ����ѧ ����շ���˹���ͧ��鹡Ѻ�Ҿ�ͧ��Ҵ���
$white = imageColorClosest($img_logo, 255,255,255);
imageColorTransparent($img_logo, $white);

imageCopyMerge($img_bg,$img_logo,$x,$y,0,0,
 	$w_logo,$h_logo,50);

header("Content-type: image/jpeg");
imageJpeg($img_bg);

imageDestroy($img_bg);
imageDestroy($img_logo);
?>