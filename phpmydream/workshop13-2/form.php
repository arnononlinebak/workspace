<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 13-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function back() {
 	mysql_close();
	echo "<p /><a href=\"index.php\">ย้อนกลับ</a></body></html>";
	exit;
}

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
@mysql_select_db("phpmysql") or die(mysql_error());

//ถ้าเป็นการ Postback เพื่อข้อมูลจากฟอร์มกลับเข้ามา
if(isset($_POST['id'])) {

 	//ลบค่าของปุ่ม Submit ออกไปจากตัวแปร $_POST เพื่อให้เหลือเฉพาะส่วนข้อมูลล้วนๆ
	unset($_POST['Submit']);
	
	//นำข้อมูลจากตัวแปร $_POST ที่เหลือมาเรียงต่อเป็นสตริงเดียวกัน โดยคั่นด้วย ', '
	$values = implode("', '", $_POST);  //ลักษณะผลลัพธ์ เช่น a', 'b', 'c', 'd
	
	//ปิดหัวท้ายด้วย ' เพื่อให้ครบคู่ ลักษณะผลลัพธ์จะเป็น 'a', 'b', 'c', 'd'
	$values = "'" . $values . "'";
	
	//นำข้อมูลนั้นมาสร้างเป็น SQL ในแบบคำสั่ง REPALCE
	$sql = "REPLACE INTO people VALUES($values);";
	
	$result = mysql_query($sql);
	if(!$result) {
		echo mysql_error();
	}
	else {
		echo "ข้อมูลถูกบันทึกแล้ว";
		back();
	}
}

// ------------------------------------------------------------------
//ส่วนต่อไปนี้สำหรับการเชื่อมโยงมาจากเพจแสดงข้อมูล(index.php)

//สร้างตัวแปรที่จะนำไปเติมลงในอินพุท โดยกำหนดเป็นค่าวา่งเอาไว้ก่อน
$id = ""; $name=""; $address=""; $email=""; $birthday="";

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	//ถ้าเป็นเพิ่มข้อมูล ก็ไม่ต้องทำอะไร เพื่อให้ฟอร์มนั้นว่างเปล่าสำหรับรับข้อมูลใหม่
	if($action == "insert") {
		echo ">> เพิ่มข้อมูล";
	}
	else {
		$id = $_GET['id'];
		
		//ถ้าเป็นการลบ ก็นำค่า id ไปกำหนดเป็นเงื่อนไขการลบ
		if($action == "delete") {
			$delete = mysql_query("DELETE FROM people WHERE id = $id;");
			if(!$delete) {
				echo mysql_error();
			}
			else {
				echo "ข้อมูลถูกลบแล้ว";
			}
 			back();
		}
		else if($action == "update") {		//ถ้าเป็นการแก้ไขข้อมูล ต้องอ่านข้อมูลเดิมในตารางเพื่อนำมาเติมลงในฟอร์ม
			echo ">> แก้ไขข้อมูล";
			$result = mysql_query("SELECT * FROM people WHERE id = $id;");
			list($id, $name, $address, $email, $birthday) = mysql_fetch_row($result);
		}
	}
}
mysql_close();
?>
<p />
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="289" border="0" cellspacing="3" cellpadding="0">
    <tr>
	
      <td width="54">id</td>
      <td width="226"><?php echo $id; ?>
		<input name="id" type="hidden" size="10" value="<?php echo $id; ?>" />
		</td>
    </tr><tr>
      <td>name</td>
       <td><input name="name" type="text" size="30" value="<?php echo $name; ?>" /></td>
	
    </tr><tr>
      <td>address</td>
      <td><textarea name="address" cols="30" rows="2"><?php echo $address; ?></textarea></td>
    </tr>
    <tr>
      <td>email</td>
      <td><input name="email" type="text"  size="30" value="<?php echo $email; ?>" /></td>
    </tr>
    <tr>
      <td>birthday</td>
      <td><input name="birthday" type="text" size="15" value="<?php echo $birthday; ?>" /> 
        (เช่น 1990-10-31)</td>
		
    </tr><tr>
      <td>&nbsp;</td>
      <td>
      <input type="submit" name="Submit" value="Submit" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href="index.php"><br />
      </a></td>
    </tr><tr>
      <td>&nbsp;</td>
      <td><a href="index.php">ย้อนกลับ</a></td>
    </tr>
  </table>
</form>
</body>
</html>