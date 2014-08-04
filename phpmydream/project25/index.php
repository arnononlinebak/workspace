<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Webboard: Topic</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php 
include("header.inc.html");	
include("webboard.inc.php");
include("../inc/paging.inc.php");
my_connect();
?>
<table width="650" border="0" align="center" cellpadding="7" cellspacing="1">
<tr><td colspan="4" align="right"><a href="newtopic.php">ตั้งกระทู้ใหม่</a></td></tr>
  <tr>
    <th width="80">วันที่</th>
	<th width="430">หัวข้อ</th>
	<th width="120">โดย</th>
	<th width="20">ตอบ</th>
  </tr>
<?php
$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 20;
$start_row = paging_start_row($current_page, $rows_per_page);

//อ่านข้อมูลจากตาราง topic โดยเรียงลำดับจากกระทู้ล่าสุดไปยังกระทู้ก่อนหน้านี้
$sql = "	SELECT SQL_CALC_FOUND_ROWS *, 
	 	 	DATE_FORMAT(date_post, '%d-%m-%Y') AS datepost 
	 		FROM topic
	 		ORDER BY topic_id DESC 
	 		LIMIT $start_row, $rows_per_page;";
			
$result = mysql_query($sql);
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);
$total_pages = paging_total_pages($total_rows, $rows_per_page); 

//สีพื้นหลังสำำหรับการสลับสีระหว่างแถว
$bgcolor1 = "#eeeeff";
$bgcolor2 = "#ddeeff";
$bgcolor = $bgcolor1;

while($data = mysql_fetch_array($result)) {
	$bgcolor = ($bgcolor == $bgcolor1) ? $bgcolor2 : $bgcolor1;
	
	//แต่ละหัวข้อกระทู้ จะทำเป็นลิงค์เชื่อมโยงไปยังเพจ reply.php
 	//เพื่อให้สามารถคลิกเข้าไปดูรายละเอียดของกระทู้นั้นได้
 	//โดยแนบหมายเลข(id)ของกระทู้นั้นไปด้วย 
 	echo "<tr bgcolor=$bgcolor valign=top>
	 	 		<td>{$data['datepost']}</td>
				
	 	 		<td><a href=\"reply.php?topicid={$data['topic_id']}\" target=_blank>
		 	 		{$data['title']}</a></td>
					
	 	 		<td>{$data['name']}</td>
	 	 		<td>{$data['num_reply']}</td>
	 	 	</tr>";
}
//แสดงหมายเลขเพจ
echo "<tr> <td colspan=4 align=center>";

$page_range = 5;
$qry_str = "";
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							    			 $page_range, $qry_str);
echo "หน้า: " . $pagenum;
echo "</td></tr>";
?>
</table>
</body>
</html>