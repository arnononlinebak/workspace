<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 4-4</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
function print_array($arr) {
	for($i = 0; $i < count($arr); $i++) {
		echo $arr[$i] . "  ";
	}
}

$a1 = array("IMG0.png", "img12.png", "img10.png", "img2.png", 
 					"img1.png", "IMG3.png");
$a2 = $a1;

echo "<b>ก่อนการเรียงลำดับ: </b> ";
print_array($a1);

sort($a1);

echo "<p /><b>หลังใช้ sort(): </b> ";
print_array($a1);

natcasesort($a2);

echo "<p /><b>หลังใช้ natcasesort(): </b> ";
print_array($a2);
?>
</body>
</html>