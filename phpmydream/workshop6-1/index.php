<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 6-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$content = file_get_contents("counter.txt");		//��ҹ�ӹǹ���������������

$count = intval($content) + 1;		//������Ҩҡ�����ա 1

//����Ѻ�ٻẺ����ʴ���ǹѺ 㹷������ʴ����Ţ 7 ��ѡ
//���ҡ�Ţ�����ú 7 ��ѡ�������Ţ 0 仢�ҧ˹�����ú 7 
$visitor = str_pad($count, 7, "0", PAD_LEFT);

echo "<p align=center>��ҹ��ͼ�����������ӴѺ���: $visitor </p>";

//��鹵͹�����繡���ѻവ��ǹѺ���������������
//���Դ������ǹӨӹǹ������¹�Ѻ�ӹǹ���
$f = fopen("counter.txt", "w"); 

fwrite($f, $count);
fclose($f);
?>
</body>
</html>
