<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 9-1: หน้าหลัก</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
if(!isset($_SESSION['login'])) {
	echo "<h3><font color=red>ท่านยังไม่ได้ Login เข้าสู่ระบบ</font></h3>
			<a href=login.php>คลิกที่นี่เพื่อเข้าสู่ระบบ</a>";
}
else {
	echo "<h3>ยินดีต้อนรับ: {$_SESSION['login']}</h3>
			<a href=logout.php>ออกจากระบบ</a>";
}
?>
</body>
</html>
