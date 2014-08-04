<html>
<body>

<?php
	$m = move_uploaded_file($_FILES['uploadfile']['tmp_name'], 
 	 	$_FILES['uploadfile']['name']);
	if(!$m) {
		echo "Move file error";
		exit();
	}
	
	$type = $_FILES['uploadfile']['type'];
	$type = explode("/", $type);
	if($type[0] == "text") {
		readfile($_FILES['uploadfile']['name']);
	}
	else if($type[0] == "image") {
		echo "<img src=\"" . $_FILES['uploadfile']['name'] . "\">";
	}
	else {
		echo "Cant's display file type: " . $type[0];
	}		
?>

</body>
</html>

