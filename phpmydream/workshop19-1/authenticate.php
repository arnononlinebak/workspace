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
		//�ҡ�����š���׹�ѹ�ѧ���� �ʴ�����ѧ������׹�ѹ�ҧ�����
		//�����ҡ�׹�ѹ�ҧ��������� ������㹿�Ŵ���ж١ź���(ྨ confirmation.php)
		if(!empty($confirmation)) {
			die("��ҹ�ѧ������׹�ѹ�ҧ�����");
		}
		else {
			$_SESSION['user'] = $login;
		}
	}
	else {
		die("Login ���� Password ���١��ͧ");
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
 	echo "<center><h1>��ҹ�������к�����</h1>
 			 <a href=\"index.php\">˹���á</a>
 			</center>";
}
?>
</body>
</html>
