<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$op = $_POST['op'];

$result = 0;
switch($op) {
	case "+": $result = $num1 + $num2;  break;
	case "-": $result = $num1 - $num2;  break;
	case "*": $result = $num1 * $num2; break;
	case "/": $result = $num1 / $num2;  break;
}

//���ҧ����觨���ʤ�Ի���Ẻʵ�ԧ�ͧ PHP
//��Ҩ֧����ö�Ӥ�ҵ���âͧ PHP ���áŧ���
$js = "
	var msg = '$num1 $op $num2 = $result';
	alert(msg);
";
	
header("Content-Type:text/javascript; 
 			charset=tis-620");
echo $js;
?>