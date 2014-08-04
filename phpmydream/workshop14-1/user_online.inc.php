<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sid = session_id();

//ควรเริ่มต้นด้วยการลบ sid ที่หมดอายุแล้วทิ้งไปก่อน
$sql = "DELETE FROM user_online WHERE  expire < NOW();";
mysql_query($sql);

//ในการบันทึกค่า sid ในที่่นี้เลือกใช้คำสั่ง REPLACE 
//เนื่องจาก หากยังไม่มีค่า sid อยู่ก่อนจะเพิ่มข้อมูลลงไปเหมือนคำสั่ง  INSERT
//แต่หากมี sid อยู่ก่อนแล้ว ก็จะเป็นการแก้ไขข้อมูลเดิมเหมือนคำสั่ง UPDATE
$sql = "REPLACE INTO user_online VALUES
 			('$sid', DATE_ADD(NOW(), INTERVAL 15 MINUTE));";
mysql_query($sql);

//เนื่องจากเราได้ลบ sid ที่หมดอายุออกไปแล้ว 
//จึงสามารถนับได้โดยไม่จำเป็นต้องมีเงื่อนไขการนับ
$sql = "SELECT COUNT(*)  FROM  user_online;";  //WHERE expire > NOW()
$result = mysql_query($sql);
$num_users = 0;
if($result) {
	$num_users = mysql_result($result, 0, 0);
}
echo $num_users;
mysql_close();
?>