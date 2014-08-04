<?php
session_start();
$errmsg = "";

if($_POST) {
	include("chatroom.inc.php");
	
	$name = $_POST['name'];
	if(empty($name)) {
		$errmsg = "กรุณากำหนดชื่อก่อนเข้าห้องสนทนา";
	}
	else if(has_rudeword($name)) {	//ตรวจสอบว่ามีคำหยาบอยู่ในชื่อหรือไม่
		$errmsg = "ไม่อนุญาตให้ใช้ชื่อที่ไม่เหมาะสม กรุณาแก้ไข";
	}
	else {	
		my_connect();		//เชื่อมต่อกับฐานข้อมูล
		
		//SQL ตรวจสอบว่ามีผู้ใช้ชื่อนั้นอยู่ก่อนแล้วหรือไม่
		$sql = "SELECT COUNT(*) FROM chatter WHERE name = '$name';";
	 	$result = mysql_query($sql);

		//ไม่อนุญาตให้ใช้ชื่อซ้ำกัน
		if(mysql_result($result, 0, 0) > 0) {
			$errmsg = "ชื่อ: $name มีผู้ใช้แล้ว กรุณาใช้ชื่อใหม่";
		}
		else {
			//ถ้าชื่อไม่ซ้ำ ให้เก็บชื่อนั้นในตาราง chatter
			//และเก็บข้อความที่แสดงว่ามีผู้เข้ามาในห้องสนทนาใหม่ในตาราง message
			$sql = "INSERT INTO chatter VALUES('$name', NOW(), NOW());";
			mysql_query($sql);

			$sql = "INSERT INTO message VALUES
				 		(0, '### $name', 'เข้าร่วมห้องสนทนา  ###', 'red', NOW());";
			mysql_query($sql);
			
			//สร้าง Session พักชื่อเอาไว้เพื่อนำไปใช้ในเพจ chatroom.php
			$_SESSION['name'] = $_POST['name'];
		
			//ย้ายการไปที่เพจ chatroom.php เพื่อเข้าสู่ห้องสนทนา
			header("Location: chatroom.php");
			exit;
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ห้องสนทนา: กำหนดชื่อ</title>
<link rel="stylesheet" href="../css/style.css"  />
<style type="text/css">
<!--
.style1 {font-size: 16px}
-->
</style>
</head>
<body>
<?php include("header.inc.html");		?>
<center>
<h3>กำหนดชื่อแทนตัว ก่อนเข้าสู่ห้องสนทนา:</h3>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
  

  <br />ชื่อ
    <input name="name" type="text" id="name" maxlength="30" />
    <input type="submit" name="Submit" value="ตกลง" />
</form>
<font color=red><b><?php echo $errmsg; ?></b></font>
</center>
</body>
</html>