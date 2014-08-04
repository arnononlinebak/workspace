<html>
<body>
<table border="1" width="90%">
<tr><th>ใช้ ksort()</th><th>ใช้ krsort()</th></tr>
<tr>
<?php
	$a1 = array('th'=>"Thailand", 'jp'=>"Japan", 
 			'it'=>"Italy", 'fr'=>"France");
	$a2 = $a1;
	ksort($a1);
	echo "<td>";
	while(list($k, $v) = each($a1)) {
		echo "$k: $v<br>";
	}
	echo "</td><td>";
	krsort($a2);
	while(list($k, $v) = each($a2)) {
		echo "$k: $v<br>";
	}
	echo "</td>";
?>
</tr>
</table>
</body>
</html>
