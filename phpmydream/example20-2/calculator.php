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

//สร้างคำสั่งจาวาสคริปต์ในแบบสตริงของ PHP
//เราจึงสามารถนำค่าตัวแปรของ PHP มาแทรกลงไปได้
$js = "
	var msg = '$num1 $op $num2 = $result';
	alert(msg);
";
	
header("Content-Type:text/javascript; 
 			charset=tis-620");
echo $js;
?>