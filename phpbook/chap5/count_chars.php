<html>
<body>
<?php
	$str = "Tit4Tat";
	$result = count_chars($str, 1);
	echo $str . "<br>";
	while(list($chr, $num) = each($result)) {
		echo chr($chr) . " พบ: $num ครั้ง<br>";
	}
?>
</body>
</html>

