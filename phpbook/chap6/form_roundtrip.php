<html>
<style>
	input, textarea, select {background-color:#eeeeee}
</style>
<body>
<?php
	$gender = "";
	$name = "";
	$address = "";
	$status = "";
	$asp = "";
	$php = "";
	$jsp = "";
	if(isset($_POST['gender'])) {     // _____(2)
		$gender = $_POST['gender'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$status = $_POST['status'];
		$asp = isset($_POST['asp'])? $_POST['asp'] : "";
		$php = isset($_POST['php'])? $_POST['php'] : "";
		$jsp = isset($_POST['jsp'])? $_POST['jsp'] : "";
		if(($name != "") && ($address != "")) {    //_____(3)
			// ประมวลผลข้อมูล เช่น เก็บลงในฐานข้อมูล
			//
			echo "<font size=+1 color=green>";
			echo "ข้อมูลของท่านได้รับการบันทึกแล้ว";
			echo "</font>";
			echo "</body></html>";     //_____(4)
			exit();                        //  _____(5)
		}
		else {     				//_____(6)
			echo "<font size=+1 color=red>";
			echo "ท่านใส่ข้อมูลชื่อหรือที่อยู่ยังไม่ครบสมบูรณ์";
			echo "</font>";
		}
	}
?>
<form method="post" action="form_roundtrip.php">      <!-- _____(7) -->
สคริปต์ที่เขียนได้:
<input type="checkbox" name="asp" value="asp" 
	<?php 	if($asp == "asp") { 
			echo " checked";
		} 
	?>
>ASP
<input type="checkbox" name="php" value="php" 
	<?php 	if($php == "php") {
			echo " checked";
		}
	?>
>PHP
<input type="checkbox" name="jsp" value="jsp" 
	<?php 	if($jsp == "jsp") {
			echo " checked";
		}
	?>
>JSP
<br>
เพศ:
<input type="radio" name="gender" value="male" 
	<?php 	if($gender == "male") { 
			echo " checked"; 
		} 
	?>
>ชาย
<input type="radio" name="gender" value="female" 
	<?php 	if($gender == "female") { 
			echo " checked"; 
		} 
	?>
>หญิง<br>
ชื่อ-สกุล:<br>
<input type="text" name="name" size="50" value="<?php echo $name; ?>"><br>
ที่อยู่:<br>
<textarea name="address" cols="40" rows="2"><?php echo $address; ?></textarea><br>
สถานภาพ:
<select name="status">
	<option value="single" 
		<?php 	if($status == "single") { 
				echo " selected"; 
			} 
		?>
	>โสด</option>
	<option value="married" 
		<?php 	if($status == "married") { 
				echo " selected"; 
		 	} 
		?>
	>แต่ง</option>
	<option value="divorced" 
		<?php 	if($status == "divorced") { 
				echo " selected"; 
			} 
		?>>หย่า/แยก</option>
</select>
<p align="center">
<input type="submit">
</form>
</body>
</html>

