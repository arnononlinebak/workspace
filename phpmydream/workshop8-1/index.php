<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 8-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
//ถ้าเป็นการ Postback ข้อมูลเข้ามา
if($_POST) {
	$msg = $_POST['msg'];
	
	if(get_magic_quotes_gpc()) {
		$msg = stripslashes($msg);
	}
	
	//ป้องกันการใส่แท็ก HTML 
	$msg = htmlspecialchars($msg);
	
	//แปลง \n ให้เป็น <br />
	$msg = nl2br($msg);
	
	echo "<b>ข้อความก่อนการแทนที่:</b> 
	 		<div style=\"background-color:#ddffdd; padding: 5px;\"> $msg </div>";
	
	$pattern_url = "(http(s?):\/\/)([a-z0-9\-]+\.)+[a-z]{2,4}(\.[a-z]{2,4})*(\/[^ ]+)*";
	$replace_pattern = "<a href=\"\\0\">\\0</a>";
	
 	$msg = ereg_replace($pattern_url, $replace_pattern, $msg);

	$pattern_email = "[a-z]([a-z0-9_\.])+([a-z0-9])+@([a-z0-9\-]+\.)+([a-z]{2,4})(\.[a-z]{2,4})*";
	$replace_pattern = "<a href=\"mailto: \\0\">\\0</a>";
	
 	$msg = ereg_replace($pattern_email, $replace_pattern, $msg);
	
	echo "<br /><b>ข้อความหลังการแทนที่:</b>
	 		<div style=\"background-color:#ddffdd; padding: 5px;\"> $msg </div>";
			
	//หลังแสดงผล ปิิดเพจแล้วหยุดการทำงานในส่วนที่เหลือ
	echo "</body></html>";
	exit;
}
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  ข้อความ:<br />
  <textarea name="msg" cols="40" rows="4" id="msg"></textarea>
  <br />
  <input type="submit" name="Submit" value="ส่งข้อมูล" />
</form>
</body>
</html>