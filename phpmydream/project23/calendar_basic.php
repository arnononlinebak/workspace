<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Calendar Basic</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$now = strtotime("now");		//timestamp ปัจจุบัน

$month = date('n', $now);		//ลำดับของเดือนนั้น

$year = date('Y', $now);			//ปี ค.ศ. แบบเลข 4 หลัก
$year_bd = $year + 543;	//แปลงเป็นปี พ.ศ.

$first = strtotime("$year-$month-1");	//ค่า timestamp ของวันที่ 1 ของเดือนปัจจุบัน
$first_day =  date('w', $first);				//วันที่ 1 ของเดือนปัจจุบันตรงกับวันลำดับที่เท่าไร

$num_days = date('t', $now);				//จำนวนวันของเดือนปัจจุบัน

$THAI_DAYS = array("อา", "จ", "อ", "พ", "พฤ", "ศ", "ส");  //array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
$THAI_MONTHS = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
 	"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

echo "<table border=1>
 		<tr><th colspan=7>$THAI_MONTHS[$month]  $year_bd</th></tr>
 		<tr><th>" . implode("</th><th>", $THAI_DAYS) . "</th></tr>";

$start = 1 -  $first_day;
$w = 1;

for($d = $start; ; $d++) {		
	if($w == 1) {
		echo "<tr>";
	}
	
	if($d < 1) {
		echo "<td>&nbsp;</td>";
	}
	else if($d >= $num_days) {
		if($d == $num_days) {
			echo "<td>$d</td>";
		}
		else {
			echo "<td>&nbsp;</td>";
		}
		if($w == 7) {
		 	echo "</tr>";
			break;
		}
	}
	else {
		echo "<td>$d</td>";
	}

	if($w == 7) {
		echo "</tr>";
		$w = 1;
	}
	else {
		$w++;
	}
}
echo "</table>";
?>
</body>
</html>