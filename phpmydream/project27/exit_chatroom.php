<?php
include("chatroom.inc.php");
my_connect();

$name = $_POST['name'];

//ลบชื่อผู้ใช้คนนั้นออกจากตาราง chatter
$sql = "	DELETE FROM chatter WHERE name = '$name';";
mysql_query($sql);

//เพิ่มข้อความเข้าไปในตาราง message เพื่อแจ้งผู้ที่อยู่ในห้องสนทนาทราบว่า
//ผู้ใช้คนนั้นได้ออกจากห้องสนทนาไปแล้ว
$sql = "INSERT INTO message VALUES
			('', '### $name', 'ออกจากห้องสนทนา  ###', 'red', NOW());";
mysql_query($sql);

//ลบข้อความที่มาก่อน 10 ข้อความล่าสุดออกจากตาราง message 
//ตามเหตุผลที่ได้กล่าวมาแล้ว ทั้งนี้หากเราให้แสดงข้อความครั้งละต่างไปจากนี้
//ก็ต้องกำหนดตัวเลขให้ตรงกันด้วย
$sql = "	SELECT COUNT(*) FROM message;";
$result = mysql_query($sql);  
if(mysql_result($result, 0, 0)>10) {			
	$row = mysql_result($result, 0, 0) - 10;
	$sql = "DELETE FROM message ORDER BY post_time ASC 	LIMIT $row;";
	mysql_query($sql);
}

//ลบชื่อผู้ใช้ที่ขาดการติดต่อนานเกินกว่ากำหนด ซึ่งในที่นี้กำหนดไว้ที่ 1 วัน
$sql = "DELETE FROM chatter WHERE DATEDIFF(NOW(), last_post_time) >= 1;";
mysql_query($sql);

if(isset($_SESSION['name'])) {
	unset($_SESSION['name']);		//เซสชันนี้ถูกสร้างขึ้นที่เพจ index.php
}
header("Location: index.php"); 
?>