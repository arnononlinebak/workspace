<?php
	session_start();

	if($_POST['code'] != $_SESSION['code']) {
		echo "ท่านใส่ตัวเลขไม่ตรงตามภาพ<br>";
		echo "<input type=\"button\" value=\"Back\" onclick=\"window.location='verify_form.php'\">";
	}
	else {
		echo "ท่านใส่ตัวเลขถูกต้อง!";
	}
?>