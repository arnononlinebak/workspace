<?php
@mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_query("CREATE database ecard;");
mysql_select_db("ecard");

$sql = "CREATE TABLE card(
			id SMALLINT AUTO_INCREMENT PRIMARY KEY,
			category VARCHAR(10),
			title VARCHAR(30),
			name VARCHAR(30),
			type VARCHAR(30),
			size MEDIUMINT,
			content MEDIUMBLOB);";
			
mysql_query($sql);
?>
