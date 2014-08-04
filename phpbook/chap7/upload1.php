<html>
<body>
<?php
	echo "name => " . $_FILES['uploadfile']['name'] . "<br>";
	echo "type => " . $_FILES['uploadfile']['type'] . "<br>";
	echo "size => " . $_FILES['uploadfile']['size'] . "<br>";
	echo "tmp_name => " . $_FILES['uploadfile']['tmp_name'] . "<br>";
	echo "error => " . $_FILES['uploadfile']['error'];
?>
</body>
</html>
