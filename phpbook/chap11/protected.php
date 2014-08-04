<?php

class C1 {

protected function m1() {
	echo "C1->m1()";
}

public function m2() {
	echo "C1->m2()";
}

}
?>

<?php

class C2 extends C1 {

function m1() {
	parent::m1();
}
}
?>

<?php
class C3 {

function mmm() {

}
}
?>
	