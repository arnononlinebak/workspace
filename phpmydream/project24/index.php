<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Poll: Index</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php	
include("header.inc.html");	
include("dbconn.inc.php");
include("../inc/paging.inc.php");

$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 10;
$start_row = paging_start_row($current_page, $rows_per_page);

$sql = "SELECT SQL_CALC_FOUND_ROWS * 
 			FROM topic 
			ORDER BY topic_id DESC 
			LIMIT $start_row, $rows_per_page;";
$result = mysql_query($sql);

$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);

if(mysql_num_rows($result) == 0) {
	echo "<p align=center>‰¡Ëæ∫À—«¢ÈÕ¢Õß‚æ≈</p>
				</body></html>";
	exit;
}
?>

<table width=500 cellpadding=7 cellspacing=0 bgcolor=whitesmoke align=center>
<?php
while($data = mysql_fetch_array($result)) {
	$id = $data['topic_id'];
	echo "<tr>
		 	<td style=\"border-bottom: dotted 1px gray;\">
				 <b>&raquo; {$data['title']}</b>
			</td>
 			<td align=right style=\"border-bottom: dotted 1px gray;\">
				 ºŸÈ‚À«µ: {$data['num_votes']}  - 
				<a href=\"vote.php?tid=$id\" target=_blank>‚À«µ</a> - 
				<a href=\"result.php?tid=$id\" target=_blank>¥Ÿº≈</a>
			</td>
			</tr>";
}

echo "<tr bgcolor=white><td colspan=2 align=center>";
$page_range = 5;
$qry_str = "";
$total_pages = paging_total_pages($total_rows, $rows_per_page); 
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							    			 $page_range, $qry_str);
echo "ÀπÈ“: " . $pagenum;
	
echo "</td></tr>";
?>
</table>

</body>
</html>