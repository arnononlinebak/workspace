<?php
	include("connect.php");
	
	session_start();
	
	@$username = $_POST['username'];
	@$password = md5($_POST['password']);
	
	$sql = "SELECT * 
				FROM members
				WHERE
					username='{$username}'
				AND
					password='{$password}'
				LIMIT 1";
	$q = mysql_query($sql);
	$resp = array();
	if(mysql_num_rows($q)){
		$rs = mysql_fetch_array($q);
		$_SESSION['MID'] = $rs['ID'];
		$resp['code'] = 'OK';
	}else{
		$resp['code']= 'ERROR';
		$resp['statusText']='Invalid login information';
	}
	header("Content-Type: application/json");
	echo json_encode($resp);


?>