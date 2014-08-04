<?php
session_start();

if(!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="My realm"');
	header('HTTP/1.0 401 Unauthorized');
}
else {
	$login = $_SERVER['PHP_AUTH_USER'];
	$pw = $_SERVER['PHP_AUTH_PW'];
		
 	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
 	mysql_select_db("phpmysql");

	$sql = "SELECT * FROM member 
 				WHERE login = '$login' AND password = '$pw';";
				
	$result = mysql_query($sql);
	if(mysql_num_rows($result) == 1) {
		$confirmation = mysql_result($result, 0, "confirmation");
		//หากข้อมูลการยืนยันยังอยู่ แสดงว่ายังไม่ได้ยืนยันทางอีเมล
		//เพราะหากยืนยันทางอีเมลแล้ว ข้อมูลในฟิลด์นี้จะถูกลบทิ้ง(เพจ confirmation.php)
		if(!empty($confirmation)) {
			die("ท่านยังไม่ได้ยืนยันทางอีเมล");
		}
		else {
			$_SESSION['user'] = $login;
		}
	}
	else {
		die("Login หรือ Password ไม่ถูกต้อง");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 19-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
if(isset($_SESSION['user'])) {
	echo "Hello, " . $_SESSION['user'];
 	echo "<center><h1>ท่านเข้าสู่ระบบแล้ว</h1>
 			 <a href=\"index.php\">หน้าแรก</a>
 			</center>";
}
?>
</body>
</html>
