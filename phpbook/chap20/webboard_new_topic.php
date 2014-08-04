<?php

	if(isset($_POST['topic'])) {

		if($_FILES['img']['error']==0) {
			$temp_file = $_FILES['img']['tmp_name'];
			$file = fopen($temp_file, "r");
			$img_ = fread($file, filesize($temp_file));
			$img = addslashes($img_);
			fclose($file);

			$type = $_FILES['img']['type'];
		}
		else {
			$img = "";
			$type = "";
		}

		$group = $_POST['group'];
		$topic = addslashes($_POST['topic']);
		$detail = addslashes($_POST['detail']);
		$name = addslashes($_POST['name']);

		$conn = mysql_connect("localhost", "root", "123");
		mysql_query("USE php_mysql;");

		$sql = "INSERT INTO topic VALUES(";
		$sql .= "'', '$group', NOW(), '$topic', '$detail', ";
		$sql .= "'$name', 0, '$img', '$type'";
		$sql .= ");";

		mysql_query($sql);

		mysql_close($conn);

		echo "กระทู้ของท่านถูกจัดเก็บแล้ว";
		exit();

	}

?>

<html>
<style> input, select, textarea {background-color:#eeeeee} </style>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" 
 	enctype="multipart/form-data">
	กลุ่ม:<br>
	<select name="group">		
		<option value="it">ไอที</option>
		<option value="pol">การเมือง</option>
		<option value="ent">บันเทิง</option>
		<option value="biz">ธุรกิจ</option>
		<option value="spt">กีฬา</option>
	</select><p>
	หัวข้อ:<br>
	<input type="text" name="topic" size="40" maxlength="150"><p>
	รายละเอียด:<br>
	<textarea name="detail" cols="50" rows="3"></textarea><p>
	ชื่อ:<br>
	<input type="text" name="name" size="30" maxlength="50"><p>
	ไฟล์:<br>
	<input type="file" name="img" size="40"><br>
	*ภาพประกอบจะมีหรือไม่ก็ได้
	<p>
	<input type="submit" value="Submit">
</form>
</body>
</html>