<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 13-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function end_page() {
	echo "</body></html>";
	exit;
}

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
@mysql_select_db("phpmysql") or die(mysql_error());

$sql = "SELECT * FROM people;";
$result = mysql_query($sql);

//��ҹ������� result set ���ʴ��Ẻ���ҧ HTML
echo "<a href=\"form.php?action=insert\">����������</a>";
echo "<table border=1 cellpadding=3>";

//��ǹ����繿�Ŵ�
echo "<tr bgcolor=\"#CCCCCC\">"; 
$num_fields = mysql_num_fields($result);
echo "<th>action</th>";
for($i=0; $i<$num_fields; $i++) {
	echo "<th>" . mysql_field_name($result, $i) . "</th>";
}
echo "</tr>";

//��ǹ����繢�����
while($data = mysql_fetch_array($result)) {
	echo  "<tr valign=top>";
	echo "<td>
				<a href=\"form.php?action=update&id={$data['id']}\">���</a> |
				<a href=\"form.php?action=delete&id={$data['id']}\">ź</a>
			</td>";
	for($i=0; $i<$num_fields; $i++) {
		echo "<td>" .  $data[$i] . "</td>";
	}
	echo "</tr>";
}

echo "</table>";
mysql_close();
?>
</body>
</html>