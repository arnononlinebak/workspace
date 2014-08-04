<?php
include("webboard.inc.php");
my_connect();

$topic_id = $_POST['topicid'];
$reply_id = $_POST['replyid'];

$sql = "INSERT INTO alert VALUES($topic_id, $reply_id);";
@mysql_query($sql) or die(mysql_error());

header("Content-Type: text/javascript; charset=tis-620");

echo "window.status = '';
	 	alert('บันทึกการแจ้งลบแล้ว');";
?>
