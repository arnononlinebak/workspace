<?php
session_start();
if(!isset($_SESSION['user_id'])) {
	header("Location: user_login.php");
}
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Auction: New Item</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.php");

if($_POST) {
	if(get_magic_quotes_gpc()) {
		$_POST['item_name'] = stripslashes($_POST['item_name']);
		$_POST['description'] = stripslashes($_POST['description']);
	}
	$item_name = htmlspecialchars($_POST['item_name'], ENT_QUOTES);
	$description = nl2br(htmlspecialchars($_POST['description'], ENT_QUOTES));
	$price = $_POST['starting_price'];
	
	//ที่ฟอร์มเราเรียงลำดับอินพุทแบบอาร์เรย์ เป็น วัน-เดือน-ปี
	//แต่การจัดเก็บข้อมูลของ MySQL ต้องเป็นรูปแบบ ปี-เดือน-วัน
	//ดังนั้นเราจึงนำอาร์เรย์ของอินพุทมาเรียงลำดับแบบย้อนกลับ
	$_POST['date'] = array_reverse($_POST['date']); 
	$end_date = implode("-", $_POST['date']);	//รวมกันให้เป็น ปี-เดือน-วัน
	
	$end_time = strtotime($end_date);
	$cur_time = strtotime("now");
	
	$errmsg = "";
	
	if(empty($item_name) || empty($description) || empty($price)) {
		$errmsg = "ท่านใส่ข้อมูลไม่ครบ";
	}
	else if(!checkdate($_POST['date'][1], $_POST['date'][2], $_POST['date'][0])) {
		$errmsg = "วันเดือนปีที่กำหนด ไม่ถูกต้อง";
	}
	else if($end_time < $cur_time) {
		$errmsg =  "วันสิ้นสุดต้องอยู่ถัดจากวันปัจจุบัน";
	}
	else if(!is_numeric($price)) {
		$errmsg = "ราคาเริ่มต้นไม่ถูกต้อง";
	}
	else if($_FILES['file']['error'] != 0) {
		$errmsg = "เกิดข้อผิดพลาดในการอัปโหลดภาพ";
	}
	else if($_FILES['file']['error'] == 0) {
		$type = strtolower($_FILES['file']['type']);
		$pattern = "(jpe?g)|(png)|(gif)";
		if(!eregi($pattern, $type)) {		
 			$errmsg = "ต้องเป็นภาพชนิด .jpg หรือ .png หรือ .gif เท่านั้น";
 		}
		else if($_FILES['file']['size'] > 100000) {
			$errmsg = "ขนาดของภาพต้องไม่เกิน 100 KB";
		}
	}
		
	if($errmsg != "") {
		echo "ข้อผิดพลาด: $errmsg
		 		<p /><a href=javascript: history.back()>ย้อนกลับไปแก้ไข</a>
				</body></html>";
		exit;	
	}
	
	include("dbconn.inc.php");
	$sql = "INSERT INTO item VALUES
				(0, $user_id, '$item_name', '$description', $price, '$end_date', 0);";
				
	@mysql_query($sql) or die(mysql_error());
	
	$item_id = mysql_insert_id();		//อ่านค่า id ของรายการล่าสุดที่เพิ่มเข้าไป
	
	$type = $_FILES['file']['type'];
	$upfile = $_FILES['file']['tmp_name'];
	$file = fopen($upfile, "r");
	$content = fread($file, filesize($upfile));
	$content = addslashes($content);
	fclose($file);
		
 	$sql = "INSERT INTO img VALUES
 				(0, $item_id, '$type', '$content');";
	@mysql_query($sql) or die(mysql_error());
	
	echo "<p align=center>บันทึกข้อมูลแล้ว</p>";
}
?>
<p /><h3 align="center">เพิ่มรายการเปิดประมูล</h3></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellspacing="3" cellpadding="1" align="center">
    <tr>
      <td>ชื่อสินค้า</td>
      <td><label>
        <input name="item_name" type="text" id="item_name" />
      </label></td>
    </tr>
    <tr>
      <td>รายละเอียดสินค้า</td>
      <td><label>
        <textarea name="description" cols="30" rows="3" id="description"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>วันที่ปิดประมูล</td>
      <td>
        <select name="date[]" id="date[]">
		<?php 
		for($d = 1; $d <= 31; $d++) {
			echo "<option value=$d>$d</option>";
		}
		?>
        </select>
        <select name="date[]" id="date[]">
		<?php
		for($i = 1; $i <= 12; $i++) {
			echo "<option value=$i>$i</option>";
		}
		?>
        </select>
        <select name="date[]" id="date[]">
		<?php
		$cur_year = date('Y');
		$year1 = $cur_year;
		$year2 = $cur_year + 1;

		for($y = $year1; $y <= $year2; $y++) {
			echo "<option value=$y>" . ($y + 543) . "</option>";
		}
		?>
        </select> (ว/ด/ป)
      </td>
    </tr>
    <tr>
      <td>ราคาเริ่มต้น</td>
      <td><label>
        <input name="starting_price" type="text" id="starting_price" size="10" />
      </label></td>
    </tr>
    <tr>
      <td>รูปภาพ</td>
      <td><label>
      <input type="file" name="file" />
        
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="ส่งข้อมูล" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>