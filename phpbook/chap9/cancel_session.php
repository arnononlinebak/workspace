<?php
	session_start();
	
	$_SESSION['a'] = "A";
	$_SESSION['b'] = "B";
	echo count($_SESSION);

	session_unset();
	echo count($_SESSION);
?>