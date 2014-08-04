<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 4-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function calculate($num1, $num2, $op) {
	switch($op) {
		case "+":
			return $num1 + $num2; break;
		case "-":
			return $num1 - $num2; break;
		case "*":
			return $num1 * $num2; break;
		case "/":
			return $num1 / $num2; break;			
	}
}

function print_result($num1, $num2, $op) {
	echo $num1 . " $op " . $num2 . " = ";
	echo calculate($num1, $num2, $op) . "<br />";	//เรียกใช้ฟังก์ชันหนึ่งจากอีกฟังก์ชันหนึ่ง
}

print_result(15, 5, "+");
print_result(15, 5, "-");
print_result(15, 5, "*");
print_result(15, 5, "/");
?>
</body>
</html>
