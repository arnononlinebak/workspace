<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 3-3</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<table border="1" cellspacing="0" cellpadding="3" align="center">
<caption>���ҧ�ٵäٳ</caption>
<?php
for($i = 1; $i <= 10; $i++) { 	//��ǹѺ��Ǻ�ŧ��ҧ
 	echo "<tr>";
 	for($j = 1; $j <= 10; $j++) { 	//��ǹѺ��ǫ���仢��
 		echo "<td>" . ($i * $j) . "</td>";
 	}
 	echo "</tr>";  
}
?>
</table>
</body>
</html>
