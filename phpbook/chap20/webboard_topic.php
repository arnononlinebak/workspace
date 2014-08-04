<html>
<head>
<style> 
	a:hover {color:red}
	.hd {color:white; font-weight:bold}
</style>
</head>
<body>
<center>
<h3><?php echo $_GET['name']; ?></h3>

<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");

	if(isset($_GET['page'])) {
 		$current_page = $_GET['page'];
	}
	else {
		$current_page = 1;
 	}
	$page_size = 30;
	$start_row = ($current_page-1)*$page_size;

	$group = $_GET['group'];
	$sql = "SELECT *, DATE_FORMAT(date_posted, '%e-%m-%Y %H:%i:%s') AS date ";
	$sql .= "FROM topic ";
	$sql .= "WHERE group_name = '$group' ";
	$sql .= "ORDER BY date_posted DESC ";
	$sql .= "LIMIT $start_row, $page_size;";

	$result = mysql_query($sql);
?>
<table width="700">
<tr height="22" bgcolor="#336699">
	<td width="160" class="hd">วันที่</td>
	<td width="400" class="hd">หัวข้อ</td>
	<td width="100" class="hd">ผู้ส่ง</td>
	<td width="40" class="hd">ตอบ</td>
</tr>

<?php
	$bg = "#eeeeee";
	while($data = mysql_fetch_array($result)) {
?>
<tr height="25" bgcolor="<?php echo $bg; ?>">
	<td><?php echo $data['date']; ?>
	<td><a href="webboard_reply.php?id=<?php echo $data['topic_id']; ?>" target="_blank">
		<?php echo stripslashes($data['topic']); ?>
	    </a>
 	</td>
	<td><?php echo stripslashes($data['name']); ?></td>
	<td><?php echo $data['reply']; ?></td>
</tr>
<?php 
		$bg = ($bg=="#eeeeee")? "#cccccc" : "#eeeeee";
	}
?>
</table>

<?php
	echo "<p>";
	$result = mysql_query("SELECT COUNT(*) FROM topic;");
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

?>
</center>
</body>
</html>

