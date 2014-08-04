<html>
<body>
<?php
	$ar = array("one", "two", "two", "three", "three",
 		"FOUR", "two", "four");
	
	print_r($ar);
	echo "<p>";
	$result = array_count_values($ar);
	while(list($key, $value) = each($result)) {
		echo "$key => $value <br>";
	} 
?>
</body>
</html>
