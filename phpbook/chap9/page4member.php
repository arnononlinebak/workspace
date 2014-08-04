<html>
<body>
<form runat="server">
<?php
	session_start();
	if(!isset($_SESSION['login'])) {
?>
		<h2><font color="red">ท่านยังไม่ได้ Login เข้าสู่ระบบ</font></h2>
		<input type="button" value="Back" onClick="window.location='login.php'">
<?php
	}
	else {
?>
		<h2>ขณะนี้ท่าน Login เข้าสู่ระบบแล้ว</h2>
		<input type="button" value="Logout" onClick="window.location='logout.php'">
<?php
	}
?>
</form>
</body>
</html>
