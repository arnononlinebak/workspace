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
 			//ฟังก์ชัน eval() ใช้ประมวลผลคำสั่ง PHP ที่เขียนในแบบงสตริง
		 	eval("echo $num1 $op $num2;"); 
		}
	}
}
?>