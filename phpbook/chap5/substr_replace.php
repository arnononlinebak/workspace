<html>
<body>
<?php
 	$str = "�Թ���ҧ��� �������ҧ���";
	$a = array('���'=>"�ء�", '���'=>"�عѢ");
	$s = strtr($str, $a);
	echo $s; // echo ���ʴ�, �������
?>

</body>
</html>
