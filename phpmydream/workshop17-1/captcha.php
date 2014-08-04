<?php
$img = imageCreate(130, 50);
$bg = imageColorAllocate($img, 0, 0, 0);		//�����ѧ�մ�
$gray = imageColorAllocate($img, 150, 150, 150);	//�������
$red = imageColorAllocate($img, 255, 0, 0);		//ʵ�ԧ��ᴧ

$width = imagesx($img);
$height = imagesy($img);

//�����ǵ��
$x1 = 0; $y1 = 0;
$x2 = 0; $y2 = $height;
$num_vr_lines = ceil($width/10);	  
for($i = 0; $i < $num_vr_lines; $i++) {
	imageLine($img, $x1, $y1, $x2, $y2, $gray);
	$x1 += 10; $x2 += 10;	
}

//�����ǹ͹ 
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
$captcha = strtoupper(substr($str, 0, 4));		//��� 4 ����á����ŧ�繵�Ǿ�����˭�

$x = 10; $y = 30;				//�ش�������㹡���ѡ��е���á
$deg = array(0, 30, -30);	//���㹡����ع

for($i = 0; $i < strlen($str); $i++) {
	$d = rand(0, 2);			
	imageTTFText($img, $fontsize, $deg[$d], $x, $y, 
	 						$red, $font, $captcha[$i]);
							
	$x += 30;	//������ҧ�����ҧ�ѡ��й���ͧ�������ѹ��Ѻ��Ҵ�͹�����
}

header("Content-type: image/png");
imagePng($img);
imageDestroy($img);
?>