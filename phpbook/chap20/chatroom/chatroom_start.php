<?php
	session_start();

	$name_exists = false;
	$name = "";

	if(isset($_POST['nickname'])) {
		$conn = mysql_connect("localhost", "root", "123");
		mysql_query("USE chatroom;");

		$name = addslashes($_POST['nickname']);
		$sql = "SELECT COUNT(*) FROM participants WHERE name = '$name';";
		$result = mysql_query($sql);
		if(mysql_result($result, 0, 0)>0) {
			$name_exists = true;
			mysql_close($conn);
		}
		else {
			$sid = session_id();
			$sql = "INSERT INTO participants VALUES";
			$sql .= "('$name', '$sid');";
			mysql_query($sql);
			$sql = "INSERT INTO messages VALUES";
			$sql .= "('$name', 'red', '���������ͧʹ���');";
			$_SESSION['nickname'] = $_POST['nickname'];
			$_SESSION['color'] = $_POST['color'];
			mysql_query($sql);
			mysql_close($conn);
			echo "<script> window.location = 'chatroom.php'; </script>";
			exit();
		}
	}
?>
<html>
<head>
<title>ChatRoom</title>
</head>
<body>
<center>
<h1>Live Chat For Life</h1>
<?php
	if($name_exists) {
		echo "<font size=+1 color=red><b>����: \"$name\" �ռ�������� ��س����͡��������</b></font>";
	}
?>
<h4>��س������� Nickname ����Ѻ��Ƿ�ҹ�������͡�շ���ҹ�ͺ</h4>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div style="width:450px; background-color:lavender; 
	border:solid 1px red; padding-left:100px; 
	padding-top:20px; padding-bottom:20px; text-align:left"
 >
	�����ͷ����&nbsp;<input type="text" name="nickname" size="30" maxlength="40">
	<p>
	���͡�շ����&nbsp;<select name="color">
			<option value="black">��</option>
			<option value="green">����</option>
			<option value="blue">����Թ</option>
			<option value="brown">��ӵ��</option>
			<option value="violet">��ǧ</option>
		</select>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="   ����ǧ   ">
</div>
</form>
</body>
</html>