<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 3-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$price = 109;		//กำหนดราคา
$pay = 1000;			//กำหนดจำนวนเงินที่จ่าย
echo "ราคารวม: $price <br />";
echo "จ่าย: $pay <br />";

if($pay < $price) {	
	echo "จำนวนเงินที่จ่ายไม่พอ";
}
else if($pay == $price) {
	echo "จำนวนเงินที่จ่ายพอดี";
}
else {
	//ให้ $remainder คือเงินทอนที่เหลืออยู่
	$remainder = $pay - $price;
	
	//นำเงินทอนที่เหลืออยู่ไปคำนวณหาจำนวนธนบัตรและเหรียญแต่ละชนิด
	//โดยเริ่มจากธนบัตรที่มีค่าสูงสุดลงไปตามลำดับ ตามหลักการที่ได้กล่าวมาแล้ว
	$b1000 = floor($remainder/1000);
	$remainder -= $b1000 * 1000;

	$b500 = floor($remainder/500);
	$remainder -= $b500 * 500;

	$b100 = floor($remainder/100);
	$remainder -= $b100 * 100;

	$b50 = floor($remainder/50);
	$remainder -= $b50 * 50;

	$b20 = floor($remainder/20);
	$remainder -= $b20 * 20;

	$b10 = floor($remainder/10);
	$remainder -= $b10 * 10;
	
	$b5 = floor($remainder/5);
	$remainder -= $b5 * 5;

	$b2 = floor($remainder/2);
	$remainder -= $b2 * 2;
	
	$b1 = floor($remainder/1);
	$remainder -= $b1 * 1;

	$s50 = floor($remainder/0.50);
	$remainder -= $s50 * 0.50;
	
 	$s25 = floor($remainder/0.25);

 	echo "เงินทอน: " . ($pay - $price) . "<p>";

 	//แสดงเฉพาะธนบัตรและเหรียญที่ต้องทอนเท่านั้น
 	if($b1000 > 0) {
	 	echo "฿1000 => " . $b1000 . "<br />";
 	}
 	if($b500 > 0) {
	 	echo "฿500 => " . $b500 . "<br />";
 	}
 	if($b100 > 0) {
	 	echo "฿100 => " . $b100 . "<br />";
 	}
 	if($b50 > 0) {
	 	echo "฿50 => " . $b50 . "<br />";
 	}
 	if($b20 > 0) {
	 	echo "฿20 => " . $b20 . "<br />";
 	}
 	if($b10 > 0) {
	 	echo "฿10 => " . $b10 . "<br />";
 	}
 	if($b5 > 0) {
	 	echo "฿5 => " . $b5 . "<br />";
 	}
 	if($b2 > 0) {
	 	echo "฿2 => " . $b2 . "<br />";
 	}
 	if($b1 > 0) {
	 	echo "฿1 => " . $b1 . "<br />";
 	}
 	if($s50 > 0) {
	 	echo "฿0.50 => " . $s50 . "<br />";
 	}
 	if($s25 > 0) {
	 	echo "฿0.25 => " . $s25 . "<br />";
 	}
}
?>
</body>
</html>