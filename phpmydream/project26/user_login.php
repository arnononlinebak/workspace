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
		echo "<font size=5 color=red>��͡�Թ�������ʼ�ҹ���١��ͧ<p />
				 <a href=\"javascript: history.back()\">��͹��Ѻ����</a></font>";
	}
	else {
		$_SESSION['user_name'] = mysql_result($result, 0, "user_name");
		$_SESSION['user_id'] =  mysql_result($result, 0, "user_id");
		
	 	header("Refresh: 3; url=index.php");
	 	echo "��ҹ�������к����� �С�Ѻ���˹����ѡ� 3 �Թҷ�";
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
<h3 align="center">��Ҫԡ�������к�</h3>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table border="0" cellspacing="3" cellpadding="0" align="center">
    <tr>
      <td>��͡�Թ:</td>
      <td><label>
        <input name="login" type="text" id="login" />
      </label></td>
    </tr>
    <tr>
      <td>���ʼ�ҹ:</td>
      <td><label>
        <input name="pswd" type="password" id="pswd" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="�������к�" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>