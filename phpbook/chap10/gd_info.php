<html>
<body>
<?php
	$g = gd_info();
	while(list($key, $value) = each($g)) {
		echo "$key => $value <br>";
	}
?>
</body>
</html>

