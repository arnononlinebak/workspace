<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 12-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$sql = "";
$db = "";
if(isset($_POST['sql'])) {
	$sql = stripslashes($_POST['sql']);
	$db = $_POST['db'];
}
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Database name:
<input name="db" type="text" value="<?php echo $db; ?>" /><br />
SQL command: <br />
  <textarea name="sql" cols="50" rows="3"><?php echo $sql; ?></textarea>
  <br />
   <input type="submit" name="Submit" value="Submit Query" />
</form>
<p>
<?php
function end_page() {
	echo "</body></html>";
	exit;
}

//ถ้าไม่ใช่การ Postback ก็ให้หยุดการทำงานของเพจ
if(!isset($_POST['sql'])) {
	end_page();
}

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
@mysql_select_db("$db") or die(mysql_error());

function get_microtime() {
	$mt = explode(" ", microtime());
	return $mt[0] + $mt[1];
}
$time_start = get_microtime();

$result = mysql_query($sql);

$time_end = get_microtime();

$difftime = $time_end - $time_start;
$time = round($difftime, 4);

//ถ้าเกิดข้อผิดพลาดในทุกกรณีให้แสดงข้อผิดพลาดและหยุดการทำงาน
if(!$result) {
	echo mysql_error();
	end_page();
}

//ถ้าข้อมูลจำนวนแถวไม่ใช่ตัวเลข แสดงว่าเป็นคำสั่งประเภทการเปลี่ยนแปลงข้อมูล
if(!is_numeric(@mysql_num_rows($result))) {
	//ถ้าเป็นคำสั่งการเปลี่ยนแปลงขอมูล ให้แสดงเป็นจำนวนแถวที่เกิดการเปลี่ยนแปลง
	$affected_rows = 0;
	if(is_numeric(@mysql_affected_rows())) {	
		$affected_rows = mysql_affected_rows();
	}
	echo "Query OK, " . $affected_rows . " row(s) affected ($time sec.)";
	end_page();
}

//ถ้าจำนวนแถวเป็นตัวเลข แสดงว่าเป็นคำสั่งการเลือกข้อมูล ให้แสดงจำนวนแถวผลลัพธ์ก่อน
echo "Query OK, " . mysql_num_rows($result) . 
 	" row(s) in set ($time sec.)";
	
if(mysql_num_rows($result)==0) {
	end_page();
}

//อ่านข้อมูลใน result set มาแสดงในแบบตาราง HTML
echo "<table border=1 cellpadding=3>";

//ส่วนที่เป็นฟิลด์
echo "<tr bgcolor=\"#CCCCCC\">"; 
$num_fields = mysql_num_fields($result);
for($i=0; $i<$num_fields; $i++) {
	echo "<th>" . mysql_field_name($result, $i) . "</th>";
}
echo "</tr>";

//ส่วนที่เป็นข้อมูล
while($data = mysql_fetch_array($result)) {
	echo  "<tr valign=top>";
	for($i=0; $i<$num_fields; $i++) {
		echo "<td>" .  $data[$i] . "</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>