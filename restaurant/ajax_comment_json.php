<?php

	include("connect.php");
	
	$resp = array();
	
	$sql = "SELECT * FROM comments WHERE post_ID='{$_GET['id']}'";
 	
	$q = mysql_query($sql);
	
	$resp['comments']=array();
	
	while($rs = mysql_fetch_array($q)){
		$resp['comments'][]=$rs;	
	}
	
	header("Content-Type: application/json");
	echo json_encode($resp);
?>