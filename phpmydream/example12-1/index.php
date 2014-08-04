<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874" />
<title>Example 12-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
@mysql_connect("localhost","root","leaf") 
 	or die("Connection Error</body></html>");
	
//ถ้ายังไม่มีฐานข้อมูล ให้สร้างขึ้นมาก่อน โดยส่งคำสั่ง SQL ในแบบสตริงสำหรับสร้างฐานข้อมูล
mysql_query("CREATE DATABASE IF NOT EXISTS phpmysql;");
mysql_select_db("phpmysql");		//เลือกฐานข้อมูล

//คำสั่ง SQL สำหรับการสร้างตาราง
$sql_create_tb = "CREATE TABLE people(
							id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
							name VARCHAR(50), 
							address TEXT, 
							email VARCHAR(50), 
							birthday DATE);";

$qry = mysql_query($sql_create_tb);
if(!$qry) {
	echo "การสร้างตาราง เกิดข้อผิดพลาด <br />";
}
else {
	echo "การสร้างตาราง เสร็จเรียบร้อย <br />";
}

//คำสั่ง SQL สำหรับเพิ่มข้อมูลลงในตาราง ซึ่งเป็นรูปแบบการเพิ่มพร้อมกันหลายแถว
$sql_insert = "INSERT INTO people VALUES
	 			('0', 'มิตรชัย บัญชา', 'บางขุนเทียน กรุงเทพ', 
 					'mitchai_banchar@hotmail.com', '1975-01-31'),

	 			('0', 'สัญญา สายัณห์', 'ปากเกล็ด นนทบุรี', 
 					'sunyasayan@gmail.com', '1978-10-31'),

	 			('0', 'พุ่มพวง ดวงอาทิตย์', 'สามพราน นครปฐม', 
 					'ppsun@gmail.com', '1980-12-12');";
						
$qry = mysql_query($sql_insert);
if(!$qry) {
	echo "การเพิ่มข้อมูล เกิดข้อผิดพลาด <br />";
}
else {
	echo "การเพิ่มข้อมูล เสร็จเรียบร้อย <br />";
}
?>
</body>
</html>