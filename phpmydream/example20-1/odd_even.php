<?php
$num = $_GET['num'];

$result = "";
if(!is_numeric($num)) {
	$result = "��ҷ�������������Ţ";
}
else if($num%2 == 0) {
	$result = "$num ���Ţ���";
}
else {
	$result = "$num ���Ţ���";
}

//���ͧ�ҡ���Ѿ������觡�Ѻ���ѡ��������´��� �֧��ͧ��˹� charset �� tis-620
header("Content-Type:text/plain; charset=tis-620");
echo $result;
?>