<?php
session_start();

if(isset($_SESSION['login'])) {
	unset($_SESSION['login']);
	
	header("Refresh: 5; url=index.php");
	
	echo "<h3>ท่านออกจากระบบแล้ว จะกลับสู่หน้าหลักใน 5 วินาที</h3>";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 9-1: Logout</title>
</head>

<body>
</body>
</html>
