<html>
<body>
<?php
	$a = 123;
	$b = null;
	$c;

	$a_ = (isset($a))? "��":"�����";
	echo $a_ . "����� \$a" . "<br>";

	$b_ = (isset($b))? "��":"�����";
	echo $b_ . "����� \$b" . "<br>";

	$c_ = (isset($c))? "��":"�����";
	echo $c_ . "����� \$c" . "<br>";

	$d_ = (isset($d))? "��":"�����";
	echo $d_ . "����� \$d";
?>
</body>
</html>
