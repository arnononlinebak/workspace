<html>
<body>
<?php
	$x_str = "
	<region>
		<asia>
			<southEastAsia>
				<country>
 					<countryName>Thailand</countryName>
					<capital>Bangkok</capital>
				</country>
				<country>
 					<countryName>Indonesia</countryName>
					<capital>Jakarta</capital>
				</country>
			</southEastAsia>
			<eastAsia>
				<country>
 					<countryName>Japan</countryName>
					<capital>Tokyo</capital>
				</country>
				<country>
 					<countryName>China</countryName>
					<capital>Beijing</capital>
				</country>
			</eastAsia>
		</asia>
	</region>
	";

	$region = simplexml_load_string($x_str);
?>
<center>
<table border="1">
<tr>
	<th>country</th><th>capital</th>
</tr>
<?php
	foreach($region->asia->southEastAsia->country as $c) {
		echo "<tr>";
		echo "<td>" . $c->countryName . "</td>";
		echo "<td>" . $c->capital . "</td>";
		echo "</tr>";
	}

	foreach($region->asia->eastAsia->country as $c) {
		echo "<tr>";
		echo "<td>" . $c->countryName . "</td>";
		echo "<td>" . $c->capital . "</td>";
		echo "</tr>";
	}
?>
</table>
</center>
</body>
</html>
