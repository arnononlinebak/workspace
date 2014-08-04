<html>
<body>
<?php
	$a1 = array("one", "two", "three");
	$a2 = array_pad($a1, 5, "php");
	// เพิ่มสมาชิกใหม่โดยให้อาร์เรย์ผลลัพธ์มีจำนวนสมาชิกเท่ากับ 5
	foreach($a2 as $x) {
		echo $x . "<br>";
	}
?>
</body>
</html>
