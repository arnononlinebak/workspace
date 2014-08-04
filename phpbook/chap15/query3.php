<html>
<body>
<center>
<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");
	$sql = $_POST['sql'];
	$result = mysql_query($sql);
	if(!$result) {
		echo "Error!";
	}
	else {
		echo "<table border=1>";

		$num_rows = mysql_num_rows($result);
		$num_fields = mysql_num_fields($result);
		echo "<tr>";
		for($i=0; $i<$num_fields; $i++) {
			echo "<th>" . mysql_field_name($result, $i) . "</th>";
		}
		echo "</tr>";
	
		while($data = mysql_fetch_array($result)) {
			echo "<tr>";
			for($i=0; $i<$num_fields; $i++) {
				echo "<td>" . $data[$i] . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	mysql_close($conn);
?>
</center>
</body>
</html>