<html>
<body>
<?php
	$str = "Tit4Tat";
	$result = count_chars($str, 1);
	echo $str . "<br>";
	while(list($chr, $num) = each($result)) {
		echo chr($chr) . " ��: $num ����<br>";
	}
?>
</body>
</html>

