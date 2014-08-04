<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 13-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
//ถ้าเป็นการ Postback
if(isset($_GET['keyword'])) {
	if(!isset($_GET['field_select'])) {
		echo "ต้องเลือกข้อมูลที่จะี่แสดงผลอย่างน้อย 1 อย่าง";
	}
	else {
		$field_search = $_GET['field_search'];
		$kw = $_GET['keyword'];
		$match = $_GET['match'];
		$price = $_GET['price'];
		$field_select = implode(", ", $_GET['field_select']);	//รวมให้เป็นสตริงเดียวกันคั่นด้วย ", "
		
		//จัดวางสัญลักษณ์ wildcard ให้สอดคล้องกับตำแหน่งคำที่เลือก
		if($match == "part") {
			$kw = "%$kw%";
		}
		else if($match == "start") {
			$kw = "$kw%";
		}
		else if($match == "end") {
			$kw = "%$kw";
		}
		
		//นำค่าจากตัวแปรต่างๆมาแทรกลงใน SQL
		$sql = "SELECT 		$field_select
					FROM  		book
					WHERE		($field_search  LIKE  '$kw')  AND  (price  $price)";
					
		//สามารถนำคำสั่ง  SQL ที่ได้นี้ไปใช้ร่วมกับฟังก์ชัน mysql_query() ได้เลย
	}
	
	echo "ตัวอย่างคำสั่ง SQL ที่ได้: <p />";
	echo nl2br($sql);
	echo "<p /><a href=\"javascript: history.back();\">ย้อนกลับ</a>";
	echo "</body></html>";
	exit;
}
?>
<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
  <label><strong>ระบบสืบค้นหนังสือ:<br />
    </strong><br />
    <input name="field_search" type="radio" value="title" checked="checked" />
ชื่อหนังสือ</label>
    <label>
    <input name="field_search" type="radio" value="author" />
นักเขียน</label>
    <label>
    <input name="field_search" type="radio" value="publisher" />
สำนักพิมพ์</label>
    <br />
    <input name="keyword" type="text" id="keyword" size="45" />
    <input type="submit" name="Submit" value="ค้นหา" />
    <br />
  ตำแหน่งคำ:
  <label>
  <select name="match" id="match">
    <option value="part">ส่วนของคำ</option>
    <option value="whole">ตรงกันทั้งคำ</option>
    <option value="start">ขึ้นต้นด้วย</option>
    <option value="end">ลงท้ายด้วย</option>
  </select>
&nbsp;&nbsp;ราคา:
<select name="price" id="price">
  <option value="&gt; 0">ทุกระดับ</option>
  <option value="&lt;= 200">ไม่เกิน 200</option>
  <option value="BETWEEN 200 AND 250">200 - 250</option>
  <option value="BETWEEN 250 AND 300">250 - 300</option>
  <option value="BETWEEN 300 AND 400">300 - 400</option>
  <option value="&gt;= 400">400 ขึ้นไป</option>
</select>
  </label>
  <br />
  <br />
  ข้อมูลที่แสดงในผลลัพธ์: 
  <label> <br />
  <input name="field_select[]" type="checkbox" id="field_select[]" value="title" />
  ชื่อหนังสือ</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="author" />
  นักเขียน</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="publisher" />
  สนพ.</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="price" />
  ราคา</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="isbn" />
  ISBN</label>
 </form>
</body>
</html>
