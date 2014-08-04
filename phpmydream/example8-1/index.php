<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 8-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$rudes = array("xxx", "yyy", "zzz");
$msg = "I want zzz but she needs xxx!";
$a = array();
foreach($rudes as $r) {
	//แพทเทิร์นคำที่ไม่เหมาะสม โดยจะมีอักขระใดๆ้ก่อนและหลังคำกี่ตัวก็ได้
	$pattern = ".*$r.*";
	if(eregi($pattern, $msg)) {
		//ถ้าพบ ให้เก็บไว้ในอาร์เรย์
		array_push($a, $r);
	}
}

if(count($a) > 0) {
	//รวมอาร์เรย์เป็นสตริงเดียวกันโดยคั่นด้วย <br /> เพื่อให้ขึ้นบรรทัดใหม่
	$str = implode("<br />", $a);
	echo "พบการใช้คำที่ไม่เหมาะสมดังต่อไปนี้: <br />";
	echo $str;
}
?>
</body>
</html>