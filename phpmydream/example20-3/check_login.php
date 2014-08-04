<?php
$login = $_POST['login'];

$pattern = "^[a-zA-Z0-9]{3,10}$";		
$users = array("abc", "123", "xyz");  //สมมติชื่อผู้ใช้ที่มีอยู่แล้ว

//ตรวจสอบ Login แล้วเรียกฟังก์ชันจาวาสคริปต์ displayResult() ที่เพจ index.php ขึ้นมาทำงาน
if(!eregi($pattern, $login) || in_array($login, $users)) {
	$js = "displayResult(false);";
}
else {
	$js =   "displayResult(true);";
}

header("Content-Type: text/javascript; charset=tis-620");
echo $js;
?>