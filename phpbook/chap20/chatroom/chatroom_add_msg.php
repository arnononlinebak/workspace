<?php
	if(isset($_POST['message'])) {
		$nickname = $_POST['nickname'];
		$color = $_POST['color'];
		$message = addslashes($_POST['message']);
		if(empty($message)) {
			exit();
		}
		$conn = mysql_connect("localhost", "root", "123");
		mysql_query("USE chatroom;");
		$sql = "INSERT INTO messages VALUES";
		$sql .= "('$nickname', '$color', '$message');";
		mysql_query($sql);
		
		mysql_close($conn);
	}
	exit();
?>
