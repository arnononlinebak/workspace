<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 16-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
if($_FILES) {
	echo "�����Ţͧ������ѻ��Ŵ�����: <br />";
	
	echo "name: " . $_FILES['upfile']['name'] . "<br />";
	echo "type: " . $_FILES['upfile']['type'] . "<br />";
	echo "size: " . $_FILES['upfile']['size'] . "<br />";
	echo "tmp_name: " . $_FILES['upfile']['tmp_name'] . "<br />";
	echo "error: " . $_FILES['upfile']['error'] . "<br />";
	
	echo "<p /><a href=\"javascript: history.back()\">��͹��Ѻ</a>";
	echo "</body></html>";
	exit;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
���͡������ͧ����ѻ��Ŵ:<br /> 
  <label>
  <input type="file" name="upfile" />
  </label>
  <br />
  <label>
  <input type="submit" name="Submit" value="Upload Now!" />
  </label>
</form>
</body>
</html>
