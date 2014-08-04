<?php
	$nickname = urldecode($_GET['nickname']);
	$sid = $_GET['sid'];

	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE chatroom;");

	$sql = "DELETE FROM participants ";
	$sql .= "WHERE name = '$nickname' AND sid = '$sid';";
	mysql_query($sql);

	$sql = "INSERT INTO messages VALUES";
	$sql .= "('$nickname', 'red', 'ได้ออกจากห้องสนทนาแล้ว');";
	mysql_query($sql);

	$qry = mysql_query("SELECT COUNT(*) FROM messages;"); 
	if(mysql_result($qry, 0, 0)>=10) {
		$offset = mysql_result($qry, 0, 0) - 10;
		mysql_query("DELETE FROM messages LIMIT $offset;");
	}

	mysql_close($conn);
?>

<script language="javascript">
	self.close();
</script>
