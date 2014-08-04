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
		mysql_close($conn);
	}
	else {
		$num_rows = mysql_num_rows($result);
		
	echo "<table border=1>";
	while($data = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $data['cust_id'] . "</td>";
		echo "<td>" . $data['cust_name'] . "</td>";
		echo "<td>" . $data['country'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysql_close($conn);
?>
</body>
</html>