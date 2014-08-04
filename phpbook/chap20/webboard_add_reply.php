<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");
	
	$sql = "INSERT INTO reply VALUES(";
	$sql .= "'', '$id', '$message', '$replier'";
	$sql .= ");";
	mysql_query($sql);

	$sql = "UPDATE topic SET reply = reply + 1 ";
	$sql .= "WHERE topic_id = $id; ";
	mysql_query($sql);

	mysql_close($conn);

	echo "ข้อมูลของท่านถูกจัดเก็บแล้ว";

	exit();
?>