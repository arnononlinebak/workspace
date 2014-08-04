<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 5-3</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<b>การใช้ nl2br()</b>
<?php
$str = "บรรทัดที่ 1
		   บรรทัดที่ 2
		   บรรทัดที่ 3";
		
echo "<p />เขียนสตริงลงไปโดยตรง => $str";
	
$s = nl2br($str);
echo "<p />เขียนสตริงหลังจากใช้ nl2br() => $s";

echo "<hr />
 		<b>การใช้ฟังก์ชันเกี่ยวกับ HTML</b><p />";

$str = "<font size=4>แท็ก \"<b>\" ใช้เปลี่ยนข้อความให้เป็นตัวหนา
	 		และแท็ก '<br />' ใช้สำหรับขึ้นบรรทัดใหม่</b></font>";
		
echo "<p /><u>เขียนสตริงลงไปตรงๆ:</u><br />" . $str;

$sp_char = htmlspecialchars($str, ENT_QUOTES);
echo "<p /><u>ใช้ฟังก์ชัน htmlspecialchars(): </u><br />" . $sp_char;

$strip = strip_tags($str);
echo "<p /><u>ใช้ฟังก์ชัน strip_tags(): </u><br />" . $strip;
?>
</body>
</html>
