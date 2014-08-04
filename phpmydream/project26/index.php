<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Blog: Home</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("header.inc.html");
include("blog.inc.php");
include("../inc/paging.inc.php");

my_connect();
?>
<p />
<table width="680" cellpadding="3" cellspacing="3" align="center">
<tr valign="top">

<td width="150" bgcolor="wheat" style="font-size: 12pt; padding: 5px;">
<b>หมวดหมู่บล็อก</b>
<br />
	
<!-- หมวดรวมทั้งหมดหมด ไม่อยู่ในตัวแปร $BLOG_CATS จึงต้องแยกมาเขียนไว้ต่างหาก -->
&raquo; <a href="<?php echo $_SERVER['PHP_SELF']; ?>" style="font-size: 11pt;">รวมทั้งหมด</a><br />
	
<?php
foreach($BLOG_CATS as $key => $value) {
	 $url = $_SERVER['PHP_SELF'] . "?catid=$key";
	echo "&raquo; <a href=\"$url\" style=font-size: 11pt;>$value</a><br />";
}
	
echo "<hr />";

if(!isset($_SESSION['user_id'])) {
	echo "<a href=user_login.php>สมาชิกเข้าสู่ระบบ</a><br />
			<a href=user_subscribe.php>สมัครสมาชิกใหม่</a><br />";
}
else {
	echo "<a href=new_entry.php>สร้างบล็อกใหม่</a><br />
	 		<a href=user_logout.php>ออกจากระบบ</a><br />";
}
?>
<br />
</td>

<td bgcolor="#DDDDFF" align="center">
<b>หัวข้อบล็อกในหมวด: 
<font color="red">
<?php 
if($_GET['catid']) {
	echo $BLOG_CATS[$_GET['catid']];	//อ่านชื่อหมวดจาก key ของหมวดนั้น
}
else {
	echo "รวมทั้งหมด";
}
?>
</font></b>
<br />

<div style="width: 96%; background-color: white; border: solid 1px gray; 
 				text-align: left; padding: 5px; margin: 2px;">
<?php
$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 10;
$start_row = paging_start_row($current_page, $rows_per_page);

$sql = "SELECT SQL_CALC_FOUND_ROWS *, 
 			DATE_FORMAT(date_post, '%d-%m-%Y') AS datepost FROM entry";

//ถ้ามีหมวดหมู่ของบล็อกแนบมาแบบ Query String 
//ก็นำไปเป็นเงื่อนไขในการเลือกเฉพาะบล็อกในหมวดนั้น
if($_GET['catid']) {
	$sql .= " WHERE cat_id = '{$_GET['catid']}'";
}
$sql .= " ORDER BY date_post DESC
 			LIMIT $start_row, $rows_per_page;";

$result = mysql_query($sql);
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);

if($total_rows == 0) {
	echo "ไม่พบบล็อกในหมวดนี้";
}
else {
	while($data = mysql_fetch_array($result)) {
		$id = $data['entry_id'];
		$title = $data['title'];
		$name = $data['user_name'];
		$cmm = $data['num_comment'];
		$date = $data['datepost'];
		
		echo "<a href=show_entry.php?entryid=$id target=_blank>$title</a>
		
				<div style=\"font-size: 8pt; color: gray;\">
				
	  		 		โดย: <b>$name</b>  - ($cmm) Comments - [$date]
					
				</div><br />";
	}
}

echo "</div>";

//ในส่วนการแบ่งเพจ หากมี id ของหมวดหมู่อยู่ที่ Query String
//ก็ต้องแนบต่อไปที่เพจอื่นๆด้วย เพื่อจะได้เลือกอ่านเฉพาะบล็อกในหมวดนั้นๆ
$page_range = 5;
if($_GET['catid']) {
	$qry_str = "catid=" . $_GET['catid'];
}
else {
	$qry_str = "";
}
$total_pages = paging_total_pages($total_rows, $rows_per_page); 
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							    			 $page_range, $qry_str);
echo "หน้า: " . $pagenum;
?>

</td>
</tr>
</table>
<p>&nbsp;</p>
</body>
</html>