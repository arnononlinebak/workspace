<?php
//กำหนดหมวดหมู่ของบล็อกแบบง่ายๆในแบบอาร์เรย์ key/value 
$BLOG_CATS = array("it"=>"ไอที", "ent"=>"บันเทิง", "biz"=>"ธุรกิจ", 
 							"spt"=>"กีฬา", "hlt"=>"สุขภาพ", "mis"=>"เบ็ดเตล็ด");

function my_connect() {
	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
	@mysql_select_db("blog") or die(mysql_error());
}

function has_rudeword($str) {			 	
	$rudes = array("xxx", "yyy", "zzz"); 		//ใส่คำหยาบที่นี่
	
	for($i = 0; $i < count($rudes); $i++) {
		if(eregi($rudes[$i], $str)) {
			return true;
		}
	}
	return false;
}
/*
function check_session() {
	session_start();
 	if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
	 	header("Location: user_login.php");
	 	exit;
 	}
}
*/
?>