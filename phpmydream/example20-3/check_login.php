<?php
$login = $_POST['login'];

$pattern = "^[a-zA-Z0-9]{3,10}$";		
$users = array("abc", "123", "xyz");  //����Ԫ��ͼ����������������

//��Ǩ�ͺ Login �������¡�ѧ��ѹ����ʤ�Ի�� displayResult() ���ྨ index.php ����ҷӧҹ
if(!eregi($pattern, $login) || in_array($login, $users)) {
	$js = "displayResult(false);";
}
else {
	$js =   "displayResult(true);";
}

header("Content-Type: text/javascript; charset=tis-620");
echo $js;
?>