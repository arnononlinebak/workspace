<?php
	$gender = "female";
	$name = "�ҹ�  �չ�";
	$address = "�Ѫ�����ɡ ���¢�ҧ ��ا෾";
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
ʤ�Ի������¹��:
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
��:
<input type="radio" name="gender" value="male" 
	<?php 	if($gender == "male") { 
			echo " checked"; 
		} 
	?>
>���
<input type="radio" name="gender" value="female" 
	<?php 	if($gender == "female") { 
			echo " checked"; 
		} 
	?>
>˭ԧ<br>
����-ʡ��:<br>
<input type="text" name="name" size="50" value="<?php echo $name; ?>"><br>
�������:<br>
<textarea name="address" cols="40" rows="2"><?php echo $address; ?></textarea><br>
ʶҹ�Ҿ:
<select name="status">
	<option value="single" 
		<?php 	if($status == "single") { 
				echo " selected"; 
			} 
		?>
	>�ʴ</option>
	<option value="married" 
		<?php 	if($status == "married") { 
				echo " selected"; 
		 	} 
		?>
	>��</option>
	<option value="divorced" 
		<?php 	if($status == "divorced") { 
				echo " selected"; 
			} 
		?>
 	>����/�¡</option>
</select>
<p align="center">
<input type="submit" value="Submit">
</form>
</body>
</html>

