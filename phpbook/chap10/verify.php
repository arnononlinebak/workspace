<?php
	session_start();

	if($_POST['code'] != $_SESSION['code']) {
		echo "��ҹ������Ţ���ç����Ҿ<br>";
		echo "<input type=\"button\" value=\"Back\" onclick=\"window.location='verify_form.php'\">";
	}
	else {
		echo "��ҹ������Ţ�١��ͧ!";
	}
?>