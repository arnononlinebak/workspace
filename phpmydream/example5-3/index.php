<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 5-3</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<b>����� nl2br()</b>
<?php
$str = "��÷Ѵ��� 1
		   ��÷Ѵ��� 2
		   ��÷Ѵ��� 3";
		
echo "<p />��¹ʵ�ԧŧ��µç => $str";
	
$s = nl2br($str);
echo "<p />��¹ʵ�ԧ��ѧ�ҡ�� nl2br() => $s";

echo "<hr />
 		<b>�����ѧ��ѹ����ǡѺ HTML</b><p />";

$str = "<font size=4>�� \"<b>\" ������¹��ͤ�������繵��˹�
	 		����� '<br />' ������Ѻ��鹺�÷Ѵ����</b></font>";
		
echo "<p /><u>��¹ʵ�ԧŧ仵ç�:</u><br />" . $str;

$sp_char = htmlspecialchars($str, ENT_QUOTES);
echo "<p /><u>��ѧ��ѹ htmlspecialchars(): </u><br />" . $sp_char;

$strip = strip_tags($str);
echo "<p /><u>��ѧ��ѹ strip_tags(): </u><br />" . $strip;
?>
</body>
</html>
