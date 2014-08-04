<?php
class Visitor {

private static $num_visitor = 0;
private $x = 0;

function __construct() {
	self::$num_visitor++;
	$this->x++;
}

static function getVisitor() {
	return self::$num_visitor;
}

function getX() {
	return $this->x;
}

}
?>
<html>
<body>
<?php
	$v1 = new Visitor();
	echo "Visitors: " . Visitor::getVisitor() . "<br>";

	$v2 = new Visitor();
	echo "Visitors: " . Visitor::getVisitor() . "<br>";

	$v3 = new Visitor();
	echo "Visitors: " . $v3->getVisitor() . "<br>";
?>
</body>
</html>