<?php
	if($_FILES['img']['error']!=0) {
		echo "File Uploaded Error!";
		exit();
	}

	$temp_file = $_FILES['img']['tmp_name'];
	$file = fopen($temp_file, "r");
	$img_ = fread($file, filesize($temp_file));
	$img = addslashes($img_);
	fclose($file);

	$name = $_FILES['img']['name'];
	$type = $_FILES['img']['type'];
	$size = $_FILES['img']['size'];

	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");

	$sql = "INSERT INTO image VALUES";
	$sql.= "('', '$img', '$name', '$type', '$size');";

	mysql_query($sql);

	mysql_close($conn);

	echo "Image has been saved";
?>