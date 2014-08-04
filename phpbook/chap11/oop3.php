<?php
class Circle {
const PI = 3.14159;
function circleArea($radius) {
	$area = Circle::PI * $radius;
	return $area;
}
}
?>
<html>
<body>
<?php
	$circle = new Circle();

	$radius = 10;
	echo "วงกลมที่มีรัศมีเท่ากับ $radius จะมีพื้นที่เท่ากับ " . $circle->circleArea($radius);
	echo "โดยใช้ค่า PI เท่ากับ " . Circle::PI;
?>
</body>
</html>

