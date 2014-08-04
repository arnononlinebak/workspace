<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Auction: List Items</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.php");
include("dbconn.inc.php");
include("../inc/paging.inc.php");

$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 10;
$start_row = paging_start_row($current_page, $rows_per_page);

//เลือกเฉพาะรายการที่ยังไม่ปิดประมูล 
//โดยเรียงลำดับจากรายการล่าสุดไปยังรายการก่อนนี้
$sql = "SELECT SQL_CALC_FOUND_ROWS *,
 				DATE_FORMAT(end_date, '%d/%m/%Y') AS ndate
 			FROM item 
			WHERE end_date > NOW() 
			ORDER BY item_id DESC
			LIMIT $start_row, $rows_per_page;";
			
$result = mysql_query($sql);

$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);

if(mysql_num_rows($result) == 0) {
	echo "<p align=center>ไม่พบรายการที่เปิดประมูล</p>
				</body></html>
	";
	exit;
}
echo "<table align=center>
		<tr bgcolor=lavender>
			<th width=50>รูปภาพ</th>
			<th width=250>ชื่อสินค้า</th>
			<th width=100>ราคาปัจจุบัน</th>
			<th width=100>วันปิดประมูล</th>
		</tr>";

while($data = mysql_fetch_array($result)) {
	$id = $data['item_id'];
	
	//ตรวจสอบราคาปัจจุบันของสินค่านั้นจากตาราง bid
	//โดยราคาปัจจุบันคือราึคาที่สูงสุดที่มีผู้เสนอสำหรับสินค้ารายการนั้น
	$sql = "SELECT MAX(offer) FROM bid WHERE item_id = $id;";
	$r = mysql_query($sql);
	$cur_price = mysql_result($r, 0, 0);
	
	//ถ้าไม่มีข้อมูล แสดงว่าสินค้านั้นยังไม่มีผู้เสนอราคา
	//เราต้องเอาราคาเริ่มต้นที่เจ้าของสินค้ากำหนดมาใช้แทน
	if(empty($cur_price)) {
		$cur_price = $data['starting_price'];
	}
	
	echo "<tr valign=top>
				<td>	<img width=30 src=read_img.php?item_id=$id /> </td>
				<td> <a href=\"item_details.php?item_id=$id\">{$data['item_name']}</a> </td>
				<td align=center>	$cur_price </td>
				<td align=center> {$data['ndate']} </td>
			</tr>";
}

echo "<tr><td colspan=4 align=center>";

$page_range = 5;
$qry_str = "";
$total_pages = paging_total_pages($total_rows, $rows_per_page); 
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							    			 $page_range, $qry_str);
echo "หน้า: " . $pagenum;

echo "
</td></tr>
</table>";
?>
</body>
</html>
