<html>
<body>
<table border="1" width="100%">
<?php
	$ascii_a = ord('A');
	$ascii_z = ord('Z');
	
	for($i = $ascii_a; $i <= $ascii_z; $i += 5) {
		echo "<tr>";
		for($j = $i; $j < ($i + 5); $j++) {
			echo "<td>" . chr($j) . "</td>";
			echo "<td>" . $j . "</td>";
		}
		echo "</tr>";
	}
?>
</table>
</body>
</body>
</html>
