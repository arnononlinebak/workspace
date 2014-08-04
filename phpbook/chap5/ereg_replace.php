<html>
<body>
<?php
	$text = "This is a link to http://www.thaicyberjob.com";
	$pattern = "http://([[:alnum:]./-]+)";
	$rep_str = "<a href=\"\\0\">\\0</a>";

	$str = ereg_replace($pattern, $rep_str, $text);

	echo "Old String: $text<br>";
	echo "New String: $str";
?>
</body>
</html>
