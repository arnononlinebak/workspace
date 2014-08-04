<html>
<body>
<?php
	define("VAT", 7);
	define("PRICE", 100);

	if(defined("VAT") && defined("PRICE")) {
		$q = 10;
		$pay = constant("PRICE") * $q * (1 + VAT/100);
		echo "ซื้อสินค้าจำนวน $q ชิ้น ในราคาชิ้นละ " . PRICE . " บาท ";
		echo "จะต้องจ่ายเงิน $pay บาท";
	}
?>
</body>
</html>
