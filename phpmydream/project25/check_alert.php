<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Webboad: Admin/Check Alert</title>
<link rel="stylesheet" href="../css/style.css"  />
<script>
function submitAction(href) {
	if(!confirm('ยืนยันการกระทำนี้?')) {
		return;
	}
	window.location = href;
}
</script>
</head>
<body>
<h3 align="center">รายการที่ถูกแจ้งลบ</h3>
<?php
include("webboard.inc.php");
my_connect();

$url = $_SERVER['PHP_SELF'];

//ถ้ามีข้อมูลถูกส่งขึ้นมา 
if(isset($_GET['action'])) {
	$action = $_GET['action'];
	$topic_id = $_GET['topicid'];
	$reply_id = $_GET['replyid'];
	
	//ถ้าเป็นการลบ และ reply_id = 0 แสดงว่าเป็นการแจ้งลบกระทู้
	if($action == "delete" && $reply_id == "0") {
		$sql = "DELETE FROM topic WHERE topic_id = $topic_id;";
		mysql_query($sql);
		$sql = "DELETE FROM reply WHERE topic_id = $topic_id;";
		mysql_query($sql);
	}
	//ถ้าเป็นการลบ และ reply_id ไม่ใช่ 0 แสดงว่าเป็นการแจ้งลบความคิดเห็น
	else if($action == "delete" && $reply_id != "0") {
		$sql = "DELETE FROM reply WHERE reply_id = $reply_id;";
		mysql_query($sql);	
		
		$sql = "UPDATE topic SET num_reply = num_reply - 1
				   WHERE topic_id = $topic_id;";
		mysql_query($sql);
	}
	
	//ไม่ว่าจะเป็นการลบกระทู้หรือความคิดเห็นหรือยกเลิกการแจ้งลบ
	//สิ่งที่ต้องทำเหมือนกันคือ เคลียร์การแจ้งลบนั้นในตาราง alert
	if($reply_id == "0") {
		$sql = "DELETE FROM alert WHERE topic_id = $topic_id AND reply_id = 0;";
		mysql_query($sql);
	}
	else if($reply_id != "0") {
		$sql = "DELETE FROM alert WHERE topic_id = $topic_id AND reply_id = $reply_id;";
		mysql_query($sql);
	}
}
?>

<table width="650" border="1" cellpadding="5" cellspacing="0" align="center">

<tr bgcolor="#dddddd"><th width="490">กระทู้ที่ถูกแจ้งลบ</th><th>Action</th></tr>
<?php
//เลือกเอาเฉพาะที่เป็นการแจ้งลบกระทู้ โดยอ่านข้อมูลจากตาราง topic ที่มี id ถูกแจ้งลบอยู่ในตาราง alert
$sql = "SELECT * FROM topic 	WHERE topic_id IN(
		 		SELECT topic_id FROM alert WHERE reply_id = 0);";
				
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)) {
	$qrystr = "topicid={$data['topic_id']}";
	$qrystr .= "&replyid=0";
	echo "
	<tr valign=top>
		<td>
			<b>{$data['title']}</b>
			<p>{$data['details']}</p>
			{$data['name']} - [{$data['ip']}]
		</td>
		<td>
			<button onclick=\"submitAction('$url?action=delete&$qrystr')\">ลบ</button>
			<button onclick=\"submitAction('$url?action=cancel&$qrystr')\">ยกเลิก</button>
		</td>
	</tr>
	";
}
?>
</table>
<br />

<table width="650" border="1" cellpadding="5" cellspacing="0" align="center">

<tr bgcolor="#dddddd"><th width="490">ข้อคิดเห็นที่ถูกแจ้งลบ</th><th>Action</th></tr>
<?php
//เลือกเอาเฉพาะที่เป็นการแจ้งลบความคิดเห็น	 หลักการคล้ายกับกระทู้ที่ถูกแจ้งลบ
$sql = "SELECT * FROM reply WHERE reply_id IN(
		 		SELECT reply_id FROM alert);";
				
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)) {
	$qrystr = "topicid={$data['topic_id']}";
	$qrystr .= "&replyid={$data['reply_id']}";
	echo "
	<tr valign=top>
		<td>
			{$data['message']}
			<br /><br />
			{$data['name']} - [{$data['ip']}]
		</td>
		<td>
			<button onclick=\"submitAction('$url?action=delete&$qrystr')\">ลบ</button>
			<button onclick=\"submitAction('$url?action=cancel&$qrystr')\">ยกเลิก</button>
		</td>
	</tr>
	";
}
?>
</table>
</body>
</html>
