<?php
	$conn = mysql_connect("localhost", "root", "123");
	if(!$conn) {
		echo "�������ö�������͡Ѻ�ҹ��������";
		exit();
	}
	$db = mysql_query("CREATE DATABASE mydb2;");
	if(!$db) {
		echo "�������ö���ҧ�ҹ��������";
 		mysql_close($conn);
		exit();
	}

	mysql_query("USE mydb2;");

	$sql_tbl = "CREATE TABLE customers(";
	$sql_tbl .= "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
	$sql_tbl .= "name VARCHAR(30) NOT NULL INDEX,";
	$sql_tbl .= "address VARCHAR(250));";
	$create_tbl = mysql_query($sql_tbl);
	if(!$create_tbl) {
 		echo "�������ö���ҧ���ҧ�ҹ��������";
 		mysql_close($conn);
		exit();
	}
	
 	echo "������ҧ���ҧ����������ó�����";
	mysql_close($conn);

?>
