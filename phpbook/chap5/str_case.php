<html>
<body>
<?php
function echo_result($cmp) {
	if($cmp) {
		echo "$s1 = $s2";
	}
	else {
		echo "$s1 &#8800; $s2";
	}
}
?>

<?php
	$s1 = "PHP";
	$s2 = "php";

	$cmp = strcmp($s1, $s2);
	echo "<b>Using strcmp()</b><br>";
	echo_cmp(($cmp == 0)? true : false));


	echo "<p><b>Using strcasecmp()</b><br>";
	$ccmp = strcasecmp($s1, $s2);
	echo_cmp(($cmp == 0)? true : false));

	echo "<p><b>Using ==</b><br>";
	echo_cmp(($s1 == $s2)? true : false));
?>
</body>
</html>
