<html>
<body>
<?php
function swap(&$x, &$y) {
	$temp = $x;
	$x = $y;
	$y = $temp;
	echo "㹿ѧ��ѹ��Ңͧ����� \$x = $x, \$y = $y<br>";
}
?>

<?php
	$x = 66;
	$y = 99;
	echo "��͹������¡�ѧ��ѹ��Ңͧ����� \$x = $x, \$y = $y<br>";
	swap($x, $y);
	echo "��ѧ������¡�ѧ��ѹ��Ңͧ����� \$x = $x, \$y = $y";
?>
</body>
</html>
