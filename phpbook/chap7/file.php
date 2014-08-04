<html>
<body>
<b>Mail List:</b><br>
<?php
 	$mails = file("mail.txt");
	foreach($mails as $ml) {
		echo "<a href=\"mailto:$ml\">$ml</a><br>";
	}
?>
</body>
</html>