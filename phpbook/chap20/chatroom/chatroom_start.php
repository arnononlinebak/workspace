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
			$sql .= "('$name', 'red', 'เข้าร่วมห้องสนทนา');";
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
		echo "<font size=+1 color=red><b>ชื่อ: \"$name\" มีผู้ใช้แล้ว กรุณาเลือกชื่อใหม่</b></font>";
	}
?>
<h4>กรุณาใส่ชื่อ Nickname สำหรับตัวท่านแล้วเลือกสีที่ท่านชอบ</h4>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div style="width:450px; background-color:lavender; 
	border:solid 1px red; padding-left:100px; 
	padding-top:20px; padding-bottom:20px; text-align:left"
 >
	ใส่ชื่อที่นี่&nbsp;<input type="text" name="nickname" size="30" maxlength="40">
	<p>
	เลือกสีที่นี่&nbsp;<select name="color">
			<option value="black">ดำ</option>
			<option value="green">เขียว</option>
			<option value="blue">น้ำเงิน</option>
			<option value="brown">น้ำตาล</option>
			<option value="violet">ม่วง</option>
		</select>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="   ร่วมวง   ">
</div>
</form>
</body>
</html>