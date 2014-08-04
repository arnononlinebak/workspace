<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 4-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function swap(&$x, &$y) {
	$temp = $x;
	$x = $y;
	$y = $temp;
}

$x = 66;
$y = 99;
echo "ก่อนเรียกฟังก์ชัน swap() : \$x = $x, \$y = $y<br />";

swap($x, $y);
echo "หลังเรียกฟังก์ชัน swap() : \$x = $x, \$y = $y";
?>
</body>
</html>
