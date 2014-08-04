<?php
$bgcolor = "white";		//ค่าดีฟอลต์
$textcolor = "black";		//ค่าดีฟอลต์
if(isset($_COOKIE['bgcolor']) && isset($_COOKIE['textcolor'])) {
	$bgcolor = $_COOKIE['bgcolor'];
	$textcolor = $_COOKIE['textcolor'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 9-2: Index</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body bgcolor="<?php echo $bgcolor; ?>" text="<?php echo $textcolor; ?>" alink="blue" vlink="blue">
<h2>ทดสอบการตั้งค่าเว็บด้วย Cookie</h2>
<p />
หากท่านต้องการตั้งค่าสีพื้นหลังและสีัตัวอักษร <a href="page_setting.php">คลิกที่นี่</a>
</body>
</html>