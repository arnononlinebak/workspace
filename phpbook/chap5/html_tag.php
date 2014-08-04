<html>
<body>
<?php
	$str = "<font size=3>แท็ก \"<b>\" ใช้เปลี่ยนข้อความให้เป็นตัวหนา
		และแท็ก '<br>' ใช้สำหรับขึ้นบรรทัดใหม่</b></font>";
	echo "<u>เขียนสตริงลงไปตรงๆ</u><br>$str<p>";

	$sp_char = htmlspecialchars($str, ENT_QUOTES);
	echo "<u>ใช้ฟังก์ชัน htmlspecialchars()</u><br>$sp_char<p>";

	$strip = strip_tags($str);
	echo "<u>ใช้ฟังก์ชัน strip_tags()</u><br>$strip";
?>
</body>
</html>
