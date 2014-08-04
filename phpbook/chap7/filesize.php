<html>
<body>
<?php
	$path = "c:/windows/php.ini";
	echo "size of \"$path\"<br>";
	$size = filesize($path);
	echo "$size byte(s)<br>";

	$kb = $size/1024;
	echo "$kb kilobyte(s)<br>";

	$mb = $size/1048576;
	echo "$mb magabyte(s)";
?>
</body>
</html>
