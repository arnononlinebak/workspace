<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 5-4</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$birth = strtotime("12/10/1980");
echo date("�ԩѹ�Դ����� j-m-Y", $birth);

echo "<p />";

$days = array("�ҷԵ��", "�ѹ���", "�ѧ���", "�ظ", "����ʺ��", "�ء��", "�����");
$months = array("���Ҥ�", "����Ҿѹ��", "�չҤ�", "����¹", "����Ҥ�", "�Զع�¹", 
					"�á�Ҥ�","�ԧ�Ҥ�", "�ѹ��¹", "���Ҥ�", "��Ȩԡ�¹", "�ѹ�Ҥ�");

$d = date('w') ;
$day = $days[$d];

$date = date('j');

$m = date('m') - 1;
$month = $months[$m];

$year = date('Y') + 543;

echo "�ѹ���ç�Ѻ�ѹ $day 
 	�ѹ��� $date ��͹ $month �� $year ";
echo date("��й������ H:i:s");
?>
</body>
</html>
