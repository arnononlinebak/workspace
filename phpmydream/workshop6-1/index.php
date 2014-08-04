<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 6-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$content = file_get_contents("counter.txt");		//อ่านจำนวนเดิมที่เก็บไว้ในไฟล์

$count = intval($content) + 1;		//เพิ่มค่าจากเดิมไปอีก 1

//สำหรับรูปแบบการแสดงตัวนับ ในที่นี้จะแสดงเป็นเลข 7 หลัก
//แต่หากเลขมีไม่ครบ 7 หลักให้เติมเลข 0 ไปข้างหน้าให้ครบ 7 
$visitor = str_pad($count, 7, "0", PAD_LEFT);

echo "<p align=center>ท่านคือผู้เยี่ยมชมลำดับที่: $visitor </p>";

//ขั้นตอนต่อไปเป็นการอัปเดตตัวนับเดิมที่เก็บไว้ในไฟล์
//โดยเปิดไฟล์แล้วนำจำนวนใหม่เขียนทับจำนวนเดิม
$f = fopen("counter.txt", "w"); 

fwrite($f, $count);
fclose($f);
?>
</body>
</html>
