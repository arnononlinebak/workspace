<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 5-4</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$birth = strtotime("12/10/1980");
echo date("ดิฉันเกิดเมื่อ j-m-Y", $birth);

echo "<p />";

$days = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
$months = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
					"กรกฎาคม","สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

$d = date('w') ;
$day = $days[$d];

$date = date('j');

$m = date('m') - 1;
$month = $months[$m];

$year = date('Y') + 543;

echo "วันนี้ตรงกับวัน $day 
 	วันที่ $date เดือน $month ปี $year ";
echo date("ขณะนี้เวลา H:i:s");
?>
</body>
</html>
