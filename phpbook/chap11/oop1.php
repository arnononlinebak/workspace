<?php
class FirstClass {
public $price = 100;
function say_hello() {
	echo "Hello ";
}

function say_anything($message) {
	echo $this->price;
}

} // end class
?>

<html>
<body>
<?php
	$fc = new FirstClass();
	
	$fc->say_hello();
	$fc->say_anything("OOP!");
?>
</body>
</html>
