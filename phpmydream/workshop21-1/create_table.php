<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 21-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sql = "CREATE TABLE IF NOT EXISTS pdf_report(
		id INT AUTO_INCREMENT PRIMARY kEY,
		name VARCHAR(50),
		price SMALLINT,
		soldout SMALLINT);";
		
mysql_query($sql);

//เติมข้อมูลลงในตารางสำหรับทดสอบ
$sql = "REPLACE INTO pdf_report VALUES";
for($i=1; $i<=5; $i++) {
	if($i>1) {
		$sql .= ",";
	}
	$sql .= "(0, 'สินค้า $i', $i*100, $i*10)";
}
$sql .= ";";

mysql_query($sql);
?>
</body>
</html>