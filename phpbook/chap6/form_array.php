<html>
<body>
<?php
	echo "ตำแหน่งงานที่สมัคร:";
	foreach($_POST['pos'] as $pos) {
		echo "<li>" . $pos;
	}

	echo "<p>" . "ข้อมูลด้านศึกษา:";
	for($i=0; $i<count($_POST['edu']); $i++) {
		if(!empty($_POST['edu'][$i])) {
			echo "<li>" . $_POST['edu'][$i];
		}
	}
?>
</body>
</html>
