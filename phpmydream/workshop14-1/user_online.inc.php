<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sid = session_id();

//���������鹴��¡��ź sid �������������Ƿ��仡�͹
$sql = "DELETE FROM user_online WHERE  expire < NOW();";
mysql_query($sql);

//㹡�úѹ�֡��� sid 㹷��������͡������ REPLACE 
//���ͧ�ҡ �ҡ�ѧ����դ�� sid �����͹������������ŧ�����͹�����  INSERT
//���ҡ�� sid �����͹���� ����繡����䢢������������͹����� UPDATE
$sql = "REPLACE INTO user_online VALUES
 			('$sid', DATE_ADD(NOW(), INTERVAL 15 MINUTE));";
mysql_query($sql);

//���ͧ�ҡ�����ź sid �����������͡����� 
//�֧����ö�Ѻ���������繵�ͧ�����͹䢡�ùѺ
$sql = "SELECT COUNT(*)  FROM  user_online;";  //WHERE expire > NOW()
$result = mysql_query($sql);
$num_users = 0;
if($result) {
	$num_users = mysql_result($result, 0, 0);
}
echo $num_users;
mysql_close();
?>