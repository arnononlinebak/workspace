<?php
	if(isset($_POST['data'])) {
		echo strip_tags($_POST['data']);
		exit();
	}
?>
<form action="special_char.php" method="post">
<textarea name="data" cols="50" rows="3"></textarea>
<input type="submit">
</form>