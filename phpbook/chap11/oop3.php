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
	echo "ǧ���������������ҡѺ $radius ���վ�鹷����ҡѺ " . $circle->circleArea($radius);
	echo "������ PI ��ҡѺ " . Circle::PI;
?>
</body>
</html>

