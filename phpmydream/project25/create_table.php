<?php
@mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_query("CREATE DATABASE webboard;");
mysql_select_db("webboard");

$sql = "CREATE TABLE topic(
		 		topic_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 		title VARCHAR(200),
		 		details TEXT,
		 		name VARCHAR(100),
		 		date_post DATETIME,
				num_reply SMALLINT UNSIGNED,
		 		ip VARCHAR(15));";
				
@mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE reply(
		 		reply_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 		topic_id INT UNSIGNED,
		 		message TEXT,
		 		name VARCHAR(100),
		 		date_reply DATETIME,
		 		bgcolor VARCHAR(30),
		 		ip VARCHAR(15),
				INDEX(topic_id)
			);";
		
@mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE alert(
		 		topic_id INT UNSIGNED,
		 		reply_id INT UNSIGNED,
		 		PRIMARY KEY(topic_id, reply_id));";

@mysql_query($sql) or die(mysql_error());
?>