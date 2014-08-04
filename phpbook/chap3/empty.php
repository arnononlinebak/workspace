<html>
<body>
<?php
	$a = 123;
	$b = null;
	$c = "";
	$d = 0;
	$e = "0";

	$a_ = (empty($a))? "empty":"non-empty";
	echo "\$a is " . $a_ . "<br>";

	$b_ = (empty($b))? "empty":"non-empty";
	echo "\$b is " . $b_ . "<br>";

	$c_ = (empty($c))? "empty":"non-empty";
	echo "\$c is " . $c_ . "<br>";

	$d_ = (empty($d))? "empty":"non-empty";
	echo "\$d is " . $d_ . "<br>";

	$e_ = (empty($e))? "empty":"non-empty";
	echo "\$e is " . $e_;
?>
</body>
</html>