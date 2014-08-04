<?
$link = mysql_connect("localhost", "root", "1234");
$sql = "use usedb";
$result = mysql_query($sql);
mysql_query("set NAMES tis620");
function Emailcheck($Email)
{
if (ereg ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[^\.\$_\'\"|[:space:]<>].+\..+[^\.\$_\'\"<>]$",$Email))
		return true;
	else
		return false;
}
if(Emailcheck($email))
{
	$encrypt_password = md5($pass);
	$sql = "Insert into user(user, email, password)
	values('$user', '$email', '$encrypt_password');";
	$result = mysql_query($sql);
	if ($result)
		echo al("Successfully")	;
		
	else
		echo al("Error, Please check data again");
}
	else
{		
		echo "Invalid E-mail address";
}
?>

<?php
function al($msg){
	echo "<script type=\"text/javascript\">alert('$msg') </script>";
}
?>
