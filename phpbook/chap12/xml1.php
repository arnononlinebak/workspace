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
		<europe>
			<country>
 				<countryName>UK</countryName>
 				<capital>London</capital>
 			</country>
			<country>
 				<countryName>France</countryName>
 				<capital>Paris</capital>
 			</country>
		</europe>
 	</region>

	";

	$region = simplexml_load_string($x_str);
	
?>
<center>
<table border="1">
<tr>
	<th>region</th><th>country</th><th>capital</th>
</tr>
<?php
	for($i = 0; $i <= 1; $i++) {
		echo "<tr>";
		echo "<td>South East Asia</td>";
		echo "<td>" . $region->asia->southEastAsia->
 			country[$i]->countryName . "</td>";
		echo "<td>" . $region->asia->southEastAsia->
 			country[$i]->capital . "</td>";
		echo "</tr>";
	}

	for($i = 0; $i <= 1; $i++) {
		echo "<tr>";
		echo "<td>East Asia</td>";
		echo "<td>" . $region->asia->eastAsia->
 			country[$i]->countryName . "</td>";
		echo "<td>" . $region->asia->eastAsia->
 			country[$i]->capital . "</td>";
		echo "</tr>";
	}

	for($i = 0; $i <= 1; $i++) {
		echo "<tr>";
		echo "<td>Europe</td>";
		echo "<td>" . $region->europe->country[$i]->
 			countryName . "</td>";
		echo "<td>" . $region->europe->country[$i]->
 			capital . "</td>";
		echo "</tr>";
	}
?>
</table>
</center>
</body>
</html>
