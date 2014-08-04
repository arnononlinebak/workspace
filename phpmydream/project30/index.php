<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Y-Commerce: Home</title>
<link rel="stylesheet" href="../css/style.css">
<style>
	.add_cart { font-size: 8pt; background-color: #CCBBFF; color: brown; }
	.line_dot { border-top: dotted 1px gray; }
</style>
<script src="../ajax/framework.js"> </script>
<script>
function addCart(id) {
	var data = "id=" + id;
	var URL = "add_cart.php";

	ajaxLoad('post', URL, data, "cart");
}
function readCart() {
	ajaxLoad('post', "read_cart.php", null, "cart");
}
</script>
</head>

<body>
<?php include("header.inc.php"); ?>

<!-- ตารางที่ใช้วางโครงร่างของส่วนแสดงรายกรสินค้าและรายการในรถเข็น -->
<table width="600" align="center" style="border: solid 1px #cccccc;">
<tr valign="top">

<!-- ช่องเซลล์ด้านซ้าย แสดงรายการสินค้า -->
<td width="430">
<p />

<!-- ตารางย่อยที่ซ้อนอยู่ภายในช่องเซลล์ด้ายซ้าย เพื่อให้จัดวางข้อมูลได้ตามที่ต้องการ -->
<table width="100%" bordercolor="gray" style="border-colllapse: collapse;">
<tr><td width="60">&nbsp;</td><td width="200">&nbsp;</td><td>&nbsp;</td></tr>

<?php
include("../inc/paging.inc.php");
include("dbconn.inc.php");

//นำการแบ่งเพจมาใช้ด้วย เผื่อกรณีมีสินค้าจำนวนมาก
$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 5;
$start_row = paging_start_row($current_page, $rows_per_page);

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM product  
			LIMIT $start_row, $rows_per_page;";
$result = mysql_query($sql); 
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0); 

if($total_rows == 0) {
	echo "<caption><b>ไม่พบรายการสินค้า</b></caption>";
}
else {
	$stop_row = paging_stop_row($start_row, $rows_per_page, $total_rows);
	echo "<caption><b>รายการสินค้าลำดับที่: " . ($start_row + 1) . 
 			" - " . "$stop_row จากทั้งหมด $total_rows </b></caption>";
}

while($p = mysql_fetch_array($result)) {
	$id = $p['pro_id'];
	
	//คำอธิบายสินค้า แสดงเพียง 100 อักขระแรก
	$descr = substr($p['description'], 0, 80) . "...";
	echo "
	<tr valign=top>
		<td rowspan=2 align=center>
			<img width=50 src=read_image.php?pid=$id />
		</td>
		<td colspan=2>
			<a href=product_detail.php?id=$id><b>{$p['pro_name']}</b></a> <br />
			$descr 
		</td>
	</tr>
	<tr valign=bottom>
		<td>
			ราคา: {$p['price']} บาท
		</td>
		<td align=right>
			<input type=button value=หยิบใส่รถเข็น class=add_cart
			 	onClick=\"addCart($id)\" />	
		</td>
	</tr>
	<tr><td colspan=3 class=line_dot>&nbsp;</td></tr>";
}
?>
</table>
<p align="center">

<?php
//แสดงหมายเลขเพจ 
$page_range = 5;
$qry_str = "";
$total_pages = paging_total_pages($total_rows, $rows_per_page); 
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							    			 $page_range, $qry_str);
echo "หน้า: " . $pagenum; 	
?>
</td>

<!-- ช่องเซลล์ด้านขวา แสดงรายการสินค้าที่อยู่ในรถเข็น -->
<td id="cart" bgcolor="#eeeeff">
	<script> readCart(); </script>
</td>

</tr>
</table>
<p>&nbsp;</p>
</body>
</html>