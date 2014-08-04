<html>
<body>
<?php
	$path = "c:/windows/php.ini";
	$type = filetype($path);
	echo "$path => $type <br>";

	$path = "c:/windows";
	$type = filetype($path);
	echo "$path => $type <br>";

	$path = "c:/";
	$type = filetype($path);
	echo "$path => $type";

?>
</body>
</html>
