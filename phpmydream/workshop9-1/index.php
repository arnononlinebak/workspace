<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 9-1: ˹����ѡ</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
if(!isset($_SESSION['login'])) {
	echo "<h3><font color=red>��ҹ�ѧ����� Login �������к�</font></h3>
			<a href=login.php>��ԡ����������������к�</a>";
}
else {
	echo "<h3>�Թ�յ�͹�Ѻ: {$_SESSION['login']}</h3>
			<a href=logout.php>�͡�ҡ�к�</a>";
}
?>
</body>
</html>
