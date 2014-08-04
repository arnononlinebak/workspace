<?php
@mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_query("CREATE DATABASE auction;");
mysql_select_db("auction");

$sql = "CREATE TABLE user(
				user_id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				login VARCHAR(100) UNIQUE,
				password VARCHAR(20),
				user_name VARCHAR(50) UNIQUE);";
				
@mysql_query($sql) or die(mysql_error());			

$sql = "CREATE TABLE item(
		 		item_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				user_id  INT UNSIGNED,
				item_name VARCHAR(100),
		 		description TEXT,
		 		starting_price MEDIUMINT UNSIGNED,
				end_date DATE,
				notified TINYINT);";
				
@mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE bid(
		 		bid_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 		item_id INT UNSIGNED,
				user_id INT UNSIGNED,
		 		offer INT UNSIGNED);";
		
@mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE img(
				img_id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				item_id  INT UNSIGNED,
 			 	type VARCHAR(150),
			 	content MEDIUMBLOB);";
				
@mysql_query($sql) or die(mysql_error());	
?>