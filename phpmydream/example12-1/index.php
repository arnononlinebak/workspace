<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874" />
<title>Example 12-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
@mysql_connect("localhost","root","leaf") 
 	or die("Connection Error</body></html>");
	
//����ѧ����հҹ������ ������ҧ����ҡ�͹ ���觤���� SQL �Ẻʵ�ԧ����Ѻ���ҧ�ҹ������
mysql_query("CREATE DATABASE IF NOT EXISTS phpmysql;");
mysql_select_db("phpmysql");		//���͡�ҹ������

//����� SQL ����Ѻ������ҧ���ҧ
$sql_create_tb = "CREATE TABLE people(
							id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
							name VARCHAR(50), 
							address TEXT, 
							email VARCHAR(50), 
							birthday DATE);";

$qry = mysql_query($sql_create_tb);
if(!$qry) {
	echo "������ҧ���ҧ �Դ��ͼԴ��Ҵ <br />";
}
else {
	echo "������ҧ���ҧ �������º���� <br />";
}

//����� SQL ����Ѻ����������ŧ㹵��ҧ ������ٻẺ�������������ѹ������
$sql_insert = "INSERT INTO people VALUES
	 			('0', '�Եê�� �ѭ��', '�ҧ�ع��¹ ��ا෾', 
 					'mitchai_banchar@hotmail.com', '1975-01-31'),

	 			('0', '�ѭ�� ���ѳ��', '�ҡ��� �������', 
 					'sunyasayan@gmail.com', '1978-10-31'),

	 			('0', '�����ǧ �ǧ�ҷԵ��', '�����ҹ ��û��', 
 					'ppsun@gmail.com', '1980-12-12');";
						
$qry = mysql_query($sql_insert);
if(!$qry) {
	echo "������������� �Դ��ͼԴ��Ҵ <br />";
}
else {
	echo "������������� �������º���� <br />";
}
?>
</body>
</html>