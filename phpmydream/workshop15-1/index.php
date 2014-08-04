<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 15-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("../inc/paging.inc.php");

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");		

//อ่านลำดับเพจปัจจุบันจาก query string หากไม่มีแสดงว่าเป็นเพจแรก
$current_page = 1;
if(isset($_GET['page'])) {
 	$current_page = $_GET['page'];
}

//แสดง 5 แถวต่อหน้า แล้วหาแถวเริ่มต้นของเพจนั้น  โดยเรียกฟังก์ชันที่อยู่ใน include file
$rows_per_page = 5;
$start_row = paging_start_row($current_page, $rows_per_page);

//อ่านข้อมูลจากตาราง
$sql = "SELECT	SQL_CALC_FOUND_ROWS * 
	 		FROM testpaging
	 		LIMIT $start_row, $rows_per_page;";
			
$result = mysql_query($sql);

//หาจำนวนแถวผลลัพธ์ทั้งหมดที่ตรงตามเงื่อนไข
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);

//จำนวนหน้าทั้งหมด โดยเรียกฟังก์ชันที่อยู่ใน include file
$total_pages = paging_total_pages($total_rows, $rows_per_page);

//แสดงผลลัพธ์ในแบบตาราง
echo "<table border=1 cellpadding=5 cellspacing=0 align=center>
	 	<tr bgcolor=\"#cccccc\">";

//ส่วนฟิลด์ของตาราง
$num_fields = mysql_num_fields($result);
for($i=0; $i<$num_fields; $i++) {
	echo "<th>" . mysql_field_name($result, $i) . "</th>";
}
echo "</tr>";

//่ส่้่วนข้อมูล
while($data = mysql_fetch_array($result)) {
	echo  "<tr>";
	for($i=0; $i<$num_fields; $i++) {
		echo "<td>" .  $data[$i] . "</td>";
	}
	echo "</tr>";
}
echo "</table><p align=center>";

//ส่วนการแสดงหมายเลขเพจ
echo "หน้า: $current_page / $total_pages <br />";

$page_range = 5;
$qry_string = "";	//ในที่นี้ไม่มี query string

//สร้างลิงค์การเชื่อมโยงระหว่างเพจ โดยเรียกฟังก์ชันที่อยู่ใน include file
$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string);

//แสดงลิงค์ที่ได้รับมา
echo $page_str;

mysql_close();
?>
</body>
</html>