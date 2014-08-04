<?php
	include "htmlMimeMail.php";

	$mail->setForm("Someone<someome@somewhere.com>");
	$mail->setReturnPath("someome@somewhere.com");

	$mail->setSubject("hello");

	$mail->setText("xxxxxxxxxxxx");

	$attc = $mail->getFile("mail1.php");
	$mail->addAttachment($attc, "mail1.php", "text/html");
	
	$mail->send(array("devmaster@localhost"));
?>