<html>
<body>
<center>
<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");
	$sql = "SELECT * FROM employees;";
	$result = mysql_query($sql);
	echo "<table border=1>";
	$count = mysql_num_rows($result);
	for($i=0; $i<$count; $i++) {
		echo "<tr>";
		echo "<td>" . mysql_result($result, $i, "emp_id") . "</td>";
		echo "<td>" . mysql_result($result, $i, "firstname") . "</td>";
		echo "<td>" . mysql_result($result, $i, "lastname") . "</td>";
		echo "<td>" . mysql_result($result, $i, "position") . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysql_close($conn);
?>
</body>
</html>