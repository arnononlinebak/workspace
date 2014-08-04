<html>
<body>
<?php
	$a = array("one", "two", "three", "four", "five");
	print_r($a);
	echo "<p>";
	echo "current(): " . current($a) . "<br>";
	echo "next(): " . next($a) . "<br>";
	echo "next(): " . next($a) . "<br>";
	echo "end(): " . end($a) . "<br>";
	echo "prev(): " . prev($a) . "<br>";
	reset($a);
	echo "reset() -> current(): " . current($a) . "<br>";
?>
</body>
</html>

