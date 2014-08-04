<?php
include("chatroom.inc.php");

$name = iconv("utf-8", "tis-620", $_POST['name']);
$msg = trim($_POST['msg']);
$msg = iconv("utf-8", "tis-620", $msg);

if(empty($msg) || has_rudeword($msg)){
	exit;
}

my_connect();

//ตรวจสอบว่าผู้ใช้คนนั้นยังมีชื่ออยู่ในห้องสนทนาหรือไม่ เำืพื่อป้องกันข้อผิดพลาด
$sql = "	SELECT COUNT(*) FROM chatter WHERE name = '$name';";
$result = mysql_query($sql);
if(mysql_result($result, 0, 0) == 0) {									
	header("Location: index.php");
	exit();
}

$msg = htmlspecialchars($msg, ENT_QUOTES); 	
$color = $_POST['color'];

//เก็บข้อมูลลงในตาราง message
$sql = "	INSERT INTO message VALUES(0, '$name', '$msg', '$color', NOW());";
mysql_query($sql);

//อัปเดตวันเวลาที่ตาราง chatter
$sql = "UPDATE chatter SET last_post_time = NOW()
	 		WHERE name = '$name';";
mysql_query($sql);

header("content-type:text/plain; charset=tis-620");
echo "";	
?>