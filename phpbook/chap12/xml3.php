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
	foreach($region->asia->children() as $c1){
		foreach($c1->children() as $c2) {
			echo "<tr>";
			echo "<td>" . $c2->countryName . "</td>";
			echo "<td>" . $c2->capital . "</td>";
			echo "</tr>";
		}
	}
?>
</table>
</center>
</body>
</html>

