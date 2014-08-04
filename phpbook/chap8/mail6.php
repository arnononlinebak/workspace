<?php

	$boundary = md5(uniqid(time()));

	$header = "From: " . $_POST['from'] . "\n";
	$header .= "Content-Type: multipart/mixed; boundary=$boundary\n";

	$body = "--$boundary\n";

	$body .= "Content-Type: text/plain; charset=windows-874\n";
	$body .= "Content-Transfer-Encoding: 8bit\n\n";
	$body .= $_POST['message'] . "\n";

	$body .= "--$boundary\n";

	$file_tmpname = $_FILES['uploadfile']['tmp_name'];
	$file = fopen($file_tmpname,"rb");
	$file_content = fread($file ,filesize($file_tmpname));
	fclose($file);
	$b64_enc = base64_encode($file_content) . "\n";
	$file_split = chunk_split($b64_enc);
	$mime_type = $_FILES['uploadfile']['type'];
	$file_name = $_FILES['uploadfile']['name'];
	$body .= "Content-Type: $mime_type; name=\"$file_name\"\n";
	$body .= "Content-Transfer-Encoding: base64\n";
	$body .= "Content-Disposition: attachment; filename=\"$file_name\"\n\n";
	$body .= "$file_split\n";

	$body .= "--$boundary--";

	$to = $_POST['to'];
	$subject = $_POST['subject'];

	if (mail($to, $subject, $body, $header)) {
		echo "Sending Mail OK";
	}
 	else {
		echo "Sending Mail Error!";
	}
?>
