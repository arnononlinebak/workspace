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
			// �����żŢ����� �� ��ŧ㹰ҹ������
			//
			echo "<font size=+1 color=green>";
			echo "�����Ţͧ��ҹ���Ѻ��úѹ�֡����";
			echo "</font>";
			echo "</body></html>";     //_____(4)
			exit();                        //  _____(5)
		}
		else {     				//_____(6)
			echo "<font size=+1 color=red>";
			echo "��ҹ�������Ū������ͷ�������ѧ���ú����ó�";
			echo "</font>";
		}
	}
?>
<form method="post" action="form_roundtrip.php">      <!-- _____(7) -->
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
		?>>����/�¡</option>
</select>
<p align="center">
<input type="submit">
</form>
</body>
</html>

