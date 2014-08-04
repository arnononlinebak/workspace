<html>
<body>
<?php
	$x_str = "
	<vehicle>
		<auto type='pickup'>Isuzu-Dmax</auto>
		<auto type='pickup'>Ford-Ranger</auto>
		<auto type='suv'>Mazda-Tribute</auto>
		<auto type='suv'>Honda-CRV</auto>
	</vehicle>
	";

	$vehicle = simplexml_load_string($x_str);
?>
<center>
<table border="1">
<tr>
	<th>auto</th><th>type</th>
</tr>
<?php	
	foreach($vehicle->auto as $a) {
		echo "<tr>";
		echo "<td>" . $a . "</td>";
		echo "<td>" . $a->attributes() . "</td>";
		echo "</tr>";
	}
?>
</table>
</center>
</body>
</html>
