<html>
<body>
<?php
	echo "<b>explode www.thaicyberjob.com with . </b><br>";
	$exp = explode(".", "www.thaicyberjob.com");
	foreach($exp as $s) {
		echo $s . "<br>";
	}

	echo "<p><b>implode array(\"abc\", \"123\", \"@@@\") with ', '</b><br>";
	$a2 = array("abc", "123", "@@@");
	$imp = implode("', '", $a2);
	echo "INSERT INTO Table1 VALUES('" . $imp . "');";
?>
</body>
</html>
