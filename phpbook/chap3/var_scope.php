<?php
$x = 20;
function f1() {
	echo $x; 	// error! _____(1)
}

function f2() {
	$f_x = 100;
}
?>

<?php
	f1();
	echo $f_x; 	// error! _____(2)
?>
