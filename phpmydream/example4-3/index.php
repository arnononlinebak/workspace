<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 4-3</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$a = array('th'=>"Thailand", 'jp'=>"Japan", 'kr'=>"Korea");

//ใช้ลูป while เพื่อให้เลื่อนพอยเตอร์ไปเรื่อยๆจนกว่าจะคืนค่า false
while(list($key, $value) = each($a)) {
	echo "$key => $value <br />";
}
?>
</body>
</html>
