<html>
<body>
<?php
	$to = "devmaster@localhost";
	$subject = "test mail";
	$message = "This is a test of sending mail";
	$header = "From:someone@somenet.com\r\n";

	if(mail($to, $subject, $message, $header)) {
		echo "Sending mail sucessfull";
	}
	else {
		echo "Sending mail Error!";
	}
?>
</body>
</html>
