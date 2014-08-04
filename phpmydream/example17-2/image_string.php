<?php
$img = imageCreateFromJpeg("images/eclipse.jpg");
$white = imageColorAllocate($img, 255,255,255);

$font = "tahoma.ttf";
$str = "����¤���";
$text = iconv('tis-620', 'utf-8', $str);
$fontsize = 20;

//����ͤ��������觡�ҧ���᡹ X �����º�Ѻ�͹��  Tahoma (�͹�������Ҩ��ͧ��º����)
$x = ceil((imageSx($img) - (($fontsize/5) * strlen($text)))/2);

//��᡹ Y �������Ѵ�ҡ�ͺ��ҧ�������ҡѺ����˹�觢ͧ�����٧�ͧ�͹��
$y = imagesy($img) - ($fontsize/2);

imageTTFText($img, $fontsize, 0, $x, $y, $white, $font, $text);

header("Content-type: image/jpeg");
imageJpeg($img);

imageDestroy($img);
?>