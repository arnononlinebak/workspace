<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Y-Commerce: Notify</title>
<link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php
include("../dbconn.inc.php");

$cust_id = $_GET['cid'];

$sql = "SELECT * FROM customer WHERE cust_id = $cust_id;";
$result = mysql_query($sql);
$cust_name = mysql_result($result, 0, "name");
$cust_email = mysql_result($result, 0, "email");

$sql = "SELECT * FROM orders WHERE cust_id = $cust_id;";
$result = mysql_query($sql);

$msg = "
	เรียน คุณ$cust_name <br /><br />
	จากการที่ท่านได้สั่งซื้อสินค้าจากเว็บไซต์ y-commerc.com ตามรายการต่อไปนี้คือ
	<br /><br />

	<table border=1 cellpadding=5 style=\"border-collapse: collapse;\">
	<tr bgcolor=#eeeeff>
		<th width=30>ลำดับ</th><th width=230>รายการ</th>
		<th width=50>จำนวน</th><th width=80>ราคา</th><th width=80>รวม</th>
	</tr>
	";
	
$i = 1;
$t = 0;
while($ord = mysql_fetch_array($result)) {
	$st = $ord['price'] * $ord['quantity'];
	$msg .= "
	<tr>
	<td align=center>$i</td>
	<td>{$ord['pro_name']}</td>
	<td align=center>{$ord['quantity']}</td>
	<td align=center>{$ord['price']}</td>
	<td align=right>$st</td>
	</tr>
	";
	
	$gt += $st;
	$i++;
}

$msg .= "
<tr align=center>
	<td colspan=4 align=right><b>รวมทั้งหมด</b></td><td align=right>$gt</td>
</tr>
</table>
<br />
";

$notify = $_GET['notify'];

if($notify == "payment") {
	$msg .= "
	เราจึงขอแจ้งให้ท่านชำระค่าสินค้า โดยโอนเงินจำนวน <b> $gt บาท</b>  <br />
	ผ่านธาคารหรือตู้ ATM  ไปยังบัญชีอันใดอันหนึ่งต่อไปนี้คือ
	<ul>
		<li>ธนาคารไทยพาณิชย์ สาขา ... ชื่อบัญชี .... เลขที่บัญชี ....
		<li>ธนาคารกรุงเทพ สาขา ... ชื่อบัญชี .... เลขที่บัญชี ....
		<li>ธนาคารกสิกรไทย สาขา ... ชื่อบัญชี .... เลขที่บัญชี ....
	</ul>
	จากให้ส่งหลักฐานการโอนด้วยวิธีใดวิธีหนึ่งต่ิอไปนี้ี้คือ
	<ul>
		<li>เขียนชื่อและอีเมล์ลงในใบโอนหรืิอสลิป แล้วส่งแฟกซ์มาที่ .... 
		<li>หรือสแกน/ถ่ายภาพ แล้วส่งมาทีอีเมล ....
		<li>โทรมาแจ้งที่หมายเลข ...
	</ul>
	หลังจากได้รับหลักฐานการชำระเงินแล้ว เราจะจัดส่งสินค้าให้ท่านทันที <br />
	หากท่านไม่ชำระภายใน 7 วัน คำสั่งซื้อของท่านจะถูกยกเลิก <br />
	";
}
else {
	$msg .= "
	ขณะนี้ทางเว็บไซต์ได้จัดส่งสินค้าให้กับท่านเรียบร้อยแล้ว  โดยท่านจะ่ได้รับสินค้าภายใน 7 วัน  <br /><br />

	ขอบพระคุณที่ใช้บริการของเรา
	";
}
//echo $msg;

//นำข้อมูลทั้งหมด มาสร้างเป็นอีเมล
$header = "From: noreply@y-commerce.com\r\n";
$header .= "Content-type: text/html; charset=tis-620\r\n";
	
$to = $cust_email;
$subject = "แจ้งการสั่งซื้อสินค้า";
$body = $msg;
	
$sendmail = mail($to, $subject, $body, $header);
	
if($sendmail) {
	echo "การแจ้งเตือนถูกส่งไปที่ $to แล้ว";
	if($notify == "delivery") {
		//อัปเดตสถานะการจัดส่ง ว่าได้จัดส่งสินค้าแล้ว
		$sql = "UPDATE customer SET delivery = 'Yes' WHERE cust_id = $cust_id;";
		mysql_query($sql);
	}
}
else {
 	echo "การส่งเมล เกิดข้อผิดพลาด";
}

?>
</body>
</html>