<?php

class C1 {

function m() {
	echo "C1->m()";
}

}
?>

<?php

class C2 extends C1 {

function m() {
	echo "C2->m()";
}
}
?>

<html>
<body>
<?php
	$c2 = new C2();
	$c2->m();
?>
</body>
</html>