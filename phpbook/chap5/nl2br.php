<html>
<body>
<?php
	$str = "PHP
		/
		MySQL";
	echo "Without using nl2br() => $str<br>";
	
	$s = nl2br($str);
	echo "With using nl2br() => $s";
?>
</body>
</html>

