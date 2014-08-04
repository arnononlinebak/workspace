<?php
function my_connect() {
	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
	@mysql_select_db("chatroom") or die(mysql_error());
}

function has_rudeword($str) {			 	
	$rudes = array("xxx", "yyy", "zzz"); 		//ใส่คำหยาบที่นี่
	
	for($i=0; $i<count($rudes); $i++) {
		if(eregi($rudes[$i], $str)) {
			return true;
		}
	}
	
	return false;
}
?>