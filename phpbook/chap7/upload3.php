<html>
<body>
<?php
	$num = count($_FILES['upfile']['name']);
	for($i = 0; $i < $num; $i++) {
		copy($_FILES['upfile']['tmp_name'][$i], 
 			$_FILES['upfile']['name'][$i]);
		echo "<img src=\"" . $_FILES['upfile']['name'][$i] ."\"><br>";
	}	
?>
</body>
</html>


