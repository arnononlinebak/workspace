<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 6-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$mails = file("mail.txt");

foreach($mails as $ml) {
	echo "<a href=\"mailto: $ml\">$ml</a> <br />";
}
?>
</body>
</html>
