<html>
<body>
<?php
	define("VAT", 7);
	define("PRICE", 100);

	if(defined("VAT") && defined("PRICE")) {
		$q = 10;
		$pay = constant("PRICE") * $q * (1 + VAT/100);
		echo "�����Թ��Ҩӹǹ $q ��� ��ҤҪ���� " . PRICE . " �ҷ ";
		echo "�е�ͧ�����Թ $pay �ҷ";
	}
?>
</body>
</html>
