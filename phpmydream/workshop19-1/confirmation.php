<?php
if(!$_GET['e'] || !$_GET['c']) {
	exit;
}

$email = $_GET['e'];
$confirmation = $_GET['c'];

@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");
	
$sql = "UPDATE member SET confirmation = ''
	 		WHERE email = '$email' AND confirmation = '$confirmation';";

$qry = mysql_query($sql);
if(!$qry) {
	die("����׹�ѹ�Դ��Ҵ!");
}
else {
	header("Refresh: 3; url=index.php");   // ��Ѻ价��˹����ѡ
	echo "����׹�ѹ�������º���� �С�Ѻ���˹����ѡ� 3 �Թҷ�";
}
?>
