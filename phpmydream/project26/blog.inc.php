<?php
//��˹���Ǵ����ͧ���͡Ẻ������Ẻ�������� key/value 
$BLOG_CATS = array("it"=>"�ͷ�", "ent"=>"�ѹ�ԧ", "biz"=>"��áԨ", 
 							"spt"=>"����", "hlt"=>"�آ�Ҿ", "mis"=>"�����");

function my_connect() {
	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
	@mysql_select_db("blog") or die(mysql_error());
}

function has_rudeword($str) {			 	
	$rudes = array("xxx", "yyy", "zzz"); 		//������Һ�����
	
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