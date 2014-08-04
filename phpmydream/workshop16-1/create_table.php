<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 16-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
@mysql_connect("localhost", "root", "leaf")  or die(mysql_error());
mysql_select_db("phpmysql");

$sql = "CREATE TABLE IF NOT EXISTS uploadfile(
			id SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(150),
 			type VARCHAR(150),
 			size INT UNSIGNED,
			content MEDIUMBLOB);";
			
mysql_query($sql);
?>
</body>
</html>
