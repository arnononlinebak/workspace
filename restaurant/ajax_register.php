<?php

	include("connect.php");
	
	@$username = $_POST['username'];
	@$password = md5($_POST['password']);
	@$email = $_POST['email'];
	@$image = $_POST['image'];
	
	$sql = "INSERT INTO members(username,password,email,image) VALUES(
				'{$username}',
				'{$password}',
				'{$email}',
				'{$image}'
				)";
	$resp = array();
	if(mysql_query($sql)){
		$resp['code'] = 'OK';
	}else{
		$resp['code']= 'ERROR';
	}
	header("Content-Type: application/json");
	echo json_encode($resp);

?>