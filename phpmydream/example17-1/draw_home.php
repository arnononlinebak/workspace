<?php
$img = imageCreate(300, 300);
$bg = imageColorAllocate($img, 222, 222, 222);

$black = imageColorAllocate($img, 0, 0, 0);
$red = imageColorAllocate($img, 255, 0, 0);
$green = imageColorAllocate($img, 0, 255, 0);
$blue = imageColorAllocate($img, 0, 0, 255);

//�ǧ�ҷԵ��
imageFilledEllipse($img, 30,30, 30,30, $red);

//��ѧ�Һ�ҹ
$points = array(0,100, 150,20, 300,100);
imageFilledPolygon($img, $points, 3, $green);

//��Ǻ�ҹ
imageRectangle($img, 50,100, 250,250, $black);

//��е�
imageFilledRectangle($img, 120,150, 180,250, $blue);

//$str = "Drawing with PHP";
//imageString($img, 5, 80, 270, $str, $black);


$str = "��´�ǹ! ��ҹ����Ǿ�������Թ";
$font = "tahoma.ttf";
$text = iconv("tis-620", "utf-8", $str);   

$fontsize = 18;
$x = 10;
//��᡹ Y�������Ѵ�ҡ�ͺ��ҧ��ҡѺ����է˹�觢ͧ��Ҵ�͹��
$y = imageSy($img) - $fontsize/2;	

imageTTFText($img, $fontsize, 0, $x,$y, $red, $font, $text);



//���Ҿ��Ѻ��ѧ�������
header("Content-type: image/png");
imagePng($img);

imageDestroy($img);
?>