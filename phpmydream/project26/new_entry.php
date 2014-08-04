<?php
session_start();
if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
	 header("Location: user_login.php");
	 exit;
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

include("blog.inc.php");
my_connect();

if($_POST) {
	if(get_magic_quotes_gpc()) {
	 	foreach($_POST as $k => $v) {
			$_POST[$k] = stripslashes($v);
		}
	}
	
	$cat_id = $_POST['cat'];
	$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	$content = $_POST['content'];
	$sql = "INSERT INTO entry VALUES
				(0, '$cat_id', $user_id, NOW(), '$title', '$content', '$user_name', 0);";
				
	@mysql_query($sql) or die(mysql_error());
	
	header("Refresh: 3; url=index.php");
	echo "���͡�ͧ��ҹ�١�Ѵ������ ��Ш���ѧ˹����ѡ� 3 �Թҷ�";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Blog: New Entry</title>
<link rel="stylesheet" href="../css/style.css"  />
<script src="../openwysiwyg/wysiwyg.js"> </script>
</head>
<body>
<?php
include("header.inc.html");
?>
<p />
<h3 align="center">���ҧ���͡����</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form1" id="form1">
  <table border="0" cellspacing="3" cellpadding="0" align="center">
    <tr>
      <td>��Ǵ:</td>
      <td>
        <select name="cat" id="cat">
		<?php
		foreach($BLOG_CATS as $key => $value) {
			echo "<option value=$key>$value</option>";
		}
		?>
        </select>
      </td>
    </tr>
    <tr>
      <td>��Ǣ��:</td>
      <td><label>
        <input name="title" id="title" type="text" size="60" />
      </label></td>
    </tr>
    <tr>
      <td>��������´:</td>
      <td>
        <textarea name="content" id="content"> </textarea>
	  	<script> generate_wysiwyg('content'); </script>	 
	  </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right">[<a href="upload_img.php">�ѻ��Ŵ�ٻ�Ҿ</a>]  [<a href=#>�Ըա���á�ٻ�Ҿ� Editor</a>]</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit1" value="���ҧ���͡����" />
		 <input type="button" name="Button1" value="������ҧ���Ѿ��" onclick="alert('��ǹ���������������ͧ'); return false;" />
      </label></td>
    </tr>
  </table>
</form><hr align="center" /><center>
<?php
$sql = "SELECT img_id, user_id FROM img 
 			WHERE user_id = $user_id ORDER BY img_id DESC;";
			
$result = mysql_query($sql);
if(mysql_num_rows($result) > 0) {
	echo "�Ҿ����ѻ��Ŵ����������: $user_name <p />";
	while($data = mysql_fetch_array($result)) {
		$img_id = $data['img_id'];
		$url = "http://localhost/phpmydream/project26/";
		$url .= "read_img.php?imgid=" . $img_id;
		echo "<img src=$url /><br />
				URL:<input type=text size=80 value=$url /><p />";
	}
}
?>
</center><p>&nbsp;</p>
</body>
</html>