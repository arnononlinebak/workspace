<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 5-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$birth = "10/12/1980";
$d = explode("/", $birth);
echo "$birth => ��ҹ�Դ�ѹ��� $d[0] ��͹ $d[1] �� $d[2] <p />";

$arr = array('One', 'Two', 'Three');
$str = implode("', '", $arr); 	//��蹴��� , ���Ѿ���� One', 'Two', 'Three
	
$str = "'" . $str  . "'"; //�Դ��Ƿ������ú
echo "��Ҫԡ���������: " . $str;
?>
</body>
</html>
