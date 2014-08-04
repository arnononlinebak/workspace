<?php
session_start();

if(!empty($_POST['login'])) {
	$_SESSION['login'] = $_POST['login'];
	
	header("Refresh: 5; url=index.php");
	
	echo "<h3>ท่านเข้าสู่ระบบแล้ว จะกลับสู่หน้าหลักใน 5 วินาที</h3>";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 9-1: Login</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form1" id="form1">
	Login:
	  <input type="text" name="login">
	<input type="submit"  value="เข้าสู่ระบบ"><br>
</form>
</body>
</html>
