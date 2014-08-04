<html>
<body>
<?php
	$a = array("one", "one", "ONE", "two", "two", "three");
	$uniq = array_unique($a);
	foreach($uniq as $x) {
		echo $x . "<br>";
	}
?>
</body>
</html>
