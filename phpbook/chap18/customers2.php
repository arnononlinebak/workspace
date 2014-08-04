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

	$group_size = 3;
	$current_group = ceil($current_page/$group_size);

	echo "Page: $current_page of $num_pages <p>";

	if($current_group > 1) {
		$last_page_of_last_group = ($current_group - 1) * $group_size;
 		echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?";
 		echo "page=$last_page_of_last_group\">Previous</a>&nbsp;";
	}
	
	$first_page_of_current_group = (($current_group - 1) * $group_size) + 1;
	$last_page_of_current_group = $current_group * $group_size;
	if($last_page_of_current_group<=$num_pages) {
		$end = $last_page_of_current_group;
	}
	else {
		$end = $num_pages;
	}
	for($i=$first_page_of_current_group; $i<=$end; $i++) {
		// หมายเลขของหน้าปัจจุบันไม่ต้องทำลิงค์
		if($i==$current_page) {
			echo $i . "&nbsp;";
		}
		else {
			echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?";
			echo "page=$i\">" . $i . "</a>&nbsp;";
		}
	}
	
 	if($num_pages > $last_page_of_current_group) {
 		$first_page_of_next_group = $last_page_of_current_group + 1; 
 		echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?";
		echo "page=$first_page_of_next_group\">Next</a>";
 	}

	mysql_close($conn);
	
?>
</center>
</body>
</html>

