<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 5-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>

<?php
//����繡�� Postback ���Ѵ��áѺ�����ŷ���������
if(isset($_POST['name'])) {
	$name = $_POST['name'];
	$msg = $_POST['msg'];
	
	if(get_magic_quotes_gpc()) {
	 	//���͡੾���Թ�ط�������������������ͧ
		$name = stripslashes($name);
		$msg = stripslashes($msg);
	}
	
	//��ͧ�ѹ�������� HTML �������ռ�
	$name =  htmlspecialchars($name);
	$msg = htmlspecialchars($msg);

	//�ŧ \n ����� <br />
	$msg = nl2br($msg);
		
	$face = $_POST['font_face'];
	$size = $_POST['font_size']  . "pt";
	$color = $_POST['font_color'];
	
	$style_open_tag = "";
	$style_close_tag = "";
	if(isset($_POST['style'])) {
		$style_open_tag = implode("", $_POST['style']);
		//���ҧ�硻Դ �� <b> ���Ѻ </b> ��᷹��� < ���� </ 
		$style_close_tag = str_replace("<", "</", $style_open_tag);
	 }
	 
	 $bgcolor = $_POST['bgcolor'];
	 
	 //�Ӣ�ͤ������ʴ����Ẻ���ҧ ������Ѵ�ٻẺ
	echo "<table width=380 border=1 align=center bgcolor=$bgcolor>";
 	echo "<tr><td style=\"font-family:$face; font-size:$size; color:$color;\">
					$style_open_tag
					$msg
					$style_close_tag
					<br />
					��: $name
			</td></tr></table><p align=center>";
	
	//���ҧ�ԧ�������������ö��͹��Ѻ��ѧ���������㹿������					
	echo "<a href=\"javascript: history.back();\">��͹��Ѻ</a>";
	
	//��Դྨ������ش��÷ӧҹ���ǹ��������
	echo "</p></body></html>";
	exit;
}
?>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td><div align="right"><strong>����</strong></div></td>
      <td><label>
        <input name="name" type="text" id="name" size="30" />
      </label></td>
    </tr>
    <tr valign="top">
      <td><div align="right"><strong>��ͤ���</strong></div></td>
      <td><label>
        <textarea name="msg" cols="40" rows="3" id="msg"></textarea>
      </label></td>
    </tr>
    <tr>
      <td><div align="right"><strong>����ѡ��</strong></div></td>
      <td><label>
        <select name="font_face" id="font_face">
          <option value="CordiaUPC" selected="selected">CordiaUPC</option>
          <option value="BrowalliaUPC">BrowalliaUPC</option>
          <option value="AngsanaUPC">AngsanaUPC</option>
        </select>
      ��Ҵ 
      <select name="font_size" id="font_size">
        <option value="14">14</option>
        <option value="16">16</option>
        <option value="18">18</option>
      </select>
      �� 
      <select name="font_color" id="font_color">
        <option value="white" selected="selected">���</option>
        <option value="yellow">����ͧ</option>
        <option value="orange">���</option>
      </select>
</label></td>
    </tr>
    <tr>
      <td><div align="right"><strong>�ٻẺ����ѡ��</strong></div></td>
      <td><label>
        <input name="style[]" type="checkbox" id="style[]" value="&lt;b&gt;" />
      ˹� 
      <input name="style[]" type="checkbox" id="style[]" value="&lt;i&gt;" />
      ���§ 
      <input name="style[]" type="checkbox" id="style[]" value="&lt;u&gt;" />
      �մ��ѹ��</label></td>
    </tr>
    <tr>
      <td><div align="right"><strong>�վ����ѧ</strong></div></td>
      <td><label>
        <input name="bgcolor" type="radio" value="black" checked="checked" />
        ��
        <input name="bgcolor" type="radio" value="blue" />
        ����Թ
        <input name="bgcolor" type="radio" value="green" />
        ���� 
        <input name="bgcolor" type="radio" value="brown" />
        ��ӵ��
      </label></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><label></label></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><input type="submit" name="Submit" value="Preview" /></td>
    </tr>
  </table>
</form>
</body>
</html>