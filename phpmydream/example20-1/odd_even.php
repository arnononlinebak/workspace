<?php
$num = $_GET['num'];

$result = "";
if(!is_numeric($num)) {
	$result = "ค่าที่ใส่ไม่ใช่ตัวเลข";
}
else if($num%2 == 0) {
	$result = "$num เป็นเลขคู่";
}
else {
	$result = "$num เป็นเลขคี่";
}

//เนื่องจากผลลัพธ์ที่จะส่งกลับมีอักขระภาษาไทยด้วย จึงต้องกำหนด charset เป็น tis-620
header("Content-Type:text/plain; charset=tis-620");
echo $result;
?>