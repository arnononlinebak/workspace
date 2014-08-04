<?php
	include("connect.php");

	session_start();
	
	@$postID = $_POST['postid'];
	@$owner = $_SESSION['MID'];
	@$detail = $_POST['detail'];
	
	$sql = "INSERT INTO comments(post_ID,owner,detail) VALUES(
				'{$postID}',
				'{$owner}',
				'{$detail}'
				)";
				
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