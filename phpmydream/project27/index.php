<?php
session_start();
$errmsg = "";

if($_POST) {
	include("chatroom.inc.php");
	
	$name = $_POST['name'];
	if(empty($name)) {
		$errmsg = "��سҡ�˹����͡�͹�����ͧʹ���";
	}
	else if(has_rudeword($name)) {	//��Ǩ�ͺ����դ���Һ����㹪����������
		$errmsg = "���͹حҵ�������ͷ������������ ��س����";
	}
	else {	
		my_connect();		//�������͡Ѻ�ҹ������
		
		//SQL ��Ǩ�ͺ����ռ������͹�������͹�����������
		$sql = "SELECT COUNT(*) FROM chatter WHERE name = '$name';";
	 	$result = mysql_query($sql);

		//���͹حҵ�������ͫ�ӡѹ
		if(mysql_result($result, 0, 0) > 0) {
			$errmsg = "����: $name �ռ�������� ��س����������";
		}
		else {
			//��Ҫ�������� ����纪��͹��㹵��ҧ chatter
			//����红�ͤ�������ʴ�����ռ����������ͧʹ�������㹵��ҧ message
			$sql = "INSERT INTO chatter VALUES('$name', NOW(), NOW());";
			mysql_query($sql);

			$sql = "INSERT INTO message VALUES
				 		(0, '### $name', '���������ͧʹ���  ###', 'red', NOW());";
			mysql_query($sql);
			
			//���ҧ Session �ѡ�������������͹�����ྨ chatroom.php
			$_SESSION['name'] = $_POST['name'];
		
			//���¡��价��ྨ chatroom.php ������������ͧʹ���
			header("Location: chatroom.php");
			exit;
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>��ͧʹ���: ��˹�����</title>
<link rel="stylesheet" href="../css/style.css"  />
<style type="text/css">
<!--
.style1 {font-size: 16px}
-->
</style>
</head>
<body>
<?php include("header.inc.html");		?>
<center>
<h3>��˹�����᷹��� ��͹��������ͧʹ���:</h3>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
  

  <br />����
    <input name="name" type="text" id="name" maxlength="30" />
    <input type="submit" name="Submit" value="��ŧ" />
</form>
<font color=red><b><?php echo $errmsg; ?></b></font>
</center>
</body>
</html>