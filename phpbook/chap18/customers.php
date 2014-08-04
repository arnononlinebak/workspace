<html>
<body>
<center>
<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");

	if(isset($_GET['page'])) {
 		$current_page = $_GET['page'];
	}
	else {
		$current_page = 1;
 	}
	
	$page_size = 5;

	$start_row = ($current_page-1)*$page_size;
	$sql = "SELECT * FROM customers ";
	$sql .= "LIMIT $start_row, $page_size;";

	$result = mysql_query($sql);

	echo "<table width=\"200\" border=\"1\">";
	while($data = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $data['cust_id'] . "</td>";
		echo "<td>" . $data['cust_name'] . "</td>";
		echo "<td>" . $data['country'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<p>";
	$result = mysql_query("SELECT COUNT(*) FROM customers;");
	$num_rows = mysql_result($result, 0, 0);
	$num_pages = ceil($num_rows/$page_size);

 	if($current_page!=1) {
 		$prev_page = $current_page - 1;
 		echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?";
 		echo "page=$prev_page\">Previous</a>";
 	}

	echo "&nbsp; Page: $current_page of $num_pages &nbsp;";
	
	 if($current_page < $num_pages) {
 		$next_page = $current_page + 1;
 		echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?";
 		echo "page=$next_page\">Next</a>";
 	}

	mysql_close($conn);
?>
</center>
</body>
</html>

