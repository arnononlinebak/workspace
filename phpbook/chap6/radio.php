<html>
<body>
<?php
	if(isset($_GET['script'])) {
		$script = $_GET['script'];
		echo "��ҹ���ѧ�֡�ҡ����¹ʤ�Ի��: $script";
	}
	if(!empty($_GET['os'])) {
		$os = $_GET['os'];
		echo "<p>��ҹ���ѧ���к���Ժѵԡ��:  $os";
	}
?>
</body>
</html>
