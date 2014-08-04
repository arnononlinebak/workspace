<html>
<body>
<?php
	$header = "From:" . $_POST['from'] . "\r\n";
	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$message = wordwrap($message, 70);

	$mail_ok = mail($to, $subject, $message, $header);
	if($mail_ok) {
		echo "การส่ง mail เสร็จเรียบร้อย";
	}
	else {
		echo "การส่ง mail มีข้อผิดพลาด";
	}
?>
</body>
</html>
