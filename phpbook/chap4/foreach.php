<html>
<body>
<?php
	$a1 = array("one", "two", "three");
	$a2 = array_pad($a1, 5, "php");
	// ������Ҫԡ�������������������Ѿ���ըӹǹ��Ҫԡ��ҡѺ 5
	foreach($a2 as $x) {
		echo $x . "<br>";
	}
?>
</body>
</html>
