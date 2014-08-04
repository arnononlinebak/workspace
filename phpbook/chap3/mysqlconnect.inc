	
 	$conn = mysql_connect("localhost", "root", "123");
	$if(!$conn) {
		echo "Can't connect to MySQL";
		echo "</body></html>";
		exit();
	}
	mysql_query("USE mydatabase;");