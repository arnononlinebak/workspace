<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 15-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("../inc/paging.inc.php");

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");		

//��ҹ�ӴѺྨ�Ѩ�غѹ�ҡ query string �ҡ������ʴ������ྨ�á
$current_page = 1;
if(isset($_GET['page'])) {
 	$current_page = $_GET['page'];
}

//�ʴ� 5 �ǵ��˹�� ��������������鹢ͧྨ���  �����¡�ѧ��ѹ�������� include file
$rows_per_page = 5;
$start_row = paging_start_row($current_page, $rows_per_page);

//��ҹ�����Ũҡ���ҧ
$sql = "SELECT	SQL_CALC_FOUND_ROWS * 
	 		FROM testpaging
	 		LIMIT $start_row, $rows_per_page;";
			
$result = mysql_query($sql);

//�Ҩӹǹ�Ǽ��Ѿ����������ç������͹�
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);

//�ӹǹ˹�ҷ����� �����¡�ѧ��ѹ�������� include file
$total_pages = paging_total_pages($total_rows, $rows_per_page);

//�ʴ����Ѿ���Ẻ���ҧ
echo "<table border=1 cellpadding=5 cellspacing=0 align=center>
	 	<tr bgcolor=\"#cccccc\">";

//��ǹ��Ŵ�ͧ���ҧ
$num_fields = mysql_num_fields($result);
for($i=0; $i<$num_fields; $i++) {
	echo "<th>" . mysql_field_name($result, $i) . "</th>";
}
echo "</tr>";

//�����ǹ������
while($data = mysql_fetch_array($result)) {
	echo  "<tr>";
	for($i=0; $i<$num_fields; $i++) {
		echo "<td>" .  $data[$i] . "</td>";
	}
	echo "</tr>";
}
echo "</table><p align=center>";

//��ǹ����ʴ������Ţྨ
echo "˹��: $current_page / $total_pages <br />";

$page_range = 5;
$qry_string = "";	//㹷��������� query string

//���ҧ�ԧ����������§�����ҧྨ �����¡�ѧ��ѹ�������� include file
$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string);

//�ʴ��ԧ�������Ѻ��
echo $page_str;

mysql_close();
?>
</body>
</html>