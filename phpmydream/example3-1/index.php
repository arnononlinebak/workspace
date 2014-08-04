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

//เงื่อนไขที่ 1 ต้องหารด้วย 4 ลงตัว แต่หารด้วย 100 ไม่ลงตัว
if($year % 4 == 0) {
	
 	if($year % 100 != 0) {
 		echo $year . " is a leap year";
 	}
 	else {
 		echo $year . " is not a leap year";
 	}
		
}
	
//หรือเงื่อนไขที่ 2 ต้องหารด้วย 400 ลงตัว
else if($year % 400 == 0) {
 	echo $year . " is a  leap year";
}
	
//กรณีอื่นๆ จะไม่เป็น leap year
else {
 	echo $year . " is not a leap year";
}
?>
</body>
</html>
