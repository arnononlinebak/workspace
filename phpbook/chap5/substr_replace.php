<html>
<body>
<?php
 	$str = "กินอย่างหมู อยู่อย่างหมา";
	$a = array('หมู'=>"สุกร", 'หมา'=>"สุนัข");
	$s = strtr($str, $a);
	echo $s; // echo สวัสดี, ประเทศไทย
?>

</body>
</html>
