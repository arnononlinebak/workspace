<html>
<body>
<?php
	$str = "mouth2MOUTH";
	$result = count_chars($str, 1);

	while(list($chr, $num) = each($result)) {
		echo chr($chr) . " found: $num time(s)<br>";
	}
?>
</body>
</html>

