<html>
<body>
<?php
	$a = array(
 		'th'=>"Thailand", 
 		'jp'=>"Japan", 
 		'hk'=>"Hong Kong"
 		);
	
	$result = each($a);
	echo $result[0] . ": " . $result[1] . "<br>";
	$result = each($a);
	echo $result[0] . ": " . $result[1] . "<br>";
	$result = each($a);
	echo $result[0] . ": " . $result[1] . "<br>";

	echo "<hr>";

	reset($a);
	while(list($key, $value) = each($a)) {
		echo "$key => $value <br>";
	}
?>
</body>
</html>
