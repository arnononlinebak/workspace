<?php
function my_connect() {
	@mysql_connect("localhost", "root", "") or die(mysql_error());
	@mysql_select_db("webboard") or die(mysql_error());
}

function has_rudeword($str) {			 	
	$rudes = array("xxx", "yyy", "zzz"); 	
	
	for($i = 0; $i < count($rudes); $i++) {
		if(@eregi($rudes[$i], $str)) {
			return true;
		}
	}
	return false;
}
?>