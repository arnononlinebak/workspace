<?php
	$gender = "female";
	$name = "มานี  มีนา";
	$address = "รัชดาภิเษก ห้วยขวาง กรุงเทพ";
	$status = "married";
	$asp = "asp";
	$php = "php";
	$jsp = "";
?>
<html>
<style>
	input, textarea, select {background-color:#eeeeee}
</style>
<body>
<form method="post" action="">
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
		?>
 	>หย่า/แยก</option>
</select>
<p align="center">
<input type="submit" value="Submit">
</form>
</body>
</html>

