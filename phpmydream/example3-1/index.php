<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 3-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$year = 2012;

//���͹䢷�� 1 ��ͧ��ô��� 4 ŧ��� ����ô��� 100 ���ŧ���
if($year % 4 == 0) {
	
 	if($year % 100 != 0) {
 		echo $year . " is a leap year";
 	}
 	else {
 		echo $year . " is not a leap year";
 	}
		
}
	
//�������͹䢷�� 2 ��ͧ��ô��� 400 ŧ���
else if($year % 400 == 0) {
 	echo $year . " is a  leap year";
}
	
//�ó����� ������� leap year
else {
 	echo $year . " is not a leap year";
}
?>
</body>
</html>
