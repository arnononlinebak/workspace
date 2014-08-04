<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 7-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$name = $_POST['name'];
$address = $_POST['address'];

if(isset($_POST['payment'])) {
	$payment = $_POST['payment'];
	if($payment == "บัตรเครดิต") {
		$payment .= "(" . $_POST['card'] . ")";
	}
}
else {
	$payment = "<font color=red>ยังไม่ได้เลือกวิธีชำระเงิน</font>";
}

echo "<b>Name:</b> $name <br />
		<b>Address:</b> $address <br />
		<b>Payment:</b> $payment ";
?>
</body>
</html>
