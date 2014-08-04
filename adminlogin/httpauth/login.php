<?php
/*************************************************************************
php :: Login - Cookies
==========================================================================
Author:      nonmadden
Web Site:    http://www.nonmadden.com
Contact:     root@nonmadden.com
*************************************************************************/

$adminuser = "admin";
$adminpass = "password";


if(($_SERVER['PHP_AUTH_USER'] != $adminuser) || ($_SERVER['PHP_AUTH_PW'] != $adminpass)) {
	header('WWW-Authenticate: Basic realm="Admin Panel"');
	header('HTTP/1.0 401 Unauthorized');
	echo "Wrong credentials!";
	exit;
}

// else we enter the restricted area
?>