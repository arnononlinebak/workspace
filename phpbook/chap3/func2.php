<html>
<body>

<?php
function compare($num1, $num2) {
	if($num1 < $num2) {
		return "$num1 < $num2";
	}
	else if($num1 == $num2) {
		return "$num1 = $num2";
	}
	else {
		return "$num1 > $num2";
	}
}
?>

<?php
	echo compare(108, 1009) . "<br>";
	echo compare(0.11, 0.101) . "<br>";
	echo compare(75, 75);
?>
</body>
</html>
