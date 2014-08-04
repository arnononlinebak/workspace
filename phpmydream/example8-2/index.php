<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 8-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
$str1 = "Regular Expression หรือ RegEx เป็นวิธีการตรวจสอบข้อมูลที่เริ่มใช้ในภาษา Perl 
 			แต่ปัจจุบันภาษาคอมพิวเตอร์หลายภาษา เช่น PHP, .NET, JavaScript ก็ได้นำรูปแบบของ RegEx ไปใช้ด้วย";

//ค้นหาคำว่า "regex" หรือ "regular expression"
$find_pattern = "(regex)|(regular expression)";

/* \\0 ใช้อ้างถึงสตริงที่ตรงกับทั้งแพทเทิร์น หรือตรงกับทุก Sub Pattern รวมกันนั่นเอง   */
$replace_pattern = "<b>\\0</b>";
$str2 = eregi_replace($find_pattern, $replace_pattern, $str1);
			
echo "<b>สตริงก่อนการแทนที่:</b><br /> $str1
 		<p />
 		<b>สตริงหลังการแทนที่:</b><br /> $str2";
?>
</body>
</html>