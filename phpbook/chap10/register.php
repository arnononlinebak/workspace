<?php
	session_start();

	if($_POST['code'] != $_SESSION['code']) {
		echo "ท่านใส่ Verify Text ไม่ถูกต้อง<br>";
		echo "<input type=\"button\" value=\"Back\" onclick=\"window.location='form_register.php'\">";
	}
	else {
		echo "Register Sucessful!";
	}
?>