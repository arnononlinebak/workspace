<?php
	session_start();

	if($_POST['code'] != $_SESSION['code']) {
		echo "��ҹ��� Verify Text ���١��ͧ<br>";
		echo "<input type=\"button\" value=\"Back\" onclick=\"window.location='form_register.php'\">";
	}
	else {
		echo "Register Sucessful!";
	}
?>