<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874" />
<title>Example 12-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
mysql_connect("localhost","root","leaf");
mysql_select_db("phpmysql");
	
$sql = "SELECT *  FROM people;";
$result = mysql_query($sql);
if(!$result) {
	echo "เกิดข้อผิดพลาดในการอ่านข้อมูล";
}
else if(mysql_num_rows($result) == 0) {
	echo "ไม่มีข้อมูลในตาราง people";
}
else {
	echo "<table border=1 cellpadding=3>";
	
	//อ่านข้อมูลที่ละแถวจาก result set ในแบบอาร์เรย์
	while($data = mysql_fetch_array($result)) {
		echo "<tr>	"; 			//เริ่มแถวใหม่
		echo "<td>{$data['id']}</td><td>{$data['name']}</td>
				<td>{$data['address']}</td><td>{$data['email']}</td>
				<td>{$data['birthday']}</td>";
		echo "</tr>";		  //สิ้นสุดแถว
	}
	
	echo "</table>";
}
?>
</body>
</html>