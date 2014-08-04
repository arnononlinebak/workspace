<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 3-6</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$sum = 0;
echo "Sum of 1 - ";

for($i = 1; $i <= 10; $i++) {
	$sum += $i;
	if($sum >= 30) {
		$x = $i;
		exit;
	}
}
echo "$x = $sum";
?>
</body>
</html>
