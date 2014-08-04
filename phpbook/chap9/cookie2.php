<html>
<body>
<form action="cookie2.php" method="post">
<center>
setcookie(
<input type="text" name="ck_name" size="10">, 
<input type="text" name="ck_value" size="20">, 
<input type="text" name="ck_expire" size="10">); //name, value, expire(sec)
<p>
<input type="submit" name="button" value="SET COOKIE">
<input type="submit" name="button" value="GET COOKIE">
</center>
</form>
<br>

<?php
if(isset($_POST['button'])) {
 	if($_POST['button'] == "SET COOKIE") {
		if(empty($_POST['ck_name'])) {
			echo "You must enter cookie name to set";
			exit();
		}
		$ck_ok = setcookie($_POST['ck_name'], $_POST['ck_value'], 
			time() + $_POST['ck_expire']);
		if($ck_ok) {
			echo "Set Cookie OK!";
		}
		else {
			echo "Can't set cookie";
		}
	}
	else if($_POST['button'] == "GET COOKIE") {
		if(empty($_POST['ck_name'])) {
			echo "You must enter cookie name to read";
			exit();
		}
		else {
			echo "\$_COOKIE['" . $_POST['ck_name'] . "'] = " . 
				$_COOKIE[$_POST['ck_name']];
		}
	}
}
?>

</body>
</html>
