<?php
include("dbconn.inc.php");

//��Ǩ�ͺ��Ҽ���������͡������͡�ѹ��ѹ˹���������
if(isset($_POST['choice'])) {	
	$choice_id = $_POST['choice'];
	$topic_id = $_POST['topic_id'];

	$sql = "UPDATE choice SET score = score + 1
			 	WHERE choice_id = $choice_id;";
	mysql_query($sql);
	
	$sql = "UPDATE topic SET num_votes = num_votes + 1
			 	WHERE topic_id = $topic_id;";
	mysql_query($sql);
	
	//�红�����Ẻ�ء�����������ʴ���Ҽ������¹������ǵ��Ǣ�͹������
	//�¨йӤ�� id �ͧ�����繪���(����)�ͧ��ء��� ��ǹ��Ңͧ�ء�������繢����ŧ�������Ţ 1
	//������آͧ�ء�������˹������з���ҡ���������٧�ش����������ö��ǵ������Ǣ����
	//��觨ҡྨ admin_add_topic.php ���������٧�ش��� 30 �ѹ ��㹷����С�˹������������� 60 �ѹ
	setcookie($topic_id, 1, time() + 60*24*60*60);
	
	echo "<html><body>";
	include("header.inc.html");
	
	echo "<font size=+1>
	 		<p align=center>�ѹ�ѡ�����ǵ���� <br />
			<a href=\"javascript: self.close();\">�Դ</a>
			</p></font>
			</body></html>";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Poll: Vote</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php  
include("header.inc.html");  

$topic_id = $_GET['tid'];

//��Ǩ�ͺ�ء�����Ҽ������¹������ǵ��Ǣ�͹�������ѧ ���ͻ�ͧ�ѹ�����ǵ���
//㹡�ù����ҹ��ԧ �����Ҥ��������͡
/*
if(isset($_COOKIE[$topic_id])) {
	echo "<p align=center>�����¤�� �س����ǵ��Ǣ�͹������ �������ö��ǵ������ա</p>
			</body></html>";
	exit;
}
*/

//��ҹ��Ǣ���Ũҡ���ҧ topic ���Ź�鹵�ͧ�ѧ���Դ��ǵ
$sql = "SELECT * FROM topic 
 			WHERE topic_id = $topic_id AND end_date >= NOW();";
			
$result = mysql_query($sql);

//��һԴ��ǵ���� ������ռ��Ѿ���Ѻ�׹�� ���������شྨ���
if(mysql_num_rows($result) == 0) {
	echo "<p align=center>�Դ��ǵ��Ǣ�͹������</p>
			</body></html>";
	
	exit;
}
?>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="500" align="center">
<tr>
<td>
<?php
$topic = mysql_result($result, 0, "title");

echo "<b>$topic</b> <p />";

//��ҹ������͡�ҡ���ҧ choice �����ҧ���Թ�ط radio
$sql = "SELECT * FROM choice WHERE topic_id = $topic_id;";
$result = mysql_query($sql);

while($data = mysql_fetch_array($result)) {
	echo "<input type=radio name=choice 
	 			value={$data['choice_id']} />{$data['item']} <br />";
}

//�纤�� id �ͧ��Ǣ�������� hidden ������ҵ�ͧ�红����Ź��ŧ㹵��ҧ����
echo "<input type=hidden name=topic_id value=$topic_id />";
?>
 	<br />

    <input type="submit" name="Submit" value="��ŧ" />
	<br /><br />
	<a href="javascript: self.close();">¡��ԡ</a>
	
</td>
</tr>
</table>
</form>
</body>
</html>