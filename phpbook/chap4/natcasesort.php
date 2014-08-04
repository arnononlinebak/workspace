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

	echo "\$a1 ก่อนการเรียงลำดับ: ";
	print_array($a1);
	echo "<br>";
	sort($a1);
	echo "\$a1 หลังใช้ sort(): ";
	print_array($a1);

	echo "<br>";
	natcasesort($a1);
	echo "\$a1 หลังใช้ natcasesort(): ";
	print_array($a1);

?>
</body>
</html>

