<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 8-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$rudes = array("xxx", "yyy", "zzz");
$msg = "I want zzz but she needs xxx!";
$a = array();
foreach($rudes as $r) {
	//ᾷ���칤ӷ������������ �¨����ѡ�������͹�����ѧ�ӡ���ǡ���
	$pattern = ".*$r.*";
	if(eregi($pattern, $msg)) {
		//��Ҿ� �����������������
		array_push($a, $r);
	}
}

if(count($a) > 0) {
	//�������������ʵ�ԧ���ǡѹ�¤�蹴��� <br /> ��������鹺�÷Ѵ����
	$str = implode("<br />", $a);
	echo "�������ӷ�������������ѧ���仹��: <br />";
	echo $str;
}
?>
</body>
</html>