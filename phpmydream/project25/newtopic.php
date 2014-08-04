<?php
include("webboard.inc.php");
$errmsg = "";

if($_POST) {
 	//ตรวจสอบความถูกต้องของข้อมูล
	foreach($_POST as $k => $v) {
		if(get_magic_quotes_gpc()) {
			$v = stripslashes($v);	
		}
		$v = trim(htmlspecialchars($v)); 	//ป้องกันการใส่แท็ก HTML
		if(empty($v)) {
			$errmsg = "กรุณาใส่ข้อมูลให้่ครบด้วยค่ะ";
			break;
		}
		else if(has_rudeword($v)) {			//ตรวจสอบคำหยาบ
			$errmsg = "ไม่อนุญาตให้ใช้คำที่ไม่เหมาะสมค่ะ";
			break;
		}
		$_POST[$k] = $v;	
	}

	//ถ้าไม่มีข้อผิดพลาด ให้บันทึกลงในตารางฐานข้อมูล
	if($errmsg == "") {
		my_connect();	
		
		$title = $_POST['title'];							
		$details = $_POST['details'];
		$details = nl2br($details);	 			//แปลงการขึ้นบรรทัดใหม่เป็น <br />
		$name = $_POST['name'];
		$ip = $_SERVER['REMOTE_ADDR'];

		$sql = "INSERT INTO topic VALUES
					(0, '$title', '$details', '$name', NOW(), 0, '$ip');";
					
		@mysql_query($sql) or die(mysql_error());
		
		header("Refresh: 1; url=index.php");
	}
	else {
 		echo "<font size=4 color=red>$errmsg</font><p />
				 <a href=\"javascript: history.back()\">ย้อนกลับไปแก้ไข</a>";
	}
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Webboard: New Topic</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php include("header.inc.html");	?>

<h3 align="center">ตั้งกระทู้ใหม่</h3>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table cellpadding="1" cellspacing="1" align="center">
    <tr valign="top">
      <td><strong>หัวข้อ</strong></td>
      <td>
        <label>
        <input name="title" type="text" id="title" size="40"  value=""/>
        </label>      </td>
    </tr>
    <tr valign="top">
      <td><strong>รายละเอียด</strong></td>
      <td>
        <label>
        <textarea name="details" cols="40" rows="5" id="details"></textarea>
        </label>      </td>
    </tr>
    <tr valign="top">
      <td><strong>ชื่อ</strong></td>
      <td>
        <label>
        <input name="name" type="text" id="name" size="25" value="" />
		&nbsp;&nbsp;
		<input name="Submit" type="submit" value="ส่งข้อมูล" />
        </label>      </td>
    </tr>
  </table>
</form>
<br />
<p align="center"><a href="index.php">ยกเลิก</a></p>
</body>
</html>