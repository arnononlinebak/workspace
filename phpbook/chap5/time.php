<html>
<body>
<?php
	if(checkdate(12, 31, 2007)) {
		echo "มี";
	}
	else {
		echo "ไม่มี";
	}
	echo "วันที่ 31 ธันวาคม 2007";

	echo "<br>";

	if(checkdate(2, 29, 2007)) {
		echo "มี";
	}
	else {
		echo "ไม่มี";
	}
	echo "วันที่ 29 กุมภาพันธ์ 2007";
?>
</body>
</html>
