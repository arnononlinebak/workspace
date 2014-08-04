<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sql = "CREATE TABLE stats(
		 	browser VARCHAR(10) UNIQUE,
		 	num_request MEDIUMINT UNSIGNED);";
		
mysql_query($sql);

//เพิ่มข้อมูลชนิดของเบราเซอร์เอาไว้ล่วงหน้า
mysql_query("INSERT INTO stats VALUES('IE', 1);");
mysql_query("INSERT INTO stats VALUES('Firefox', 1);");
mysql_query("INSERT INTO stats VALUES('Chrome', 1);");
mysql_query("INSERT INTO stats VALUES('Safari', 1);");
mysql_query("INSERT INTO stats VALUES('Opera', 1);");
mysql_query("INSERT INTO stats VALUES('Others', 1);");
?>