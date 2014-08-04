<html>
<body>
<?php
	session_start();
	if(isset($_POST['login'])) {
		$_SESSION['login'] = $_POST['login'];
		echo "<script> window.location = 'page4member.php' </script>";
	}
?>
<form method="post" action="login.php">
	Login:<input type="text" name="login">
	<input type="submit"  value="Submit"><br>
	<a href="page4member.php">ทดสอบ Session</a>
</form>
</body>
</html>

