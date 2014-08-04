<html>
<body>
<?php
	$pattern = "(^[[:lower:]]+)@([[:lower:]]+)\.(com|net|org)$";
	$a = array("php@yahoo.com",
		"Php@yahoo.com",
		"123php@yahoo.com",
		"@yahoo.com",
		"php@Yahoo.com",
		"php@yahoo!com",
		"php@yahoo.Com",
		"php@yahoo.net");
	echo "pattern => $pattern<p>";
	foreach($a as $str) {
		echo $str;
		if(eregi($pattern, $str)) {
			echo " <b>ตรง</b>กับ pattern";
		}
		else {
			echo " <b>ไม่ตรง</b>กับ pattern";
		}
		echo "<br>";
	}
?>
</body>
</html>
