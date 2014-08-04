<html>
<body>
<?php
	echo "SHA1('a') => " . SHA1('a') . "<br>";
	echo "SHA1('A') => " . SHA1('A') . "<br>";
	echo "SHA1('php') => " . SHA1('php') . "<br>";
	echo "SHA1('PHP') => " . SHA1('PHP') . "<br>";
	echo "SHA1('Linux/Apache/MySQL/PHP') => ";
	echo SHA1('Linux/Apache/MySQL/PHP');
?>
</body>
</html>