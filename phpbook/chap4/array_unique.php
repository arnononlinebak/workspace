<html>
<body>
<?php
	$a = array("one", "one", "ONE", "two", "two", "three");
	$unique = array_unique($a);
	foreach($unique as $x) {
		echo $x . "<br>";
	}
?>
</body>
</html>
