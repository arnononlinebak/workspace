<html>
<body>
<?php
	$header = "From:webmaster@thaicyberjob.com\r\n";
	$to = "devmaster@localhost,devil@localhost";
	$header .= "Cc:angel@localhost\r\n";
	$subject = "Sending mail to multiple recipients";
	$message = "สวัสดีค่ะ นี่เป็นการทดสอบการส่งเมล์ไปยังผู้รับหลายคน ลองเช็คดูซิคะ";
	
	if(mail($to, $subject, $message, $header)) {
		echo "Sending mail sucessfull";
	}
	else {
		echo "Sending mail fail";
	}
?>
</body>
</html>
