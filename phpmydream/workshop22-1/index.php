<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 22-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$str = $_SERVER['HTTP_USER_AGENT'];

//��Ǩ�ͺ����������� ���ҡ����㴵��仹�� ��ҡ������ʵ�ԧ�����ҹ��
//���ʴ���Ҽ���餹��� ���ѧ����������ǹ������
if(eregi("MSIE", $str)) {
	$browser = "IE";
}
elseif(eregi("Firefox", $str)) {
	$browser = "Firefox";
}
else if(eregi("Chrome", $str)) {
	$browser = "Chrome";
}
else if(eregi("Safari", $str) && !eregi("Chrome", $str)) {
	$browser = "Safari";
}
else if(eregi("Opera", $str)) {
	$browser = "Opera";
}
else {
	$browser = "Others";
}

echo "<h2>����������ҹ����: $browser</h2>
		<p />
		<a href=\"show_stats.php\">��ʶԵԡ�����������</a>";

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

//�ѻവ�ӹǹ���駷���ռ����������쪹Դ��� �ºǡ�ҡ��������ա 1
$sql = "UPDATE stats SET num_request = num_request + 1
			WHERE browser = '$browser';";

mysql_query($sql);
?>
</body>
</html>
