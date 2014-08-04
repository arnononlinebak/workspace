<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 5-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<table border="1" width="100%" cellspacing="0">
<caption>ตารางค่า ASCII ของ A - Z</caption>
<?php
$ascii_a = ord('A');
$ascii_z = ord('Z');
	
for($i = $ascii_a; $i <= $ascii_z; $i += 5) {
	echo "<tr align=center>";
	for($j = $i; $j < ($i+5); $j++) {
		$ch = chr($j);
		echo "<td bgcolor=#ddd> $ch </td>
		 		<td> $j </td>";
	}

	echo "</tr>";
}
?>
</table>
</body>
</html>
