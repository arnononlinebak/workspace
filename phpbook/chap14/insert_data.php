<html>
<body>
<?php
	$name = addslashes($_POST['name']);
	$gender = addslashes($_POST['gender']);
	$position = addslashes($_POST['position']);
	$salary = addslashes($_POST['salary']);
	$birth = addslashes($_POST['year']) . "-";
	$birth .= addslashes($_POST['month']) . "-";
	$birth .= addslashes($_POST['date']);
	$address = addslashes($_POST['address']);

	$sql = "INSERT INTO employee VALUES(";
	$sql .= "0, '$name', '$gender', '$position', $salary, '$birth', '$address'";
	$sql .= ");";
	
	$conn = mysql_connect("localhost", "root", "123");
	if(!$conn) {
		echo "�������ö�������͡Ѻ�ҹ��������";
	}
	mysql_query("USE dbx;");
	$qry = mysql_query($sql);
	if(!$qry) {
		echo "�������ö������������";
	}
	else {
		echo "�����Ŷ١����ŧ㹵��ҧ����";
	}
	
	mysql_close($conn);
?>
<p>
<input type="button" value="Insert Next Row" 
 	onclick="window.location='insert_data.html'">
</body>
</html>
