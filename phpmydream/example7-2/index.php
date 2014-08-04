<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 7-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>

<?php
if($_POST) {
 	echo "<b>ที่อยู่:</b><br />";
 	foreach($_POST['address'] as $address) {
	 	echo $address . "<br />";
 	}

 	echo "<p /><b>ภาษาที่เขียนได้:</b> ";
 	if(isset($_POST['lang'])) {
	 	//เนื่องจากข้อมูลที่ส่งมาอยู่ในรูปแบบอาร์เรย์
	 	//เราจึงสามารถรวมสมาชิกให้เป็นสตริงเดียวกันได้ด้วย implode()
	 	$lang = implode(", ", $_POST['lang']);  	//คั่นด้วย ", "
	 	echo $lang;
 	}

 	echo "<p /><b>ตำแหน่งงานที่สมัคร:</b> <br />";
	
	//ตัวเลือก Multiple selection ต้องตรวจสอบก่ิอน เพราะผู้ใช้อาจไม่เลือกรายการใดเลยก็ได้
 	if(isset($_POST['jobs'])) {
	 	$jobs = implode("<br />", $_POST['jobs']);		//คั่นด้วย "<br />" หรือให้แยกไว้คนละบรรทัด
	 	echo $jobs;
 	}
	//หลังการแสดงผล จะไม่แสดงฟอร์มอีก ดังนั้นจะหยุดการทำงานของเพจ
 	echo "</body></html>";
 	exit;
}
?>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <strong>ที่อยู่</strong><br />
  บรรทัดที่ 1: 
  <label>
  <input name="address[]" type="text" id="address[]" size="35" />
  </label>
  <br />
บรรทัดที่ 2: 
<label>
<input name="address[]" type="text" id="address[]" size="35" />
</label>
<br />
บรรทัดที่ 3: 
<label>
<input name="address[]" type="text" id="address[]" size="35" />
</label>
<br />
<strong>ภาษาที่เขียนได้</strong>
<label>
<input name="lang[]" type="checkbox" id="lang[]" value="PHP" />
PHP</label>
<label>
<input name="lang[]" type="checkbox" id="lang[]" value=".NET" />
.NET</label>
 <label>
 <input name="lang[]" type="checkbox" id="lang[]" value="Java" />
 Java </label>
 <label></label>
 <br />
 <strong>ตำแหน่งงานที่สมัคร 
 <label></label>
 </strong>
 <label><br />
 <select name="jobs[]" size="3" multiple="multiple" id="jobs[]">
   <option value="System Analyst">System Analyst</option>
   <option value="Web Developer">Web Developer</option>
   <option value="App Developer">App Developer</option>
  </select>
</label>
 <label>
 <input type="submit" name="Submit" value="ส่งข้อมูล" />
 </label>
</form>
</body>
</html>
