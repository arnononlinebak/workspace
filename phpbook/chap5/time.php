<html>
<body>
<?php
	if(checkdate(12, 31, 2007)) {
		echo "��";
	}
	else {
		echo "�����";
	}
	echo "�ѹ��� 31 �ѹ�Ҥ� 2007";

	echo "<br>";

	if(checkdate(2, 29, 2007)) {
		echo "��";
	}
	else {
		echo "�����";
	}
	echo "�ѹ��� 29 ����Ҿѹ�� 2007";
?>
</body>
</html>
