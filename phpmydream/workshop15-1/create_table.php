<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 15-1/Create Table</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sql =  "CREATE TABLE IF NOT EXISTS testpaging(
			id SMALLINT AUTO_INCREMENT PRIMARY KEY,
			item VARCHAR(200));";
			
mysql_query($sql);

//เพิ่มข้อมูลในตารางสำหรับทดสอบ
for($i = 1; $i <= 123; $i++) {
	$sql = "INSERT INTO testpaging VALUES(0, 'รายการที่ $i');";
	mysql_query($sql);
}
mysql_close();
?>
</body>
</html>
