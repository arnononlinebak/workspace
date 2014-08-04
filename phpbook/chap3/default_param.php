<html>
<body>
<?php
function power($base, $power=1) {
	$result = 1;
	for($i = 1; $i <= $power; $i++) {
		$result *= $base;
	}
	return $result;
}
?>

<?php
	echo "power(10) = " . power(10) . "<br>";
	echo "power(10, 3) = " . power(10, 3);
?>
</body>
</html>
