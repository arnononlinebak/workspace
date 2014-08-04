<?php
	include("connect.php");

	session_start();
	
	@$owner = $_SESSION['MID'];
	@$subject = $_POST['subject'];
	@$detail = $_POST['detail'];
	
	$sql = "INSERT INTO posts(subject,owner,detail) VALUES(
				'{$subject}',
				'{$owner}',
				'{$detail}')";
	$resp = array();
	if(mysql_query($sql)){
		$resp['code'] = 'OK';	
	}else{
		$resp['code'] = 'ERROR';
		$resp['statusText'] = mysql_error();
	}
	header("Content-Type: application/json");
	echo json_encode($resp);
?>