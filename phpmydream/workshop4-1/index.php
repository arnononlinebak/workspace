<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 4-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function change($change) {
	$money_type = array(1000, 500, 100, 50, 20, 10, 5, 2, 1, 0.50, 0.25);  //ชนิดของธนบัตร
	$change_type = array();		//ใช้เก็บชนิดของธนบัตรที่ต้องใช้ทอน เช่น 1000, 500, ...
	$change_num = array(); 	//ใช้จำนวนธนบัตรแต่ละชนิดที่ต้องใช้ทอน
	$remainder = $change;
	
	foreach($money_type as $type) {
		$num = floor($remainder/$type);
		$remainder -= $num * $type;
		
		//เก็บเฉพาะชนิดธนบัตรที่ต้องใช้ทอนเท่านั้น
		if($num > 0) {
			array_push($change_type, $type);
			array_push($change_num, $num);
		}
	}
	
	//ทำให้เป็น key=>value เช่น 1000=>1, 500=>3, ...
	$ch = array_combine($change_type, $change_num); 
	return $ch;
}
//--------------------------------------------------------------------------

$price = 109.75;	//กำหนดราคา
$pay = 1000;			//กำหนดจำนวนเงินที่จ่าย

echo "ราคารวม: $price <br />";
echo "จ่าย: $pay <br />";
if($pay < $price) {
	echo "่จ่ายเงินไม่พอ";
}
else if($pay == $price) {
	echo "จ่ายเงินพอดี ไม่ต้องทอน";
}
else {
	$change = $pay - $price;
	$result = change($change);

	echo "เงินทอน: " . ($pay - $price) . "<p>";
	while(list($type, $num) = each($result)) {
		echo "฿" . $type . " => " . $num . "<br />";
	}
}
?>
</body>
</html>