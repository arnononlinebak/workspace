<html>
<body>
<?php
	$a1 = array("AAA", "aaa", "bbb", "Bbb", "BBB", "Zaa", "ZZZ");
	echo "<br>Data in array => ";
	foreach($a1 as $x) {
		echo "$x  ";
	}

	rsort($a1);
	echo "<br>After rsort() => ";
	foreach($a1 as $x) {
		echo "$x  ";
	}
?>
</body>
</html>


