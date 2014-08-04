<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>E-Card: Send Card</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");
include("ecard.inc.php");
my_connect();

if($_POST) {
	//อ่านค่า id ที่เก็บไว้ในอินพุท hidden
	$id = $_POST['id'];
	
	//อ่านภาพการ์ดจากฐานข้อมูลเพื่อนำไปสร้างเป็นไฟล์
	$sql = "SELECT name, content FROM card WHERE id = $id;";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) == 0) {
		echo "<p align=center>เกิดข้อผิดพลาด ไม่พบภาพการ์ดที่จะส่ง
				</p></body></html>";
		exit;
	}
	
	$file_name = mysql_result($result, 0, "name");
	$file_content = mysql_result($result, 0, "content");
	
	@mkdir("attch");
	$f = fopen("attch/$file_name", "wb");
	fwrite($f, $file_content);
	fclose($f);
	
	include "../PHPMailer/class.phpmailer.php";
	$mailer = new PHPMailer();
	
	if(get_magic_quotes_gpc()) {
		foreach($_POST as $k => $v) {
			$_POST[$k] = stripslashes($v);
		}
	}

	$mailer->CharSet = "utf-8";
	$mailer->IsHTML(true);
	
	$mailer->From =  $_POST['from'];
	$mailer->FromName = iconv("tis-620", "utf-8", $_POST['from_name']);
	
	$mailer->AddAddress( $_POST['to']);
	
	$mailer->Subject = iconv("tis-620", "utf-8", $_POST['subject']);
	$mailer->Body = iconv("tis-620", "utf-8", $_POST['body']);
	
	$mailer->AddAttachment("attch/$file_name");
	
	if($mailer->Send()) {
		echo "<p align=center>การ์ดถูกส่งไปยังปลายทางแล้ว</p>";
	}
	else {
		echo "<p align=center>เกิดข้อผิดพลาด ไม่สามารถส่งการ์ดได้</p>";
	}
	
	unlink("attch/$file_name");
	
	echo "<p align=center><a href=\"javascript: self.close();\">ปิด</a></p>
	 		</body></html>";
	exit;
}
else if(!$_GET['id']) {
	echo "</body></html";
	exit;
}
?>

<p align="center">
<img src="card_img.php?id=<?php echo $_GET['id']; ?>" />
</p>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="399" border="0" cellspacing="3" cellpadding="0" align="center">
    <tr>
      <td width="223">อีเมลผู้รับ:</td>
      <td width="167">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input name="to" type="text" id="to" size="60" />
      </label>        <label></label></td>
    </tr>
    <tr>
      <td colspan="2">หัวข้อ:<br />
        <label>
        <input name="subject" type="text" id="subject" size="60" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label> ข้อความ:<br />
        <textarea name="body" cols="60" rows="3" id="body"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>อีเมลผู้ส่ง</td>
      <td>ชื่อผู้ส่ง</td>
    </tr>
    <tr>
      <td><label>
        <input name="from" type="text" id="from" size="35" />
      </label></td>
      <td><label>
        <input name="from_name" type="text" id="from_name" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" />
        <input type="submit" name="Submit" value="ส่งข้อมูล" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>