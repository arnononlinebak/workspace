<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 6-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
require("header.inc.html");

$ip = $_SERVER['REMOTE_ADDR'];
if($ip == "127.0.0.1") {
	include "error.inc.php";
	show_error("Error: Your IP: $ip is banned!"); 	//¿Ñ§¡ìªÑ¹¹ÕéÍÂÙèã¹ä¿Åì error.inc.php
} 
else {
	echo "<p align=center>Welcome to DeveloperThai.com</p>";
}

require "footer.inc.html";
?>
</body>
</html>
