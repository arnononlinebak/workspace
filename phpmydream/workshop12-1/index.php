<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 12-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$sql = "";
$db = "";
if($_POST) {
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

//���������� Postback �������ش��÷ӧҹ�ͧྨ
if(!isset($_POST['sql'])) {
	end_page();
}

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
@mysql_select_db("$db") or die(mysql_error());

$result = mysql_query($sql);

//����Դ��ͼԴ��Ҵ㹷ء�ó�����ʴ���ͼԴ��Ҵ�����ش��÷ӧҹ
if(!$result) {
	echo mysql_error();
	end_page();
}

//��Ң����Ũӹǹ����������Ţ �ʴ�����繤���觻������������¹�ŧ������
if(!is_numeric(@mysql_num_rows($result))) {
	//����繤���觡������¹�ŧ����� ����ʴ��繨ӹǹ�Ƿ���Դ�������¹�ŧ
	$affected_rows = 0;
	if(is_numeric(@mysql_affected_rows())) {	
		$affected_rows = mysql_affected_rows();
	}
	echo "Query OK, " . $affected_rows . " row(s) affected";
	end_page();
}

//��Ҩӹǹ���繵���Ţ �ʴ�����繤���觡�����͡������ ����ʴ��ӹǹ�Ǽ��Ѿ���͹
echo "Query OK, " . mysql_num_rows($result) . " row(s) in set";
if(mysql_num_rows($result) == 0) {
	end_page();
}

//��ҹ������� result set ���ʴ��Ẻ���ҧ HTML
echo "<table border=1 cellpadding=3>";

//��ҹ���Ϳ�Ŵ����ʴ�����ǹ��Ǣͧ���ҧ
echo "<tr bgcolor=#CCC>"; 

$num_fields = mysql_num_fields($result);
for($i = 0; $i < $num_fields; $i++) {
	echo "<th>" . mysql_field_name($result, $i) . "</th>";
}
echo "</tr>";

//��ǹ����繢�����
while($data = mysql_fetch_array($result)) {
	echo  "<tr valign=top>";
	for($i = 0; $i < $num_fields; $i++) {
		echo "<td>" .  $data[$i] . "</td>";
	}
	echo "</tr>";
}

echo "</table>";
?>
</body>
</html>