<html>
<body>
<?php
class C1 {

private $x = 100;
private $y = 200;

function  f1() {
	echo "C1->f1()";
	echo "<br>";
	echo "C1->\$x = " . $this->x;
	echo "<br>";
	echo "C1->\$y = " . $this->y;
}

}

class C2 extends C1 {

private $x = 300;

function f1() {
	echo "C2->f1()";
	echo "<br>";
	echo "C2->\$x = " . $this->x;
	echo "<br>";
	echo "C2->\$y = " . $this->y;
}

}
?>

<?php
	$c2 = new C2();
	$c2->f1();
?>
</body>
</html>
