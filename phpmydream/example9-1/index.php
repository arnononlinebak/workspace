<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 8-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("Calculator.class.php");

$cal = new Calculator();
$cal->showResult(10, 20, "*");
?>
</body>
</html>
