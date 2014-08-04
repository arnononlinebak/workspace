<?php
class Total {
const AA = 123;
public $price = 100;

function subtotal($quantity) {
	echo Total::AA;
 	$st = $quantity * $this->price;
 	return $st;
}
}
?>

<html>
<body>
<?php
	
	$t = new Total();
	$subtotal = $t->subtotal(10);
	echo "Price:Default => Sub Total is $subtotal";
	
	$t->price = 200;
	$subtotal = $t->subtotal(10);
	echo "<br>";
	echo "Price:200 => Sub Total is $subtotal";
?>
</body>
</html>
