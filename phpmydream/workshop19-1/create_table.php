<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");
	
$sql = "CREATE TABLE member(
		id INT AUTO_INCREMENT PRIMARY KEY,
		login VARCHAR(20) UNIQUE,
		password VARCHAR(20),
		email VARCHAR(150) UNIQUE,
		last_access DATE,
		confirmation VARCHAR(10));";

$qry = mysql_query($sql);
?>