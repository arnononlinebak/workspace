<html>
<body>
<?php
	echo "���˹觧ҹ�����Ѥ�:";
	foreach($_POST['pos'] as $pos) {
		echo "<li>" . $pos;
	}

	echo "<p>" . "�����Ŵ�ҹ�֡��:";
	for($i=0; $i<count($_POST['edu']); $i++) {
		if(!empty($_POST['edu'][$i])) {
			echo "<li>" . $_POST['edu'][$i];
		}
	}
?>
</body>
</html>
