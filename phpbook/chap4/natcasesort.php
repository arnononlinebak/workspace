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
	$a1 = array("php5", "php50", "PHP5", "php6", "php60", "PHP6");

	echo "\$a1 ��͹������§�ӴѺ: ";
	print_array($a1);
	echo "<br>";
	sort($a1);
	echo "\$a1 ��ѧ�� sort(): ";
	print_array($a1);

	echo "<br>";
	natcasesort($a1);
	echo "\$a1 ��ѧ�� natcasesort(): ";
	print_array($a1);

?>
</body>
</html>

