<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 4-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function change($change) {
	$money_type = array(1000, 500, 100, 50, 20, 10, 5, 2, 1, 0.50, 0.25);  //��Դ�ͧ���ѵ�
	$change_type = array();		//���纪�Դ�ͧ���ѵ÷���ͧ��͹ �� 1000, 500, ...
	$change_num = array(); 	//��ӹǹ���ѵ����Ъ�Դ����ͧ��͹
	$remainder = $change;
	
	foreach($money_type as $type) {
		$num = floor($remainder/$type);
		$remainder -= $num * $type;
		
		//��੾�Ъ�Դ���ѵ÷���ͧ��͹��ҹ��
		if($num > 0) {
			array_push($change_type, $type);
			array_push($change_num, $num);
		}
	}
	
	//������� key=>value �� 1000=>1, 500=>3, ...
	$ch = array_combine($change_type, $change_num); 
	return $ch;
}
//--------------------------------------------------------------------------

$price = 109.75;	//��˹��Ҥ�
$pay = 1000;			//��˹��ӹǹ�Թ������

echo "�Ҥ����: $price <br />";
echo "����: $pay <br />";
if($pay < $price) {
	echo "�����Թ����";
}
else if($pay == $price) {
	echo "�����Թ�ʹ� ����ͧ�͹";
}
else {
	$change = $pay - $price;
	$result = change($change);

	echo "�Թ�͹: " . ($pay - $price) . "<p>";
	while(list($type, $num) = each($result)) {
		echo "�" . $type . " => " . $num . "<br />";
	}
}
?>
</body>
</html>