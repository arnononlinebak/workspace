<?php
class Calculator {
	function showResult($num1, $num2, $op) {
		if(!is_numeric($num1) || !is_numeric($num2)) {
			echo "NAN";
		}
		else if(!in_array($op, array("+", "-", "*", "/"))) {
			echo "Parse operator error!";
		}
		else {
 			echo "$num1 $op $num2 = ";
		 	eval("echo $num1 $op $num2;"); 
 			//�ѧ��ѹ eval() ������żŤ���� PHP �����¹�Ẻʵ�ԧ
		}
	}
}
?>