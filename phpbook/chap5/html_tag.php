<html>
<body>
<?php
	$str = "<font size=3>�� \"<b>\" ������¹��ͤ�������繵��˹�
		����� '<br>' ������Ѻ��鹺�÷Ѵ����</b></font>";
	echo "<u>��¹ʵ�ԧŧ仵ç�</u><br>$str<p>";

	$sp_char = htmlspecialchars($str, ENT_QUOTES);
	echo "<u>��ѧ��ѹ htmlspecialchars()</u><br>$sp_char<p>";

	$strip = strip_tags($str);
	echo "<u>��ѧ��ѹ strip_tags()</u><br>$strip";
?>
</body>
</html>
