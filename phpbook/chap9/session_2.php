<html>
<body>
<?php
	session_start();
	echo "Session variable read in page: session_2.php";
	echo "<br>";
	foreach($_SESSION as $key => $value) {
		echo "\$_SESSION['$key'] = $value <br>";
	}
?>
</body>
</html>
