<html>
<head>
<meta http-equiv="Refresh" content="7">
</head>
<body>
<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE chatroom;");
	$qry = mysql_query("SELECT COUNT(*) FROM messages;");
	$start = mysql_result($qry, 0, 0) - 9;
	if($start<0) {
		$start = 0;
	}
	$sql = "SELECT * FROM messages ";
	$sql .= "LIMIT $start, 10;";
	$result = mysql_query($sql);
	while($msg = mysql_fetch_array($result)) {
		echo "<font color=\"" . $msg['color'] . "\">" . $msg['name'] . ": " . $msg['message'] . "</font><br>";
	}
	mysql_close($conn);
?>
</body>
<html>