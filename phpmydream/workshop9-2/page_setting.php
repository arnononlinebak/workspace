<?php
if(isset($_POST['bgcolor'])) {
	$bgcolor= $_POST['bgcolor'];
	$textcolor= $_POST['textcolor'];
	$day = 30;
	if(is_numeric($_POST['day']) && $_POST['day'] > 0) {
		$day = $_POST['day'];
	}
	$expires = time() + (60 * 60 * 24 * $day);
	
	setcookie("bgcolor", $bgcolor, $expires);
	setcookie("textcolor", $textcolor, $expires);
	setcookie("day", $day, $expires);
		
	header("Refresh: 5; url=index.php");
	echo "��õ�駤���������º���� ��Ш�������ѧྨ��ѡ���� 5 �Թҷ�";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 9-2: Page Setting</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$bgcolor= "white";		//��Ҵտ�ŵ�
$textcolor= "black";	//��Ҵտ�ŵ�
$day = 30;					//��Ҵտ�ŵ�
if(isset($_COOKIE['bgcolor']) && isset($_COOKIE['textcolor']) && isset($_COOKIE['day'])) {
	$bgcolor= $_COOKIE['bgcolor'];
	$textcolor= $_COOKIE['textcolor'];
	$day = $_COOKIE['day'];
}
?>
<b>��ҷ����������:</b>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  ��վ����ѧ
  <select name="bgcolor" id="bgcolor">
    <option value="white" selected="selected" <?php if($bgcolor == "white") echo " selected"; ?>>���</option>
    <option value="black" <?php if($bgcolor == "black") echo " selected"; ?>>��</option>
    <option value="lightgray" <?php if($bgcolor == "lightgray") echo " selected"; ?>>����͹</option>
  </select>
  ���ѵ���ѡ�� 
  <select name="textcolor" id="textcolor">
    <option value="black" selected="selected" <?php if($textcolor == "black") echo " selected"; ?>>��</option>
    <option value="white" <?php if($textcolor == "white") echo " selected"; ?>>���</option>
	<option value="red" <?php if($textcolor == "red") echo " selected"; ?>>ᴧ</option>
  </select>
  �������� 
  <input type="text" name="day"  id="day" size="5" value="<?php echo $day; ?>" />�ѹ
  
  <input type="submit" name="Submit" value="��駤��" />
</form>

</body>
</html>