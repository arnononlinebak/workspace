<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 22-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$str = $_SERVER['HTTP_USER_AGENT'];

//ตรวจสอบชื่อเบราเซอร์ โดยหากชื่อใดต่อไปนี้ ปรากฏอยู่ในสตริงที่อ่านได้
//ก็แสดงว่าผู้ใช้คนนี้ กำลังใช้เบราเซอร์ตัวนั้นอยู่
if(eregi("MSIE", $str)) {
	$browser = "IE";
}
elseif(eregi("Firefox", $str)) {
	$browser = "Firefox";
}
else if(eregi("Chrome", $str)) {
	$browser = "Chrome";
}
else if(eregi("Safari", $str) && !eregi("Chrome", $str)) {
	$browser = "Safari";
}
else if(eregi("Opera", $str)) {
	$browser = "Opera";
}
else {
	$browser = "Others";
}

echo "<h2>เบราเซอร์ที่ท่านใช้คือ: $browser</h2>
		<p />
		<a href=\"show_stats.php\">ดูสถิติการใช้เบราเซอร์</a>";

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

//อัปเดตจำนวนครั้งที่มีผู้ใช้เบราเซอร์ชนิดนั้น โดยบวกจากค่าเดิมไปอีก 1
$sql = "UPDATE stats SET num_request = num_request + 1
			WHERE browser = '$browser';";

mysql_query($sql);
?>
</body>
</html>
