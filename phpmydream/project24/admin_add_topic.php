<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title></title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");	
include("dbconn.inc.php");

if($_POST) {
 	//��ͧ�ѹ�ѭ�� magic quotes ����Ѻ PHP ��ӡ��������ѹ 6
	if(get_magic_quotes_gpc()) {
		foreach($_POST as $k => $v) {
			$v = stripslashes($v);
			$v = htmlspecialchars($v);
			$_POST[$k] = $v;
		}
	}
	
	$topic= $_POST['topic'];
	$day = $_POST['day'];
	
	//������Ǣ����ŧ㹵��ҧ topic
	$sql = "INSERT INTO topic VALUES
	 	(0, '$topic', 0, NOW(), DATE_ADD(NOW(), INTERVAL $day DAY));";
					
	@mysql_query($sql) or die(mysql_error());
	
	//��ҹ id �ͧ��Ǣ�ͷ����������ش ��觨й�����ŧ㹵��ҧ choice ����
	$topic_id = mysql_insert_id();
	
	//�¡���к�÷Ѵ����繺�÷Ѵ�� 1 ������͡
	$choices = explode("\n", $_POST['choice']);
	
	//����������㹵��ҧ choice ����������͡�� 1 ��
	//�ѧ��鹵�ͧǹ�ٻ�������������ŷ����ǵ���ӹǹ������͡���Ѻ��
	for($i = 0; $i < count($choices); $i++) {
		if(empty($choices[$i])) {
			continue;
		}
		$sql = "INSERT INTO choice VALUES
		 			(0, $topic_id, '{$choices[$i]}', 0);";
					
		@mysql_query($sql) or die(mysql_error());
	}
	echo "<p align=center>�����Ŷ١�Ѵ������<br /><br />
			<a href=\"index.php\">��͹��Ѻ</a></p>
			</body></html>";
	exit;
}
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table border="0" cellspacing="3" cellpadding="0" align="center">
    <tr>
      <td>��Ǣ����:</td>
      <td><input name="topic" type="text" id="topic" size="40" /></td>
    </tr>
    <tr>
      <td valign="top">������͡:
        <br />
      (��÷Ѵ�� <br />
 		1 ������͡) </td>
      <td><textarea name="choice" cols="37" rows="5" id="choice"></textarea></td>
    </tr>
    <tr>
      <td>��������:</td>
      <td><label>
        <select name="day" id="day">
          <option value="7">7</option>
          <option value="15">15</option>
          <option value="30" selected="selected">30</option>
        </select>
      �ѹ</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="�觢�����" /></td>
    </tr>
  </table>
</form>
</body>
</html>