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

$subject = "���ͺ�������Ŵ��� PHP";
$body = "��ҷ�ҹ���Ѻ��ũ�Ѻ���� �ʴ���ҡ������������";

$sendmail = mail($to, $subject, $body, $header);
if($sendmail) {
	echo "��Ŷ١���͡�����";
}
else {
	echo "���������������";
}
?>
</body>
</html>
