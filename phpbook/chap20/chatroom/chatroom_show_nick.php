<html>
<head>
<meta http-equiv="Refresh" content="12">
</head>
<body>
<?php
	$conn = mysql_connect("localhost", "root", "123");
	mysql_query("USE chatroom;");
	$sql = "SELECT * FROM participants;";
	$result = mysql_query($sql);
	while($names = mysql_fetch_array($result)) {
		echo $names['name'] . "<br>";
	}
	mysql_close($conn);
?>
</body>
<html>

