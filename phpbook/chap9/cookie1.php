<html>
<body>
<?php
	$expire = time() + 60; 	

	$name = "customer";
	$value = "Bill Laden";
	if(!setcookie($name, $value, $expire)) {
		echo "Can't create cookie \"customer\"<br>";
	}

	$name = "cust_address";
	$value = "Asian Wall Street";
	if(!setcookie($name, $value, $expire)) {
		echo "Can't create cookie \"address\"<br>";
	}
	
	if(isset($_COOKIE['customer']) && isset($_COOKIE['cust_address'])) {
		echo "customer: " . $_COOKIE['customer'] . "<br>";
		echo "address: " . $_COOKIE['cust_address'];
	}
	else {
		echo "No Cookie";
	}
?>
</body>
</html>
