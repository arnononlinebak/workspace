<?php
if(!$_GET['e'] || !$_GET['c']) {
	exit;
}

$email = $_GET['e'];
$confirmation = $_GET['c'];

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");
	
$sql = "UPDATE member SET confirmation = ''
	 		WHERE email = '$email' AND confirmation = '$confirmation';";

$qry = mysql_query($sql);
if(!$qry) {
	die("การยืนยันผิดพลาด!");
}
else {
	header("Refresh: 3; url=index.php");   // กลับไปที่หน้าหลัก
	echo "การยืนยันเสร็จเรียบร้อย จะกลับสู่หน้าหลักใน 3 วินาที";
}
?>
