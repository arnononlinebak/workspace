<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sql = "CREATE TABLE mailinglist(
		 	name VARCHAR(40),
		 	email VARCHAR(50) UNIQUE);";
		
mysql_query($sql);
?>