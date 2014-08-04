<?php
	$conn = mysql_connect("localhost", "root", "123");
	$tbs = mysql_list_tables("mysql");
	while($tb = mysql_fetch_array($tbs)) {
		echo $tb[0] . "<br>";
	}
	
	mysql_close($conn);
?>