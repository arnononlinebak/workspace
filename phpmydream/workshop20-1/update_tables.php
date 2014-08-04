<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());

$db = $_GET['database'];
$tbs = mysql_list_tables($db);

//คำสั่งจาวาสคริปต์สำหรับลบ Option เดิม โดยเรียกฟังก์ชัน removeOption() ซึ่งสร้างไว้ที่เพจ index.php
$js = "removeOption();";

if(mysql_num_rows($tbs)==0) {		//ถ้าฐานข้อมูลนั้นไม่มีตารางอยู่เลย
	$js .= "
		var opt = new Option('', '');
		document.getElementById('table').options[0] = opt;
	";
}
else {
	$i = 0;
	while(list($tb) = mysql_fetch_row($tbs)) {
		//คำสั่งจาวาสคริปตสำหรับสร้างและเพิ่ม Option ใหม่จนครบทุกตัว
		$js .= "
			var opt = new Option('$tb', '$tb');
			document.getElementById('table').options[$i] = opt;
		";
		$i++;
	}
}

header("Content-Type:text/javascript; charset=tis-620");
echo $js;
?>