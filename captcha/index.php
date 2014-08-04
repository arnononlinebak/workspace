<?php
session_start();

if(isset($_POST['submit']) && $_POST['captcha'] == $_SESSION['captcha'])
	echo "Captcha OK";
?>

<form action="" method="post" enctype="multipart/form-data">
  <img src="captcha.php" />
  <input type="text" name="captcha" />
  <input type="submit" name="submit" value="Chack" />
</form>
