<html>
<body>
<?php
	$a1 = array("PHP", "MySQL", "Apache", "HTML");
	$a2 = array("ASP", "SQL Server", "IIS", "HTML");
	$a3 = array("JSP", "MySQL", "Tomcat", "HTML");
	$a4 = array("PHP", "ASP", "JSP", "HTML");
	
	echo "Intersect: ";
	$a_i = array_intersect($a1, $a2, $a3, $a4);
	foreach($a_i as $x) {
		echo "$x ";
	}

	echo "<br>Diff: ";
	$a_d = array_diff($a1, $a2, $a3, $a4);
	foreach($a_d as $x) {
		echo "$x ";
	}
?>
</body>
</html>
