<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 8-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("Visitor.class.php");

$v1 = new Visitor();
echo "Visitors: " . $v1->getVisitor() . "<br />";

$v2 = new Visitor();
echo "Visitors: " . $v2->getVisitor() . "<br />";

$v3 = new Visitor();
echo "Visitors: " . $v3->getVisitor() . "<br />";
?>
</body>
</html>