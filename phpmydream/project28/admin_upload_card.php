<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>E-Card: Admin Upload Card</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<h3 align="center">อัปโหลดภาพการ์ด</h3>
<?php
include("ecard.inc.php");

if($_FILES && $_FILES['upfile']['error']==0) {
	$name = $_FILES['upfile']['name'];
	$size = $_FILES['upfile']['size'];
	$type = $_FILES['upfile']['type'];
		
	$upfile = $_FILES['upfile']['tmp_name'];
	$file = fopen($upfile, "r");
	$content = fread($file, filesize($upfile));
	$content = addslashes($content);
	fclose($file);
		
	$cat = $_POST['cat'];
	$title = $_POST['title'];
		
	$sql = "INSERT INTO card VALUES
		 		(0, '$cat', '$title', '$name', '$type', '$size', '$content');";
					
	my_connect();
	mysql_query($sql) or die(mysql_error());
	echo "<p align=center>ข้อมูลถูกจัดเก็บแล้ว</center>";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellspacing="2" cellpadding="3" align="center">
    <tr>
		<td>หมวดหมู่</td>
		<td><label>
 		<select name="cat" id="cat">
 		<?php
 		foreach($CARD_CATS as $cat => $cat_name) {
			 echo "<option value=$cat>$cat_name</option>";
 		}
 		?>
 		</select>
		</label></td>
		</tr>
			  <tr>
	  <td>ชื่อการ์ด</td>
      <td><input name="title" type="text" id="title" /></td>
	  </tr>
      <td>ภาพการ์ด:</td>
      <td><input name="upfile" type="file" id="upfile" size="20" /></td>
	  </tr>
	  <tr>
	  <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="ส่งข้อมูล" /></td>
    </tr>
  </table>
</form><p />
</body>
</html>
