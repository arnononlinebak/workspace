<?php
include("chatroom.inc.php");
my_connect();

$name = $_POST['name'];

//ź���ͼ���餹����͡�ҡ���ҧ chatter
$sql = "	DELETE FROM chatter WHERE name = '$name';";
mysql_query($sql);

//������ͤ�������㹵��ҧ message �����駼�����������ͧʹ��ҷ�Һ���
//����餹������͡�ҡ��ͧʹ��������
$sql = "INSERT INTO message VALUES
			('', '### $name', '�͡�ҡ��ͧʹ���  ###', 'red', NOW());";
mysql_query($sql);

//ź��ͤ�������ҡ�͹ 10 ��ͤ�������ش�͡�ҡ���ҧ message 
//����˵ؼŷ�������������� ��駹���ҡ�������ʴ���ͤ��������е�ҧ仨ҡ���
//���ͧ��˹�����Ţ���ç�ѹ����
$sql = "	SELECT COUNT(*) FROM message;";
$result = mysql_query($sql);  
if(mysql_result($result, 0, 0)>10) {			
	$row = mysql_result($result, 0, 0) - 10;
	$sql = "DELETE FROM message ORDER BY post_time ASC 	LIMIT $row;";
	mysql_query($sql);
}

//ź���ͼ������Ҵ��õԴ��͹ҹ�Թ���ҡ�˹� ���㹷�����˹������ 1 �ѹ
$sql = "DELETE FROM chatter WHERE DATEDIFF(NOW(), last_post_time) >= 1;";
mysql_query($sql);

if(isset($_SESSION['name'])) {
	unset($_SESSION['name']);		//�ʪѹ���١���ҧ��鹷��ྨ index.php
}
header("Location: index.php"); 
?>