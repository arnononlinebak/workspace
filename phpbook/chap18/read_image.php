<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");

	$id = $_GET['id'];
	$sql = "SELECT * FROM image WHERE id = $id;";
	$qry = mysql_query($sql);

	$type = mysql_result($qry, 0, "img_type");
	header("Content-type: $type");

	$data = mysql_result($qry, 0, "image");
	echo $data;

	mysql_close($conn);
?>