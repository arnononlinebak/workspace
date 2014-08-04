<html>
<body>
<?php 
function show_array($arr, $separator) {
	foreach($arr as $x) {
		echo $x;
		if(next($arr)) {
			echo $separator;
		}
	}
}

function random_array($num) {
	$arr = array();
	for($i = 0; $i < $num; $i++) {
		$arr[$i] = rand();
	}
	
	return $arr;
}
?>

<?php
	$a = random_array(5);
	show_array($a, ", ");
?>
</body>
</html>