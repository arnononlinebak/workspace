<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 18-1: Membership</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<h2>�������Ҫԡ</h2>
<?php
if($_POST) {
	$name = stripslashes($_POST['name']);
	$email = $_POST['email'];
	
	$errmsg = "";
	
	if(empty($name)) {
		$errmsg .= "�ѧ������˹����� <br />";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errmsg .= "��������١��ͧ����ٻẺ <br />";
	}

	if($errmsg != "") {
		echo $errmsg;
		echo "<a href=\"javascript: hostory.back();\">��͹��Ѻ����</a>
				</body></html>";
		exit;
	}
	
	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
 	mysql_select_db("phpmysql");
	
	//SQL ����Ѻ��Ǩ�ͺ���������Ź�������͹�������
	$sql = "SELECT COUNT(*) FROM mailinglist
	 			WHERE email = '$email';";
	$result = mysql_query($sql);
	$count = mysql_result($result, 0, 0);
	
	$purpose = $_POST['purpose'];
	
	if($purpose == "subscribe") {
		//㹡����Ѥ���Ҫԡ �ҡ������Ź�������͹���� ���������Ѻ
		if($count == 1) {
			echo "����ŷ���ҹ�к� �������͹����";
		}
		else {
			$sql = "INSERT INTO mailinglist VALUES('$name', '$email');";
			@mysql_query($sql) or die(mysql_error());
	
			echo "�����Ŷ١�Ѵ������ <p />";
		}
	}
	else if($purpose == "unsubscribe") {
		//㹡��¡��ԡ����Ҫԡ ��ͧ�������ŷ������������㹰ҹ������
		if($count == 0) {
			echo "��辺����ŵ���������к�";
		}
		else {
			$sql = "DELETE FROM mailinglist WHERE email = '$email';";
			@mysql_query($sql) or die(mysql_error());
	
			echo "�����Ŷ١ź���� <p />";	
		}
	}
	else {
		echo "��س����͡�ѵ�ػ��ʧ��";
	}
}
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  ����: 
  <label> </label>
  <label><br />
  <input name="name" type="text" id="name" size="30" />
  </label>
  <br />
�����:<br />
<label>
<input name="email" type="text" id="email" size="30" />
</label>
<br />
<label>
<input name="purpose" type="radio" value="subscribe" />
��Ѥ���Ҫԡ</label>
 <label>
 <input name="purpose" type="radio" value="unsubscribe" />
 ¡��ԡ�������Ҫԡ</label>
 <br />
 <br />
 <label>
 <input type="submit" name="Submit" value="��ŧ" />
 </label>
</form>
</body>
</html>