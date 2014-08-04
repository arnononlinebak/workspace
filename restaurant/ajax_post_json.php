<?php
	include('connect.php');
	
	$resp = array();
	
	$sql = "SELECT * FROM posts";
	
	$q = mysql_query($sql);
	$resp['posts'] = array();
	
	while($rs = mysql_fetch_array($q)){
		$resp['posts'][]=$rs;
	}
	header("Content-Type: application/json");
	echo json_encode($resp);
?>