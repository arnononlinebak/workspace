<html>
<body>
<?php
	$str = "PHP/MySQL";
	$s = str_pad($str, 20, "*", STR_PAD_LEFT);
	echo "pad_left => $s<br>";

	$s = str_pad($str, 20, "*", STR_PAD_RIGHT);
	echo "pad_right => $s<br>";

	$s = str_pad($str, 20, "*", STR_PAD_BOTH);
	echo "pad_both => $s<br>";	
?>
</body>
</html>
