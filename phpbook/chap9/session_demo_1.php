<html>
<body>
<?php
	session_start();
	$_SESSION['login'] = "cinderella";
	$_SESSION['password'] = "cindy";

	echo "Session variable read in page: session_demo_1.php";
	echo "<br>";
	foreach($_SESSION as $key => $value) {
		echo "\$_SESSION['$key'] = $value <br>";
	}
?>
<br>
<a href="session_demo_2.php" target="_blank">read session variable in the other page</a>
</body> 
</html>
