<?php
session_start();
$errmsg = "";

if(isset($_POST['login']) && isset($_SESSION['captcha'])) {
	$pattern = "^([a-z])([a-z0-9]{5,19})$";	//�ٻẺ login ��� password
	
	$login = $_POST['login'];
	if(!ereg($pattern, $login)) {
		$errmsg .= "<li>Login ��ͧ��Сͺ���� a-z ���� 0-9 �����ҧ 6-20 ���";
	}
	
	$pswd = $_POST['pswd'];
	if(!ereg($pattern, $pswd)) {
		$errmsg .= "<li>Password ��ͧ��Сͺ���� a-z ���� 0-9 �����ҧ 6-20 ���";
	}
	
	$email = $_POST['email'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errmsg .= "<li>��� Email ���ç����ٻẺ";
	}
	
	$captcha = $_POST['captcha'];
	if($captcha != $_SESSION['captcha']) {
		$errmsg .= "<li>����ѡ������ç�Ѻ��Ҿ";
	}
	
	//�������բ�ͼԴ��Ҵ ���ѹ�֡ŧ㹵��ҧ�ҹ������
	if($errmsg == "") {
 		$str = md5(crypt("abcd")); 
		$confirmation = substr($str, 0, 10);
		
		$sql = "INSERT INTO member VALUES
		 			(0, '$login', '$pswd', '$email', CURRENT_DATE(), '$confirmation');";
					
		@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
		mysql_select_db("phpmysql");
		$qry = mysql_query($sql);
		if(!$qry) {
			$errmsg .= "<li>" . mysql_error();
		}
		else { 			//�������բ�ͼԴ��Ҵ �觡���׹�ѹ价ҧ�����
			include("../PHPMailer/class.phpmailer.php");
			$mailer = new PHPMailer();
			$mailer->CharSet = "utf-8";
			$mailer->IsHTML(true);
			
			$mailer->From = "webmaster@example.com";
			$mailer->AddAddress($email);
			
			$subject = "�׹�ѹ�����Ѥ���Ҫԡ";
			$mailer->Subject = iconv("tis-620", "utf-8", $subject);
			
			$url = "http://localhost/phpmydream/workshop19-1/confirmation.php?e=$email&c=$confirmation";
			$body = "��ԡ����ԧ����仹�������׹�ѹ �ҡ��ҹ�������Ѥ���Ҫԡ ���ź��ũ�Ѻ������";
			$body .= "<p><a href=\"$url\" target=_blank>$url</a>";
			$mailer->Body = iconv("tis-620", "utf-8", $body);
			
			if(!$mailer->Send()) {
				die("�����������Դ��ͼԴ��Ҵ!");
			}
			
			// ��Ѻ价��ྨ��ѡ
			header("Refresh: 3; url=index.php");  
			echo "���ŧ����¹ �������º���� ��������ѧྨ��ѡ� 3 �Թҷ�";
			exit;
		}
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
if($errmsg != "") {
	echo "<font color=red><ul>$errmsg</ul></font>";
}
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Login: 
  <label>
  <input name="login" type="text" id="login" maxlength="20" />
  </label>
  <br />
Pswd: 
<label>
<input name="pswd" type="password" id="pswd" maxlength="20" />
</label>
<br />
Email:
<label>
<input name="email" type="text" id="email" maxlength="150" />
<br />
</label>
<br />
<img src="create_captcha.php" /> �ѡ��з���ҡ���Ҿ
<label> <br />
<input name="captcha" type="text" id="captcha" size="25" maxlength="4" />
</label>
<br />
<br />
<label>
<input type="submit" name="Submit" value="��Ѥ���Ҫԡ" />
</label>
<br />
</form>

</body>
</html>