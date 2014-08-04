<html>
<body>
<?php
	$a = 123;
	unset($a);

	$a_ = (isset($a))? "set":"unset";
	echo "\$a is " . $a_ . "<br>";

	$a_ = (empty($a))? "empty":"non-empty";
	echo "\$a is " . $a_ . "<br>";

	echo "The value of \$a is $a";
?>
</body>
</html>
