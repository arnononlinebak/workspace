<html>
<body>
<?php
	$x_str = "
		<software>
			<programming>
				<webProgramming>
					<script>PHP</script>
					<script>ASP</script>
					<script>JSP</script>
				</webProgramming>
				<appProgramming>
					<language>VB</language>
					<language>C#</language>
					<language>PowerBuilder</language>
				</appProgramming>
			</programming>
		</software>

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
