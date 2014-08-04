<html>
<body>
<?php
	$a = 123;
	$b = null;
	$c;

	$a_ = (isset($a))? "มี":"ไม่มี";
	echo $a_ . "ตัวแปร \$a" . "<br>";

	$b_ = (isset($b))? "มี":"ไม่มี";
	echo $b_ . "ตัวแปร \$b" . "<br>";

	$c_ = (isset($c))? "มี":"ไม่มี";
	echo $c_ . "ตัวแปร \$c" . "<br>";

	$d_ = (isset($d))? "มี":"ไม่มี";
	echo $d_ . "ตัวแปร \$d";
?>
</body>
</html>
