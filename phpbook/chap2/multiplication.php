<html>
<body>
<center>
<table border="1">
<caption>Multiplication Table</caption>
<?php
    	for($i = 1; $i <= 10; $i++) { //ตัวนับในแนวบนลงล่าง
		echo "<tr>";
		for($j = 1; $j <= 10; $j++) { //ตัวนับในแนวซ้ายไปขวา
            	echo "<td>" . $i * $j . "</td>";
		}
		echo "</tr>";  
	}
?>
</table>
</center>
</body>
</html>  
