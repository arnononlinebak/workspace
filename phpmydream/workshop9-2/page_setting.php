<?php
if(isset($_POST['bgcolor'])) {
	$bgcolor= $_POST['bgcolor'];
	$textcolor= $_POST['textcolor'];
	$day = 30;
	if(is_numeric($_POST['day']) && $_POST['day'] > 0) {
		$day = $_POST['day'];
	}
	$expires = time() + (60 * 60 * 24 * $day);
	
	setcookie("bgcolor", $bgcolor, $expires);
	setcookie("textcolor", $textcolor, $expires);
	setcookie("day", $day, $expires);
		
	header("Refresh: 5; url=index.php");
	echo "การตั้งค่าเสร็จเรียบร้อย และจะย้ายไปยังเพจหลักภายใน 5 วินาที";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 9-2: Page Setting</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$bgcolor= "white";		//ค่าดีฟอลต์
$textcolor= "black";	//ค่าดีฟอลต์
$day = 30;					//ค่าดีฟอลต์
if(isset($_COOKIE['bgcolor']) && isset($_COOKIE['textcolor']) && isset($_COOKIE['day'])) {
	$bgcolor= $_COOKIE['bgcolor'];
	$textcolor= $_COOKIE['textcolor'];
	$day = $_COOKIE['day'];
}
?>
<b>ค่าที่ตั้งเอาไว้:</b>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  สืีพื้นหลัง
  <select name="bgcolor" id="bgcolor">
    <option value="white" selected="selected" <?php if($bgcolor == "white") echo " selected"; ?>>ขาว</option>
    <option value="black" <?php if($bgcolor == "black") echo " selected"; ?>>ดำ</option>
    <option value="lightgray" <?php if($bgcolor == "lightgray") echo " selected"; ?>>เทาอ่อน</option>
  </select>
  สีััตัวอักษร 
  <select name="textcolor" id="textcolor">
    <option value="black" selected="selected" <?php if($textcolor == "black") echo " selected"; ?>>ดำ</option>
    <option value="white" <?php if($textcolor == "white") echo " selected"; ?>>ขาว</option>
	<option value="red" <?php if($textcolor == "red") echo " selected"; ?>>แดง</option>
  </select>
  ระยะเวลา 
  <input type="text" name="day"  id="day" size="5" value="<?php echo $day; ?>" />วัน
  
  <input type="submit" name="Submit" value="ตั้งค่า" />
</form>

</body>
</html>