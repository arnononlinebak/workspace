<?php
session_start();
if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
	 header("Location: user_login.php");
	 exit;
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Blog: Upload Image</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");
include("blog.inc.php");
my_connect();
?>

<center><p />
<h3 align="center">�ѻ��Ŵ�Ҿ����Ѻ���ҧ���͡����</h3>
<?php
//����繡���ѻ��Ŵ������� ���Ѵ��ŧ㹰ҹ�����š�͹
if($_FILES) {
	$errmsg = "";
	$type = strtolower($_FILES['file']['type']);
	$pattern = "((jpe?g)|(png)|(gif))$";
	if(eregi("$pattern", $type)) {		
 		$errmsg .= "��ͧ���Ҿ��Դ .jpg ���� .png ���� .gif ��ҹ�� <br />";
 	}
	
	$size = getImageSize($_FILES['file']['tmp_name']);
	if($size[0] > 300) {
		$errmsg .= "��Ҵ�ͧ�Ҿ��ͧ����Թ 300 �ԡ�� <br />";
	}
	
	if($_FILES['file']['error'] != 0) { 
		$errmsg .= "�Դ��ͼԴ��Ҵ㹡���ѻ��Ŵ�Ҿ <br />";
	 }
	
	if($errmsg != "") {
		echo "<font color=red>$errmsg</font><p />";
		echo "<a href=\"javascript: history.back()\">��͹��Ѻ����</a>";
		exit;
	}

	$name = $_FILES['file']['name'];
	$type = $_FILES['file']['type'];
	$size = $_FILES['file']['size'];
		
	//��ҹ�����Ңͧ���
	$upfile = $_FILES['file']['tmp_name'];
	$file = fopen($upfile, "r");
	$content = fread($file, filesize($upfile));
	$content = addslashes($content);
	fclose($file);
		
 	$sql = "INSERT INTO img VALUES
 				(0, $user_id, '$name', '$type', '$size', '$content');";
	@mysql_query($sql) or die(mysql_error());

	echo "��úѹ�֡���Ҿ��������º���� <br />";
}
?>
<p />
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  �������ѻ��Ŵ��ͧ...<br />
  - ���Ҿ��Դ .jpg ���� .png ���� .gif <br />
  - �բ�Ҵ�������ҧ����Թ 300 �ԡ��<br />
<br /> 
  <input name="file" type="file" id="file" size="50" />
	 <br />
	 <input name="Submit" type="submit" value="�ѻ��Ŵ" />
	 <br />
  <br />
  <a href="new_entry.php">��Ѻ价��˹�����ҧ���͡����</a>
</form>
<hr width="680"  />
<?php
$sql = "SELECT img_id, user_id FROM img 
 			WHERE user_id = $user_id ORDER BY img_id DESC;";
$result = mysql_query($sql);
if(mysql_num_rows($result) > 0) {
	echo "�Ҿ����ѻ��Ŵ����������: $user_name <p />";
	while($data = mysql_fetch_array($result)) {
		$img_id = $data['img_id'];
		echo "<img src=read_img.php?imgid=$img_id /> <p />";
	}
}
?>
</center><p>&nbsp;</p>
</body>
</html>