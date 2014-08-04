<html>
<body>
<?php
function swap(&$x, &$y) {
	$temp = $x;
	$x = $y;
	$y = $temp;
	echo "ในฟังก์ชันค่าของตัวแปร \$x = $x, \$y = $y<br>";
}
?>

<?php
	$x = 66;
	$y = 99;
	echo "ก่อนการเรียกฟังก์ชันค่าของตัวแปร \$x = $x, \$y = $y<br>";
	swap($x, $y);
	echo "หลังการเรียกฟังก์ชันค่าของตัวแปร \$x = $x, \$y = $y";
?>
</body>
</html>
