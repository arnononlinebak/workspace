<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 10-1</title>
</head>
<body>
<?php
$mail = "";
$url = "";
$note = "";
$err_mail = "";
$err_url = "";
$rude_words = "";

if(isset($_POST['mail'])) {
	include("Validation.class.php");
	$val = new Validation();

	$mail = $_POST['mail'];
	$url = $_POST['url'];
	$note = $_POST['note'];
	
	if(!$val->isValidMail($mail)) {
		$err_mail = "<font color=red>รูปแบบอีเมลไม่ถูกต้อง</font>";
	}
	
	if(!$val->isValidUrl($url)) {
		$err_url = "<font color=red>รูปแบบ URL ไม่ถูกต้อง</font>";
	}
	
	$rudes = $val->getRudeWords($note);
	if(count($rudes)!=0) {
		$rude_words = "<font color=red>กรุณาแก้ไขคำหยาบต่อไปนี้:<br />";
		for($i=0; $i<count($rudes); $i++) {
			$rude_words .= "* {$rudes[$i]}<br />";
		}
		$rude_words .= "</font>";
	}
}
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<table border="0" cellspacing="0" cellpadding="3">
  <tr>
   	<td width="61" valign="top">อีเมล</td>
    <td width="231" valign="top">
		<input name="mail" type="text" size="35" value="<?php echo $mail; ?>" />
	</td>
    <td width="346" valign="top"><?php echo $err_mail; ?></td>
  </tr>
  <tr>
    <td valign="top">เว็บไซต์</td>
    <td valign="top">
		<input name="url" type="text" size="35" value="<?php echo $url; ?>" />
	</td>
    <td valign="top"><?php echo $err_url; ?></td>
  </tr>
  <tr>
    <td valign="top">ข้อคิดเห็น</td>
    <td valign="top">
		<textarea name="note" cols="35" rows="4" id="note"><?php echo $note; ?></textarea>
	</td>
    <td valign="top"><?php echo $rude_words;  ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="Submit" value="ส่งข้อมูล" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
