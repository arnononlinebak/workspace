<html>
<body>
<?php
	$str = "ABCDEFGHIJ";
	echo "\$str => $str<br>";

	$sub = substr($str, 3);
	echo "substr(\$str, 3) => $sub<br>";

	$sub = substr($str, -3);
	echo "substr(\$str, -3) => $sub<br>";

	$sub = substr($str, 3, 2);
	echo "substr(\$str, 3, 2) => $sub<br>";

	$sub = substr($str, -3, 2);
	echo "substr(\$str, -3, 2) => $sub<br>";
	
?>
</body>
</html>
