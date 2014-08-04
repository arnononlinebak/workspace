<html>
<body>
<center>
<?php
	for($i = 1; $i <= 7; $i++) {
		say_hello($i);
	}
?>

<?php
function say_hello($size) {
	echo "<font size=$size>Hello</font><br>";
}
?>
</center>
</body>
</html>
