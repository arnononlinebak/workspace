<html>
<body>
<center>
<table border="1">
<caption>Multiplication Table</caption>
<?php
    	for($i = 1; $i <= 10; $i++) { //��ǹѺ��Ǻ�ŧ��ҧ
		echo "<tr>";
		for($j = 1; $j <= 10; $j++) { //��ǹѺ��ǫ���仢��
            	echo "<td>" . $i * $j . "</td>";
		}
		echo "</tr>";  
	}
?>
</table>
</center>
</body>
</html>  
