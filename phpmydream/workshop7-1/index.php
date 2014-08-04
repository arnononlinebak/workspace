<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 5-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>

<?php
//ถ้าเป็นการ Postback ให้จัดการกับข้อมูลที่ส่งเข้ามา
if(isset($_POST['name'])) {
	$name = $_POST['name'];
	$msg = $_POST['msg'];
	
	if(get_magic_quotes_gpc()) {
	 	//เลือกเฉพาะอินพุทที่ให้ใส่ข้อมูลเข้าไปเอง
		$name = stripslashes($name);
		$msg = stripslashes($msg);
	}
	
	//ป้องกันการใส่แท็ก HTML ไม่ให้มีผล
	$name =  htmlspecialchars($name);
	$msg = htmlspecialchars($msg);

	//แปลง \n ให้เป็น <br />
	$msg = nl2br($msg);
		
	$face = $_POST['font_face'];
	$size = $_POST['font_size']  . "pt";
	$color = $_POST['font_color'];
	
	$style_open_tag = "";
	$style_close_tag = "";
	if(isset($_POST['style'])) {
		$style_open_tag = implode("", $_POST['style']);
		//สร้างแท็กปิด เช่น <b> คู่กับ </b> โดยแทนที่ < ด้วย </ 
		$style_close_tag = str_replace("<", "</", $style_open_tag);
	 }
	 
	 $bgcolor = $_POST['bgcolor'];
	 
	 //นำข้อความมาแสดงผลในแบบตาราง พร้อมจัดรูปแบบ
	echo "<table width=380 border=1 align=center bgcolor=$bgcolor>";
 	echo "<tr><td style=\"font-family:$face; font-size:$size; color:$color;\">
					$style_open_tag
					$msg
					$style_close_tag
					<br />
					โดย: $name
			</td></tr></table><p align=center>";
	
	//สร้างลิงก์เพื่อให้สามารถย้อนกลับไปยังข้อมูลเดิมในฟอร์มได้					
	echo "<a href=\"javascript: history.back();\">ย้อนกลับ</a>";
	
	//ปิิดเพจแล้วหยุดการทำงานในส่วนที่เหลือ
	echo "</p></body></html>";
	exit;
}
?>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td><div align="right"><strong>ชื่อ</strong></div></td>
      <td><label>
        <input name="name" type="text" id="name" size="30" />
      </label></td>
    </tr>
    <tr valign="top">
      <td><div align="right"><strong>ข้อความ</strong></div></td>
      <td><label>
        <textarea name="msg" cols="40" rows="3" id="msg"></textarea>
      </label></td>
    </tr>
    <tr>
      <td><div align="right"><strong>ตัวอักษร</strong></div></td>
      <td><label>
        <select name="font_face" id="font_face">
          <option value="CordiaUPC" selected="selected">CordiaUPC</option>
          <option value="BrowalliaUPC">BrowalliaUPC</option>
          <option value="AngsanaUPC">AngsanaUPC</option>
        </select>
      ขนาด 
      <select name="font_size" id="font_size">
        <option value="14">14</option>
        <option value="16">16</option>
        <option value="18">18</option>
      </select>
      สี 
      <select name="font_color" id="font_color">
        <option value="white" selected="selected">ขาว</option>
        <option value="yellow">เหลือง</option>
        <option value="orange">ส้ม</option>
      </select>
</label></td>
    </tr>
    <tr>
      <td><div align="right"><strong>รูปแบบตัวอักษร</strong></div></td>
      <td><label>
        <input name="style[]" type="checkbox" id="style[]" value="&lt;b&gt;" />
      หนา 
      <input name="style[]" type="checkbox" id="style[]" value="&lt;i&gt;" />
      เอียง 
      <input name="style[]" type="checkbox" id="style[]" value="&lt;u&gt;" />
      ขีดเสันใต้</label></td>
    </tr>
    <tr>
      <td><div align="right"><strong>สีพื้นหลัง</strong></div></td>
      <td><label>
        <input name="bgcolor" type="radio" value="black" checked="checked" />
        ดำ
        <input name="bgcolor" type="radio" value="blue" />
        น้ำเงิน
        <input name="bgcolor" type="radio" value="green" />
        เขียว 
        <input name="bgcolor" type="radio" value="brown" />
        น้ำตาล
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