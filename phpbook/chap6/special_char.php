<?php
	if(isset($_POST['data'])) {
		echo htmlspecialchars($_POST['data']);
	}
?>
<form action="strip_tag.php" method="post">
<textarea name="data" cols="50" rows="3"></textarea>
<input type="submit">
</form>