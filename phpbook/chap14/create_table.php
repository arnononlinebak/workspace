<?php
	$conn = mysql_connect("localhost", "root", "123");
	if(!$conn) {
		echo "ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้";
		exit();
	}
	$db = mysql_query("CREATE DATABASE mydb2;");
	if(!$db) {
		echo "ไม่สามารถสร้างฐานข้อมูลได้";
 		mysql_close($conn);
		exit();
	}

	mysql_query("USE mydb2;");

	$sql_tbl = "CREATE TABLE customers(";
	$sql_tbl .= "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
	$sql_tbl .= "name VARCHAR(30) NOT NULL INDEX,";
	$sql_tbl .= "address VARCHAR(250));";
	$create_tbl = mysql_query($sql_tbl);
	if(!$create_tbl) {
 		echo "ไม่สามารถสร้างตารางฐานข้อมูลได้";
 		mysql_close($conn);
		exit();
	}
	
 	echo "การสร้างตารางฐาเสร็จสมบูรณ์แล้ว";
	mysql_close($conn);

?>
