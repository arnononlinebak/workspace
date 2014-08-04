<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 18-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php 
if($_POST) {
	include "../PHPMailer/class.phpmailer.php";
	$mailer = new PHPMailer();	

	//ป้องกันการใส่ backslash เครื่องหมาย quote
	if(get_magic_quotes_gpc()) {
		foreach($_POST as $key => $value) {
			$_POST[$key] = stripslashes($value);
		}
	}
	
	$mailer->WordWrap = 70;
	$mailer->CharSet = "utf-8";
	$mailer->IsHTML(true);	
	
	$mailer->From = $_POST['from'];
	$mailer->FromName = iconv("tis-620", "utf-8", $_POST['fromname']);
	$mailer->AddAddress($_POST['to']);
	
	//ถ้ามีการอัปโหลดไฟล์ขึ้นมาด้วย 
	if($_FILES)  {
		@mkdir("upload");	
 		$path = "upload/" . $_FILES['upfile']['name'];
 		move_uploaded_file($_FILES['upfile']['tmp_name'], $path);
 		$mailer->AddAttachment($path);
	}
	
	$mailer->Subject = iconv("tis-620", "utf-8", $_POST['subject']);
	$mailer->Body = iconv("tis-620", "utf-8", $_POST['body']);

	if($mailer->Send()) {
		echo "เมลถูกส่งไปยังปลายทางแล้ว";
	}
	else {
		echo "การส่งเมลเกิดข้อผิดพลาด";
	}
} 
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="420" border="0" cellspacing="3" cellpadding="0">
    <tr>
      <td>อีเมลผู้ส่ง:</td>
      <td><label>
        <input name="from" type="text" id="from" size="50" />
      </label></td>
    </tr>
    <tr>
      <td>ชื่อผู้ส่ง:</td>
      <td><label>
        <input name="fromname" type="text" id="fromname" size="50" />
      </label></td>
    </tr>
   <tr>
      <td width="81">อีเมลผู้รับ:</td>
      <td width="330"><label>
        <input name="to" type="text" id="to" size="50" />
      </label></td>
    </tr>  
    <tr>
      <td>ไฟล์ที่จะแนบ:</td>
      <td><input name="upfile" type="file" id="upfile" size="35" /></td>
    </tr>
    <tr valign="top">
      <td>หัวข้อ:</td>
      <td><label>
        <input name="subject" type="text" id="subject" size="50" />
      </label></td>
    </tr>
    <tr valign="top">
      <td>ข้อความ:</td>
      <td><label>
        <textarea name="body" cols="50" rows="5" id="body"></textarea>
      </label><label></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><label>
        <input type="submit" name="Submit" value="ส่งเมล" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>