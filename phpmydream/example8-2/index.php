<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 8-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$str1 = "Regular Expression ���� RegEx ���Ըա�õ�Ǩ�ͺ�����ŷ�������������� Perl 
 			��Ѩ�غѹ���Ҥ����������������� �� PHP, .NET, JavaScript ������ٻẺ�ͧ RegEx ������";

//���Ҥ���� "regex" ���� "regular expression"
$find_pattern = "(regex)|(regular expression)";

/* \\0 ����ҧ�֧ʵ�ԧ���ç�Ѻ���ᾷ���� ���͵ç�Ѻ�ء Sub Pattern ����ѹ����ͧ   */
$replace_pattern = "<b>\\0</b>";
$str2 = eregi_replace($find_pattern, $replace_pattern, $str1);
			
echo "<b>ʵ�ԧ��͹���᷹���:</b><br /> $str1
 		<p />
 		<b>ʵ�ԧ��ѧ���᷹���:</b><br /> $str2";
?>
</body>
</html>