<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_query("CREATE DATABASE chatroom;");
mysql_select_db("chatroom");
	
$sql = "CREATE TABLE chatter(
		name VARCHAR(30) PRIMARY KEY,
		join_time DATETIME,
		last_post_time DATETIME);";
		
mysql_query($sql);

$sql = "CREATE TABLE message(
		 		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		 		name VARCHAR(30),
		 		msg VARCHAR(250),
		 		color VARCHAR(20),
		 		post_time DATETIME);";
				
mysql_query($sql);
?>