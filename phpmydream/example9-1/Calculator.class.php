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
 			//�ѧ��ѹ eval() ������żŤ���� PHP �����¹�Ẻ�ʵ�ԧ
		 	eval("echo $num1 $op $num2;"); 
		}
	}
}
?>