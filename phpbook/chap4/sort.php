<html>
<body>
<?php
function print_array($arr) {
	foreach($arr as $x) {
		echo "$x  ";
	}
}
?>

<?php
	$a1 = array(99, -1, 11, 0, '55', "77");
	echo "\$a1 ��͹������§�ӴѺ: ";
	print_array($a1);
	echo "<br>";
	natcasesort($a1);
	echo "\$a1 ��ѧ������§�ӴѺ: ";
	print_array($a1);

	echo "<p>";

	$a2 = array("AAA", "aaa", "bbb", "Bbb", "BBB", "Zaa", "ZZZ");
	echo "\$a2 ��͹������§�ӴѺ: ";
	print_array($a2);
	echo "<br>";
	natcasesort($a2);
	echo "\$a2 ��ѧ������§�ӴѺ: ";
	print_array($a2);

	echo "<p>";

	$a3 = array("���", "���", "��", "��");
	echo "\$a3 ��͹������§�ӴѺ: ";
	print_array($a3);
	echo "<br>";
	natcasesort($a3);
	echo "\$a3 ��ѧ������§�ӴѺ: ";
	print_array($a3);
?>
</body>
</html>

