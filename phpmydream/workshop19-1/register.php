<?php
session_start();
$errmsg = "";

if(isset($_POST['login']) && isset($_SESSION['captcha'])) {
	$pattern = "^([a-z])([a-z0-9]{5,19})$";	//รูปแบบ login และ password
	
	$login = $_POST['login'];
	if(!ereg($pattern, $login)) {
		$errmsg .= "<li>Login ต้องประกอบด้วย a-z หรือ 0-9 ระหว่าง 6-20 ตัว";
	}
	
	$pswd = $_POST['pswd'];
	if(!ereg($pattern, $pswd)) {
		$errmsg .= "<li>Password ต้องประกอบด้วย a-z หรือ 0-9 ระหว่าง 6-20 ตัว";
	}
	
	$email = $_POST['email'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errmsg .= "<li>ใส่ Email ไม่ตรงตามรูปแบบ";
	}
	
	$captcha = $_POST['captcha'];
	if($captcha != $_SESSION['captcha']) {
		$errmsg .= "<li>ใส่อักขระไม่ตรงกับในภาพ";
	}
	
	//ถ้าไม่มีข้อผิดพลาด ให้บันทึกลงในตารางฐานข้อมูล
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
		else { 			//ถ้าไม่มีข้อผิดพลาด ส่งการยืนยันไปทางอีเมล
			include("../PHPMailer/class.phpmailer.php");
			$mailer = new PHPMailer();
			$mailer->CharSet = "utf-8";
			$mailer->IsHTML(true);
			
			$mailer->From = "webmaster@example.com";
			$mailer->AddAddress($email);
			
			$subject = "ยืนยันการสมัครสมาชิก";
			$mailer->Subject = iconv("tis-620", "utf-8", $subject);
			
			$url = "http://localhost/phpmydream/workshop19-1/confirmation.php?e=$email&c=$confirmation";
			$body = "คลิกที่ลิงค์ต่อไปนี้เพื่อยืนยัน หากท่านไม่เคยสมัครสมาชิก ให้ลบเมลฉบับนี้ทิ้งไป";
			$body .= "<p><a href=\"$url\" target=_blank>$url</a>";
			$mailer->Body = iconv("tis-620", "utf-8", $body);
			
			if(!$mailer->Send()) {
				die("การส่งอีเมลเกิดข้อผิดพลาด!");
			}
			
			// กลับไปที่เพจหลัก
			header("Refresh: 3; url=index.php");  
			echo "การลงทะเบียน เสร็จเรียบร้อย จะย้ายไปยังเพจหลักใน 3 วินาที";
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
<img src="create_captcha.php" /> อักขระที่ปรากฏในภาพ
<label> <br />
<input name="captcha" type="text" id="captcha" size="25" maxlength="4" />
</label>
<br />
<br />
<label>
<input type="submit" name="Submit" value="สมัครสมาชิก" />
</label>
<br />
</form>

</body>
</html>