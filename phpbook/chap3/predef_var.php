<html>
<body>
<?php
	echo "HTTP_USER_AGENT => " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
	echo "HTTP_HOST => " . $_SERVER['HTTP_HOST'] . "<br>";
	echo "SERVER_SOFTWARE => " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
	echo "DOCUMENT_ROOT => " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
	echo "SCRIPT_NAME => " . $_SERVER['SCRIPT_NAME'] . "<br>";
	echo "REQUEST_METHOD => " . $_SERVER['REQUEST_METHOD'] . "<br>";
	echo "REQUEST_URI => " . $_SERVER['REQUEST_URI'] . "<br>";
	echo "PHP_SELF => " . $_SERVER['PHP_SELF'];
?>
</body>
</html>
	