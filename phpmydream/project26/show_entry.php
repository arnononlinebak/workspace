<?php
session_start();
include("blog.inc.php");
include("../inc/paging.inc.php");

my_connect();

if($_POST) {
	//ตรวจสอบความถูกต้องของข้อมูล
	foreach($_POST as $k => $v) {
		if(get_magic_quotes_gpc()) {
			$v = stripslashes($v);	
		}
		$v = trim(htmlspecialchars($v)); 		
		if(empty($v)) {
			$errmsg = "กรุณาใส่ข้อมูลให้่ครบด้วยค่ะ";
			break;
		}
		else if(has_rudeword($v)) {			
			$errmsg = "ไม่อนุญาตให้ใช้คำที่ไม่เหมาะสมค่ะ";
			break;
		}
		$_POST[$k] = $v;
	}
	
	if($_POST['captcha'] != $_SESSION['captcha']) {
		$errmsg = "ใส่อักขระไม่ตรงกับในภาพ";
	}
	
	if($errmsg == "") {
	 	$entry_id = $_POST['entryid'];
 	 	$message = $_POST['message'];
	 	$name = $_POST['name'];
	
	 	$sql = "INSERT INTO comment VALUES
				 	(0, $entry_id, NOW(), '$message', '$name');";
	 	@mysql_query($sql) or die(mysql_error());
		
		$sql = "UPDATE entry SET num_comment = num_comment + 1 
		 			WHERE entry_id = $entry_id;";
		@mysql_query($sql) or die(mysql_error());
	
		header("Refresh: 3; url=show_entry.php?entryid=$entry_id");
		echo "<font size=5>บันทึกข้อมูลคอมเมนต์เสร็จเรียบร้อย <br />
			  	จะกลับไปที่หน้าู้แสดงคอมเมนต์ใน 3 วินาที</font>";
	}
	else {
 		echo "<font size=5 color=red>$errmsg<p />
				 <a href=\"javascript: history.back()\">ย้อนกลับไปแก้ไข</a></font>";
	}
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Blog: Show Entry</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");

$entry_id = $_GET['entryid'];
$sql = "SELECT *, 
 			DATE_FORMAT(date_post, '%d/%m/%Y %T') AS datepost 
			FROM entry WHERE entry_id = $entry_id;";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
?>
<p /><center>

<div style="width: 600px; background-color: #DDDDFF;">

<table width="96%">
<tr>
<td colspan="2" style="font-size: 12pt; color: green; text-align: left; padding: 3px; font-weight: bold;">&raquo; <?php echo $data['title'];  ?></td>
</tr>

<tr>
<td colspan="2" style="border: solid 1px gray; background-color: white; padding: 5px; text-align: left;"><?php echo mysql_result($result, 0, "content"); ?></td>
</tr>

<tr>
<td align="left" style="color: gray;">
<?php
	echo "โดย: <b>{$data['user_name']}</b>  -  
			({$data['num_comment']}) Comments  -   
			[{$data['datepost']}] ";
?>
</td>
<td align="right">[<a href=#>แจ้งลบ</a>]</td>
</tr>

<tr>
<td colspan="2" align="left"><br /><br /><b>Comments:</b><hr /></td>
</tr>
<?php
$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 10;
$start_row = paging_start_row($current_page, $rows_per_page);

$sql = "SELECT SQL_CALC_FOUND_ROWS *, 
 				DATE_FORMAT(date_post, '%d/%m/%Y %T') AS datepost 
			FROM comment 
 			WHERE entry_id = $entry_id
			ORDER BY date_post DESC
			LIMIT $start_row, $rows_per_page;";
			
$result = mysql_query($sql);
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);
$total_pages = paging_total_pages($total_rows, $rows_per_page); 

while($data = mysql_fetch_array($result)) {
	echo "<tr>
	 			<td colspan=2 align=left>{$data['message']}</td>
			</tr>
	 		<tr>
			 	<td align=left style=\"font-size: 8pt; color: gray;\">
	 		 		โดยคุณ: <b>{$data['name']}</b> - [{$data['datepost']}]
				</td>
				<td align=right>[<a href=#>แจ้งลบ</a>]</td>
			</tr>
			<tr>
				<td colspan=2><hr /></td>
			</tr>";
}
?>
<tr>
<td colspan="2" align="center">
<?php
$page_range = 5;
$qry_str = "entryid=$entry_id";
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							   $page_range, $qry_str);
echo "หน้า: " . $pagenum;
?>
</td>
</tr>
</table>

</div>
<br />

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table border="0" cellspacing="5" cellpadding="3" align="center">
  <tr>
    <td valign="top" align="right"> ข้อคิดเห็น:</td>
    <td align="left"><textarea name="message" cols="50" rows="5" id="message"></textarea></td>
  </tr>
  <tr>
    <td align="right">อักขระในภาพ:</td>
    <td align="left">
	 <input type="text" name="captcha" size="4"  />
	 &nbsp;&nbsp;
	ชื่อ:<input name="name" type="text" id="name" />
	<input type="submit" name="Submit" value="ส่งข้อมูล" />
	<input name="entryid" type="hidden" id="entryid" value="<?php echo $_GET['entryid']; ?>" /></td>
  </tr>
	<tr><td>&nbsp;</td><td align="left"><img src="captcha.php" /></td></tr>
</table>
</form>
<p>&nbsp;</p>
</body>
</html>