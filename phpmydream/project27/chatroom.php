<?php
session_start();
if(!isset($_SESSION['name'])) {
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title><?php  echo $_SESSION['name']; ?></title>
<link rel="stylesheet" href="../css/style.css"  />
<script src="../ajax/framework.js"></script>
<script>
function ajaxCall() {
	var data = getFormData("form1");
	var URL = "add_msg.php";
	ajaxLoad('post', URL, data, null);

	document.getElementById('msg').value = "";
}

//�ѧ��ѹ����Ѻ����ͤ�ԡ�����͡�ҡ��ͧʹ���
function exitChatroom() {							
	if(!confirm('�͡�ҡ��ͧʹ��� ?')) {
		return;
	}
	var f = document.getElementById('form1');
	f.action = 'exit_chatroom.php';
	f.submit();
}

//�ѧ��ѹ����Ѻ��Ǩ�ͺ��Ҥ��������顴�繻��� <Enter> �������
//�ҡ������觢�ͤ����͡�����͹��ä�ԡ������
function isPressEnter(event) {					
	if(event.keyCode == 13) {
		ajaxCall();
		return false;
	}
}
</script>
</head>
<body>
<?php 	include("header.inc.html");		?>
<table cellpadding="3" align="center">
<tr>
	<td width="550"><b>��ͧʹ���</b></td><td width="200"><b>�������ʹ���</b></td>
</tr>
<tr valign="top">
<td>
<iframe src="show_msg.html" width="550" height="300" 		
 	scrolling="yes"></iframe></td>
<td>
<iframe src="show_chatter.html" width="200" height="300" 
 	scrolling="yes"></iframe></td>
</tr>
<tr valign="top">
<td>

<form name="form1" id="form1" method="post" action="">
 
 ��ͤ���:
<input type="text" id="msg" name="msg" size="55" maxlength="250"
	style="background-color:#ffffcc; "
	onkeypress="return isPressEnter(event)">

<input type="button" name="Button1" value="��" onclick="ajaxCall()" />

���� &lt;Enter&gt;	

<input type="hidden" name="name" 					
	value="<?php echo $_SESSION['name']; ?>" />
<br>
�բ�ͤ���:
<input type="radio" name="color" value="black" checked>��
<input type="radio" name="color" value="red">ᴧ
<input type="radio" name="color" value="blue">����Թ
<input type="radio" name="color" value="green">����
<input type="radio" name="color" value="orange">���
</form></td>
<td align="right">
<input type="button" name="Button2" value="�͡�ҡ��ͧʹ���" onclick="exitChatroom()" />
</td>
</tr>
</table>
</body>
</html>
