<html>
<body>
<?php
	$a = array(
 		'name'=>"Jennifer", 
 		'age'=>25, 
 		'status'=>"Single"
 		);
	$k = array_keys($a);
	$v = array_values($a);
	
	echo $k[0] . ": " . $v[0] . "<br>";
	echo $k[1] . ": " . $v[1] . "<br>";
	echo $k[2] . ": " . $v[2] . "<br>";
?>
</body>
</html>