<?php
$bgcolor = "white";		//��Ҵտ�ŵ�
$textcolor = "black";		//��Ҵտ�ŵ�
if(isset($_COOKIE['bgcolor']) && isset($_COOKIE['textcolor'])) {
	$bgcolor = $_COOKIE['bgcolor'];
	$textcolor = $_COOKIE['textcolor'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 9-2: Index</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body bgcolor="<?php echo $bgcolor; ?>" text="<?php echo $textcolor; ?>" alink="blue" vlink="blue">
<h2>���ͺ��õ�駤����纴��� Cookie</h2>
<p />
�ҡ��ҹ��ͧ��õ�駤���վ����ѧ�����ѵ���ѡ�� <a href="page_setting.php">��ԡ�����</a>
</body>
</html>