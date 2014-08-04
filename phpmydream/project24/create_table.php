<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_query("CREATE DATABASE poll;");
mysql_select_db("poll");

$sql = "CREATE TABLE topic(
				topic_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				title VARCHAR(200),
				num_votes SMALLINT UNSIGNED,
				start_date DATE,
				end_date DATE);";

mysql_query($sql);

$sql = "CREATE TABLE choice(
				choice_id  SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				topic_id  SMALLINT UNSIGNED,
				item VARCHAR(150),
				score  SMALLINT UNSIGNED);";

mysql_query($sql);
?>