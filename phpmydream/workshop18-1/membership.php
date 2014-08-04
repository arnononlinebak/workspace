<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 18-1: Membership</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<h2>การเป็นสมาชิก</h2>
<?php
if($_POST) {
	$name = stripslashes($_POST['name']);
	$email = $_POST['email'];
	
	$errmsg = "";
	
	if(empty($name)) {
		$errmsg .= "ยังไม่ได้กำหนดชื่อ <br />";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errmsg .= "อีเมลไม่ถูกต้องตามรูปแบบ <br />";
	}

	if($errmsg != "") {
		echo $errmsg;
		echo "<a href=\"javascript: hostory.back();\">ย้อนกลับไปแก้ไข</a>
				</body></html>";
		exit;
	}
	
	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
 	mysql_select_db("phpmysql");
	
	//SQL สำหรับตรวจสอบว่ามีอีเมลนั้นอยู่ก่อนหรือไม่
	$sql = "SELECT COUNT(*) FROM mailinglist
	 			WHERE email = '$email';";
	$result = mysql_query($sql);
	$count = mysql_result($result, 0, 0);
	
	$purpose = $_POST['purpose'];
	
	if($purpose == "subscribe") {
		//ในการสมัครสมาชิก หากมีอีเมลนั้นอยู่ก่อนแล้ว จะไม่ยอมรับ
		if($count == 1) {
			echo "อีเมลที่ท่านระบุ มีอยู่ก่อนแล้ว";
		}
		else {
			$sql = "INSERT INTO mailinglist VALUES('$name', '$email');";
			@mysql_query($sql) or die(mysql_error());
	
			echo "ข้อมูลถูกจัดเก็บแล้ว <p />";
		}
	}
	else if($purpose == "unsubscribe") {
		//ในการยกเลิกเป็นสมาชิก ต้องใส่อีเมลที่มีอยู่แล้วในฐานข้อมูล
		if($count == 0) {
			echo "ไม่พบอีเมลตามที่ท่า่นระบุ";
		}
		else {
			$sql = "DELETE FROM mailinglist WHERE email = '$email';";
			@mysql_query($sql) or die(mysql_error());
	
			echo "ข้อมูลถูกลบแล้ว <p />";	
		}
	}
	else {
		echo "กรุณาเลือกวัตถุประสงค์";
	}
}
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  ชื่อ: 
  <label> </label>
  <label><br />
  <input name="name" type="text" id="name" size="30" />
  </label>
  <br />
อีเมล:<br />
<label>
<input name="email" type="text" id="email" size="30" />
</label>
<br />
<label>
<input name="purpose" type="radio" value="subscribe" />
สมัครสมาชิก</label>
 <label>
 <input name="purpose" type="radio" value="unsubscribe" />
 ยกเลิกการเป็นสมาชิก</label>
 <br />
 <br />
 <label>
 <input type="submit" name="Submit" value="ตกลง" />
 </label>
</form>
</body>
</html>