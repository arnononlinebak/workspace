<?php
include("chatroom.inc.php");
my_connect();

//��ҹ��ª��ͼ��������ͧʹ��� �����§����ӴѺ������ҷ���ѧ�����ҧ��	
$sql = "SELECT name FROM chatter
	 		ORDER BY join_time DESC;";
$result = mysql_query($sql);

$response = "";
while($data = mysql_fetch_array($result)) {
	$response .= "&raquo;&nbsp;{$data['name']}<br>";
}

header("Content-Type:text/plain; charset=tis-620");
echo $response;
?>