<?php
session_start();
$sid = session_id();

include("dbconn.inc.php");

$sql = "SELECT * FROM cart WHERE sess_id = '$sid';";
$result = mysql_query($sql);

header("content-type: text/html; charset=utf-8");

$r = "<p align=center>
 		<img src=img/cart.gif />
		<br />";
		
if(mysql_num_rows($result) == 0) {
	echo "$r<b>No Have Data</b></p>";
	exit;
}

$r .= "<b>T</b></p>";
$r .= "<ul>";
while($cart = mysql_fetch_array($result)) {
	$r .= "<li> {$cart['pro_name']} </li>";
}
$r .= "</ul>";
$r .= "<p align=center><a href=check_cart.php>O</a></p>";

echo $r;
?>