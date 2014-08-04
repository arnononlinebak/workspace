<html>
<body>

<!-- ส่วนของการแสดงรายละเอียดหัวข้อกระทู้	-->
<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE php_mysql;");

	$id = $_GET['id'];
	$sql = "SELECT *, DATE_FORMAT(date_posted, '%e-%m-%Y %H:%i:%s') AS date ";
	$sql .= "FROM topic ";
	$sql .= "WHERE topic_id = $id;";

	$result_topic = mysql_query($sql);
	$data_topic = mysql_fetch_array($result_topic);
?>
<table border="0" cellspacing="0" cellpadding="3" width="600">
<tr>
	<td bgcolor="#336699"><font color="white"><b>
		<?php echo stripslashes($data_topic['topic']); ?>
	</b></font></td>
</tr>
<tr>
<td bgcolor="lavender" 
 	style="border-top:solid 1px black; border-bottom:solid 1px black">
	<?php echo stripslashes($data_topic['detail']); ?>
	<br><center>
	<?php if($data_topic['img']!=null) {	?>
		<img src="read_image.php?id=<?php echo $id; ?>"> 
	<?php }		?>			
</td>
</tr>
<tr>
<td>
	<b>โดย: </b><?php echo stripslashes($data_topic['name']);	?>
	&nbsp;[<?php echo $data_topic['date']; ?>]
</td>
</tr>
</table>

<!-- ส่วนของการแสดงคำตอบของกระทู้	-->
<?php
	if(isset($_GET['page'])) {
 		$current_page = $_GET['page'];
	}
	else {
		$current_page = 1;
 	}
	$page_size = 20;
	$start_row = ($current_page-1)*$page_size;

	$sql = "SELECT * FROM reply ";
	$sql .= "WHERE topic_id = $id ";
	$sql .= "LIMIT $start_row, $page_size;";

	$result_reply = mysql_query($sql);
?>
<br>

<table width="600" border="2" bordercolor="white" cellspacing="3" cellpadding="5">
<tr><td><b>ความคิดเห็นของท่านอื่นๆ</b></td></tr>

<?php	while($data_reply = mysql_fetch_array($result_reply)) {		?>
<tr>
	<td bgcolor="#dddddd">
		<?php echo stripslashes($data_reply['message']); ?>
		<br>
		<b>โดย:</b> <?php echo stripslashes($data_reply['replier']); ?>
	</td>
</tr>
<?php	}	?>
</table>
<center>
<?php
	echo "<p>";
	$sql = "SELECT COUNT(*) FROM reply ";
	$sql .= "WHERE topic_id = $id;";
	$result = mysql_query($sql);
	$num_rows = mysql_result($result, 0, 0);
	$num_pages = ceil($num_rows/$page_size);
	if($num_pages==0) {
		$num_pages = 1;
	}
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

<!-- ส่วนของการแสดงความเห็นหรือตอบกระทู้	-->
<form method="post" action="webboard_add_reply.php">
<b>ความคิดเห็นของท่านต่อกระทู้นี้:</b><br> 
<textarea name="message" cols="60" rows="4"></textarea><br>
ชื่อของท่าน:<br><input type="text" name="replier">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" value="Submit">
</form>
</body>
</html>
