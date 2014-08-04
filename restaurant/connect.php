<?php
	$conn = mysql_connect('localhost','root','') or die('Could not connect to server');
	mysql_select_db('restaurant',$conn) or die("Could not use database");
?>