<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>E-Card: Index</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");
include("ecard.inc.php");
include("../inc/paging.inc.php");
my_connect();
?>
<br />
<table width="520" align="center" cellpadding="7" cellspacing="0" style="border: solid 1px #cccccc;">
<tr valign="top">

<!-- เริ่มต้นคอลัมน์ที่แสดงเมนูของหมวดหมู่ -->
<td width="150" bgcolor="lavender">
<?php
echo "<b>หมวดหมู่ของการ์ด:</b><p />
		&raquo; <a href=\"" . $_SERVER['PHP_SELF'] . "\">รวมทั้งหมด</a><br />";
		
$url = $_SERVER['PHP_SELF'];
foreach($CARD_CATS as $cat => $cat_name) {
	echo "&raquo; <a href=$url?cat=$cat>$cat_name</a> <br />";
}
?>
</td>

<!-- เริ่มคอลัมน์ที่แสดงภาพ -->
<td align="center">
<?php
//แสดงชื่อหมวดที่ถูกเลือกในการแสดงภาพ
echo "<b>การ์ดในหมวด: <font color=red>";
		
if($_GET['cat']) {
	echo $CARD_CATS[$_GET['cat']];	//อ่านชื่อหมวดจาก key ของหมวดนั้น
}
else {
	echo "รวมทั้งหมด";
}
echo "</font></b>	<br />";
?>

<!-- เริ่มต้นส่วนการแสดงภาพ 	-->
<?php
$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 10;
$start_row = paging_start_row($current_page, $rows_per_page);

//ถ้ามีค่า id ของหมวดหมู่ส่งเข้ามาก็นำไปเป็นเงื่อนไขเลือกเฉพาะการ์ดในหมวดนั้น
//ถ้าไม่มีก็อ่านทุกหมวด
$sql = "SELECT SQL_CALC_FOUND_ROWS id, title FROM card ";
if(isset($_GET['cat'])) {
	$c = $_GET['cat'];
	$sql .= "WHERE category = '$c' ";
}
$sql .= "ORDER BY id DESC
 			LIMIT $start_row, $rows_per_page;";

$result = mysql_query($sql);
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);

if(!$result  || $total_rows == 0) {
	echo "<br />ไม่พบภาพการ์ดในฐานข้อมูล 
				</td></tr></table>
				</body></html>";
	exit;
}

//แสดงเป็นรายการในลักษณะ thumbnail โดยสร้างตารางย่อยที่มี 2 คอลัมน์
echo "<table border=0 cellpadding=5 cellspacing=5>";
		
$num_rows = mysql_num_rows($result);
for($i=0; $i <  $num_rows; $i++) {
	$id = mysql_result($result, $i, "id");
	$title = mysql_result($result, $i, "title");
	
	//สร้างลิงค์ให้กับของแต่ละภาพและไตเติ้ลของมัน
	$a = "<a href=\"send_card.php?id=$id\" target=_blank>";	
	
	$img = "$a<img src=\"card_img.php?id=$id\" height=60 border=0 /></a>";
	$title = "$a$title</a>";
		
	//ในที่นี้จะให้แสดงแถวละ 2 ภาพ ดังนั้นหากตัวนับหาร 2 ลงตัว
	//แสดงว่าเป็นการเริ่มแถวใหม่ และคอลัมน์แรกของแถว
	if($i % 2 == 0) {
		echo  "<tr align=center valign=bottom>";
		echo "<td>$img<br />$title</td>";
	}
	
	//ถ้าไม่ใช่แสดงว่าเป็นคอลัมน์ที่ 2 และต้องสิ้นสุดแถว
	else {
		echo "<td>$img<br />$title</td>";
		echo "</tr>";
	}
}

//กรณีที่จำนวนภาพไม่ลงตัวพอดีกับจำนวนช่องเซลล์
//ซึ่งจะทำให้ตารางขาดไป 1 เซลล์ ดังนั้นเราต้องเขียนเติมให้ครบ
if($num_rows % 2 != 0) {
	echo "<td>&nbsp;</td></tr>";
}
?>

</table>
<p align=center>
<!-- ส่วนแสดงหมายเลขเพจ -->

<?php
//ในส่วนการแบ่งเพจ หากมี id ของหมวดหมู่อยู่ที่ Query String
//ก็ต้องแนบต่อไปที่เพจอื่นๆด้วย เพื่อจะได้เลือกอ่านเฉพาะการ์ดในหมวดนั้นๆ
if($_GET['cat']) {
	$qry_str = "cat=" . $_GET['cat'];
}
else {
	$qry_str = "";
}
$page_range = 5;
$total_pages = paging_total_pages($total_rows, $rows_per_page); 
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							    			 $page_range, $qry_str);
echo "หน้า: " . $pagenum;
?>

</p>
</td>
</tr>
</table>

</body>
</html>