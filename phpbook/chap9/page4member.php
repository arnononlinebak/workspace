<html>
<body>
<form runat="server">
<?php
	session_start();
	if(!isset($_SESSION['login'])) {
?>
		<h2><font color="red">��ҹ�ѧ����� Login �������к�</font></h2>
		<input type="button" value="Back" onClick="window.location='login.php'">
<?php
	}
	else {
?>
		<h2>��й���ҹ Login �������к�����</h2>
		<input type="button" value="Logout" onClick="window.location='logout.php'">
<?php
	}
?>
</form>
</body>
</html>
