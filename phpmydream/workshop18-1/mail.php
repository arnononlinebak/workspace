<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 18-1: Send Mail</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<h2>�����</h2>
<?php
if($_POST) {
	//���ͧ�ҡ���������͡令������ҡ� �֧�Ҩ�����ҹҹ
	//����Ҩ���������������ú����ӹǹ��Ҫԡ
	//�ѧ�����Ҩ֧�����䢢�ͨӡѴ����㹡�÷ӧҹ�ͧʤ�Ի������
	//�¡�˹��� 0 ��觡������ӡѴ���ҹ���ͧ
	set_time_limit(0);		
	
	$subject = htmlspecialchars(stripslashes($_POST['subject']));
	$msg = htmlspecialchars(stripslashes($_POST['msg']));
	
	$header = "From: webmaster@developerthai.com\r\n";
	$header .= "Content-type: text/html; charset=tis-620\r\n";

	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
 	mysql_select_db("phpmysql");
	
	$sql = "SELECT * FROM mailinglist;";
	$result = mysql_query($sql);
	
	//�������ѧ��Ҫԡ���Ф�
	while($data = mysql_fetch_array($result)) {
		$to = $data['email'];

		mail($to, $subject, $msg, $header);
	}

	echo "�������������������
 			</body></html>";
	exit;
}
?>
<form id="form1" name="form1" method="post" action="<?php	echo $_SERVER['PHP_SELF']; ?>">
  ��Ǣ��:<br />
  <label>
  <input name="subject" type="text" id="subject" size="43" />
  </label>
  <br />
  ��ͤ���:<br />
<label>
<textarea name="msg" cols="40" rows="3" id="msg"></textarea>
</label>
<br />
<br />
<label>
<input type="submit" name="Submit" value="��ŧ" />
</label>
</form>
</body>
</html>