<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 6-3</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$f = fopen("test.txt", "w");  //�Դ������ҹ��¹���ҧ���� �����������������ҧ�������

//���ҧ�Ţ����������¹ŧ������Шӹǹ
for($i = 1; $i <= 10; $i++) {
	$data = rand() . "\n";
	fwrite($f, $data);
}
fclose($f);

echo "�����ŷ����������: <br />";

$content = file("test.txt");		
foreach($content as $c) {
	echo $c . "<br />";
}
?>
</body>
</html>
