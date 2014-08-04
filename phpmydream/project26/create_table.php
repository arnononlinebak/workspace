<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_query("CREATE DATABASE blog;");
mysql_select_db("blog");

$sql = "CREATE TABLE user(
				user_id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				login VARCHAR(100) UNIQUE,
				password VARCHAR(20),
				user_name VARCHAR(50));";
				
@mysql_query($sql) or die(mysql_error());			

$sql = "CREATE TABLE entry(
		 		entry_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				cat_id VARCHAR(10), 
				user_id  INT UNSIGNED,
		 		date_post DATETIME,
		 		title VARCHAR(200),
		 		content TEXT,
		 		user_name VARCHAR(100),
				num_comment SMALLINT UNSIGNED);";
				
@mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE comment(
		 		comment_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 		entry_id INT UNSIGNED,
		 		date_post DATETIME,				
		 		message TEXT,
		 		name VARCHAR(100),
				INDEX(entry_id));";
		
@mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE img(
				img_id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				user_id  INT UNSIGNED,
			 	name VARCHAR(150),
 			 	type VARCHAR(150),
 			 	size INT UNSIGNED,
			 	content MEDIUMBLOB);";
				
@mysql_query($sql) or die(mysql_error());	
?>