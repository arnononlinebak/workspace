<html>
<body>
<?php
	$sum = 0;
	echo "Sum of 1 - "; 
	for($i = 1; $i <= 10; $i++) {
		$sum += $i;
		if($sum >= 30) {
			$x = $i;
			exit();
		}
	}
	echo "$x: $sum";
?>
<hr>
<font color="gray">&copy;2005 example.com</font>
</body>
</html>