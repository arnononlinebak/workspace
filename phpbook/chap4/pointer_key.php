<html>
<body>
<?php
	$a = array('th'=>"Thailand", 'jp'=>"Japan", 
 		'hk'=>"Hong Kong");
	
	echo key($a) . "<br>";
	while(next($a)) {
		echo key($a) . "<br>";
	}
?>
</body>
</html>
