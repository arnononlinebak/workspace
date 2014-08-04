<?php
session_start();

if($_POST)  {
	$login = $_POST['login'];
	$pswd = $_POST['pswd'];
	
	include("blog.inc.php");
	my_connect();
	$sql = "SELECT * FROM user WHERE login = '$login' AND password = '$pswd';";
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result) != 1) {
		echo "<font size=5 color=red>ล็อกอินหรือรหัสผ่านไม่ถูกต้อง<p />
				 <a href=\"javascript: history.back()\">ย้อนกลับไปแก้ไข</a></font>";
	}
	else {
		$_SESSION['user_name'] = mysql_result($result, 0, "user_name");
		$_SESSION['user_id'] =  mysql_result($result, 0, "user_id");
		
	 	header("Refresh: 3; url=index.php");
	 	echo "ท่านเข้าสู่ระบบแล้ว จะกลับสู่หน้าหลักใน 3 วินาที";
	}
	
	exit;	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Blog: User Login</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");
?>
<p  />
<h3 align="center">สมาชิกเข้าสู่ระบบ</h3>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table border="0" cellspacing="3" cellpadding="0" align="center">
    <tr>
      <td>ล็อกอิน:</td>
      <td><label>
        <input name="login" type="text" id="login" />
      </label></td>
    </tr>
    <tr>
      <td>รหัสผ่าน:</td>
      <td><label>
        <input name="pswd" type="password" id="pswd" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="เข้าสู่ระบบ" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>