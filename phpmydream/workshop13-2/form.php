<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 13-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function back() {
 	mysql_close();
	echo "<p /><a href=\"index.php\">��͹��Ѻ</a></body></html>";
	exit;
}

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
@mysql_select_db("phpmysql") or die(mysql_error());

//����繡�� Postback ���͢����Ũҡ�������Ѻ�����
if(isset($_POST['id'])) {

 	//ź��Ңͧ���� Submit �͡仨ҡ����� $_POST ������������੾����ǹ��������ǹ�
	unset($_POST['Submit']);
	
	//�Ӣ����Ũҡ����� $_POST �������������§�����ʵ�ԧ���ǡѹ �¤�蹴��� ', '
	$values = implode("', '", $_POST);  //�ѡɳм��Ѿ�� �� a', 'b', 'c', 'd
	
	//�Դ��Ƿ��´��� ' �������ú��� �ѡɳм��Ѿ����� 'a', 'b', 'c', 'd'
	$values = "'" . $values . "'";
	
	//�Ӣ����Ź�������ҧ�� SQL �Ẻ����� REPALCE
	$sql = "REPLACE INTO people VALUES($values);";
	
	$result = mysql_query($sql);
	if(!$result) {
		echo mysql_error();
	}
	else {
		echo "�����Ŷ١�ѹ�֡����";
		back();
	}
}

// ------------------------------------------------------------------
//��ǹ���仹������Ѻ���������§�Ҩҡྨ�ʴ�������(index.php)

//���ҧ����÷��й�����ŧ��Թ�ط �¡�˹��繤������������͹
$id = ""; $name=""; $address=""; $email=""; $birthday="";

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	//��������������� ������ͧ������ ����������������ҧ��������Ѻ�Ѻ����������
	if($action == "insert") {
		echo ">> ����������";
	}
	else {
		$id = $_GET['id'];
		
		//����繡��ź ��Ӥ�� id 仡�˹������͹䢡��ź
		if($action == "delete") {
			$delete = mysql_query("DELETE FROM people WHERE id = $id;");
			if(!$delete) {
				echo mysql_error();
			}
			else {
				echo "�����Ŷ١ź����";
			}
 			back();
		}
		else if($action == "update") {		//����繡����䢢����� ��ͧ��ҹ���������㹵��ҧ���͹������ŧ㹿����
			echo ">> ��䢢�����";
			$result = mysql_query("SELECT * FROM people WHERE id = $id;");
			list($id, $name, $address, $email, $birthday) = mysql_fetch_row($result);
		}
	}
}
mysql_close();
?>
<p />
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="289" border="0" cellspacing="3" cellpadding="0">
    <tr>
	
      <td width="54">id</td>
      <td width="226"><?php echo $id; ?>
		<input name="id" type="hidden" size="10" value="<?php echo $id; ?>" />
		</td>
    </tr><tr>
      <td>name</td>
       <td><input name="name" type="text" size="30" value="<?php echo $name; ?>" /></td>
	
    </tr><tr>
      <td>address</td>
      <td><textarea name="address" cols="30" rows="2"><?php echo $address; ?></textarea></td>
    </tr>
    <tr>
      <td>email</td>
      <td><input name="email" type="text"  size="30" value="<?php echo $email; ?>" /></td>
    </tr>
    <tr>
      <td>birthday</td>
      <td><input name="birthday" type="text" size="15" value="<?php echo $birthday; ?>" /> 
        (�� 1990-10-31)</td>
		
    </tr><tr>
      <td>&nbsp;</td>
      <td>
      <input type="submit" name="Submit" value="Submit" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href="index.php"><br />
      </a></td>
    </tr><tr>
      <td>&nbsp;</td>
      <td><a href="index.php">��͹��Ѻ</a></td>
    </tr>
  </table>
</form>
</body>
</html>