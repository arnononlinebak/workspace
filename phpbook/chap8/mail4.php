<html>
<body>
<?php
	$header = "From:someone@somenet.com\r\n";
	$header .= "Content-Type:text/html;charset=\"tis-620\"\r\n";
	$to = "devmaster@localhost";
	$subject = "Sending HTML-formatted mail ";
	$message = "
	<html>
	<body>
	<b>Need Jobs?</b><br>
	<a href=\"www.thaicyberjob.com\">THAICYBERJOB.com -- Employing People</a>
	</body>
	</html>
	";
	
	if(mail($to, $subject, $message, $header)) {
		echo "Sending mail sucessfull";
	}
	else {
		echo "Sending mail Error!";
	}
?>
</body>
</html>
