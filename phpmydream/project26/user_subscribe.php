<?php
session_start();

if($_POST)  {
	$name = $_POST['name'];
	$login = $_POST['login'];
	$pswd = $_POST['pswd'];
	$pswd2 = $_POST['pswd2'];
	
	if(empty($name)) {
		$errmsg = "��ҹ�ѧ������˹�����";
	}
	else if(!filter_var($login, FILTER_VALIDATE_EMAIL)) {
		$errmsg = "��������١��ͧ����ٻẺ";
	}
	else if($pswd != $pswd2) {
		$errmsg = "��ҹ������ʼ�ҹ�ͧ�������ç�ѹ";
	}
	else if(!eregi("[a-z0-9]{4,10}", $pswd)) {
		$errmsg = "���ʼ�ҹ��ͧ��Сͺ���� a-z ���� 0-9 �ӹǹ 4-10 ���";
	}
	else if($_POST['captcha'] != $_SESSION['captcha']) {
		$errmsg = "��ҹ����ѡ������ç�Ѻ��Ҿ";
	}

	if($errmsg != "") {
 		echo "<font size=5 color=red>$errmsg<p />
				 <a href=\"javascript: history.back()\">��͹��Ѻ����</a></font>";
	}
	else {
		include("blog.inc.php");
		my_connect();
		$sql = "INSERT INTO user VALUES
					(0, '$login', '$pswd', '$name');";
		@mysql_query($sql) or die(mysql_error());
	
		header("Refresh: 3; url=index.php");
		echo "�����Ŷ١�Ѵ������ �С�Ѻ���˹����ѡ� 3 �Թҷ�";
	}
	
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Blog: User Register</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");
?>
<p />
<h3 align="center">��Ѥ���Ҫԡ����</h3>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table border="0" cellspacing="3" cellpadding="0" align="center">
    <tr>
      <td align="right">����᷹��Ƿ�ҹ:</td>
      <td><label>
        <input name="name" type="text" id="name" />
      </label></td>
    </tr>
    <tr>
      <td align="right">�������������͡�Թ:</td>
      <td><label>
        <input name="login" type="text" id="login" />
      </label></td>
    </tr>
    <tr>
      <td align="right">���ʼ�ҹ:</td>
      <td><label>
        <input name="pswd" type="Password" id="pswd" />
      </label></td>
    </tr>
    <tr>
      <td align="right">������ʼ�ҹ���:</td>
      <td><label>
        <input name="pswd2" type="Password" id="pswd2" />
      </label></td>
    </tr>
    <tr>
      <td align="right">�ѡ�����Ҿ:</td>
      <td><label>
        <input name="captcha" type="text" id="captcha" size="4" />
        <input type="submit" name="Submit" value="��Ѥ���Ҫԡ" />
      </label></td>
    </tr>
    <tr>
      <td align="right"></td>
      <td><label><img src="captcha.php"  /></label></td>
    </tr>
  </table>
</form>
</body>
</html>