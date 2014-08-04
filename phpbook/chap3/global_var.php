<html>
<body>

<?php

$g = 100;

function f1() {
	global $g;
	echo "In f1() \$g = $g" . "<br>";
}

function f2() {
	$g = 123;
	echo "In f2() \$g = $g" . "<br>";

	global $g;
	echo "In f2() after using global \$g = $g" . "<br>";
}

function f3() {
	echo "In f3() \$g = $g" . "<br>";
}
?>

<?php
	f1();
	f2();
	f3();
?>
</body>
</html>
