<?php
include("dbconn.inc.php");

//ตรวจสอบว่าผู้ใช้ได้เลือกตัวเลือกอันใดอันหนึ่งหรือไม่
if(isset($_POST['choice'])) {	
	$choice_id = $_POST['choice'];
	$topic_id = $_POST['topic_id'];

	$sql = "UPDATE choice SET score = score + 1
			 	WHERE choice_id = $choice_id;";
	mysql_query($sql);
	
	$sql = "UPDATE topic SET num_votes = num_votes + 1
			 	WHERE topic_id = $topic_id;";
	mysql_query($sql);
	
	//เก็บข้อมูลแบบคุกกี้ไว้เพื่อแสดงว่าผู้ใช้รายนี้เคยโหวตหัวข้อนี้แล้ว
	//โดยจะนำค่า id ของโพลมาเป็นชื่อ(คีย์)ของคุุกกี้ ส่วนค่าของคุกกี้จะเก็บเป็นข้อมูลง่ายๆคือเลข 1
	//และอายุของคุกกี้ให้กำหนดเป็นระยะที่มากกว่าระยะสูงสุดที่ให้สามารถโหวตแต่ละหัวข้อได้
	//ซึ่งจากเพจ admin_add_topic.php ระยะเวลาสูงสุดคือ 30 วัน แต่ในที่นี้จะกำหนดเผื่อเอาไว้ที่ 60 วัน
	setcookie($topic_id, 1, time() + 60*24*60*60);
	
	echo "<html><body>";
	include("header.inc.html");
	
	echo "<font size=+1>
	 		<p align=center>บันทักการโหวตแล้ว <br />
			<a href=\"javascript: self.close();\">ปิด</a>
			</p></font>
			</body></html>";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Poll: Vote</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php  
include("header.inc.html");  

$topic_id = $_GET['tid'];

//ตรวจสอบคุกกี้ว่าผู้ใช้รายนี้เคยโหวตหัวข้อนี้หรือยัง เพื่อป้องกันการโหวตซ้ำ
//ในการนำไปใช้งานจริง ให้เอาคอมเมนต์ออก
/*
if(isset($_COOKIE[$topic_id])) {
	echo "<p align=center>ขออภัยค่ะ คุณเคยโหวตหัวข้อนี้แล้ว ไม่สามารถโหวตซ้ำได้อีก</p>
			</body></html>";
	exit;
}
*/

//อ่านหัวข้อโพลจากตาราง topic โดยโพลนั้นต้องยังไม่ปิดโหวต
$sql = "SELECT * FROM topic 
 			WHERE topic_id = $topic_id AND end_date >= NOW();";
			
$result = mysql_query($sql);

//ถ้าปิดโหวตแล้ว จะไม่มีผลลัพธ์กลับคืนมา ก็ให้สิ้นสุดเพจนั้น
if(mysql_num_rows($result) == 0) {
	echo "<p align=center>ปิดโหวตหัวข้อนี้แล้ว</p>
			</body></html>";
	
	exit;
}
?>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="500" align="center">
<tr>
<td>
<?php
$topic = mysql_result($result, 0, "title");

echo "<b>$topic</b> <p />";

//อ่านตัวเลือกจากตาราง choice มาสร้างเป็นอินพุท radio
$sql = "SELECT * FROM choice WHERE topic_id = $topic_id;";
$result = mysql_query($sql);

while($data = mysql_fetch_array($result)) {
	echo "<input type=radio name=choice 
	 			value={$data['choice_id']} />{$data['item']} <br />";
}

//เก็บค่า id ของหัวข้อโพลไว้ใน hidden เพราะเราต้องเก็บข้อมูลนี้ลงในตารางด้วย
echo "<input type=hidden name=topic_id value=$topic_id />";
?>
 	<br />

    <input type="submit" name="Submit" value="ตกลง" />
	<br /><br />
	<a href="javascript: self.close();">ยกเลิก</a>
	
</td>
</tr>
</table>
</form>
</body>
</html>