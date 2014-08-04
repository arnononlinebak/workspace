<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Calendar Style</title>
<link rel="stylesheet" href="../css/style.css"  />
<style>
	.sun { color: red; }
	.sat { color: #bbbbbb; }
	.gen {color: black; }
</style>
</head>

<body>
<?php
$THAI_DAYS = array("อา", "จ", "อ", "พ", "พฤ", "ศ", "ส"); 
$THAI_MONTHS = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", 
 		"มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

$time = strtotime("now");

$y = date('Y', $time);
$y_bd = $y + 543;
$m = date('n', $time);

echo "<table cellspacing=1 cellpadding=7 bgcolor=powderblue>
		<tr>
			<th colspan=7>$THAI_MONTHS[$m]  $y_bd</th>
		</tr>
 		<tr><th>" . implode("</th><th>", $THAI_DAYS) . "</th></tr>";
	
$first = strtotime("$y-$m-1");
$first_day =  date('w', $first);
$num_days = date('t', $time);

$w = 1;
$start = 1 -  $first_day;
$today = date("Y-n-j");

$bgcolor = "white";
$class = "gen";

for($d = $start; ; $d++) {
	$date = "$y-$m-$d";

	if($today == $date) {
		$bgcolor = "yellow";
	}
	
	if($w == 1) {
		echo "<tr align=center bgcolor=white>";
		$class = "sun";
	}
	else if($w == 7) {
		$class = "sat";
	}
	else {
		$class = "gen";
	}
	
	if($d < 1) {
		echo "<td>&nbsp;</td>";
	}
	else if($d >= $num_days) {
		if($d == $num_days) {
			echo "<td bgcolor=$bgcolor class=$class>$d</td>";
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
		echo "<td bgcolor=$bgcolor class=$class>$d</td>";
	}

	if($w == 7) {
		echo "</tr>";
		$w = 1;
	}
	else {
		$w++;
	}
	$bgcolor = "white";
}
echo "</table>";
?>
</body>
</html>
