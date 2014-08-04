<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 18-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$header = "From: webmaster@developerthai.com\r\n";
$header .= "Cc: someone@example.com,somebody@test.com\r\n";
$header .= "Bcc: angel@heaven.com,ghost@hell.com\r\n";
$header .= "Content-type: text/html; charset=tis-620";

$to = "banchar_pa@hotmail.com";

$subject = "ทดสอบการส่งเมลด้วย PHP";
$body = "ถ้าท่านได้รับเมลฉบับบนี้ แสดงว่าการส่งเมลสำเร็จ";

$sendmail = mail($to, $subject, $body, $header);
if($sendmail) {
	echo "เมลถูกส่งออกไปแล้ว";
}
else {
	echo "การส่งเมลล้มเหลว";
}
?>
</body>
</html>
