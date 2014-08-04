<html>
<body>
<?php
static $x = 10;
function keep_track() {
	static $static_var = 10;
	$non_static = 10;
	$static_var++;
	$non_static++;
	echo "\$static_var = $static_var" . "<br>";
	echo "\$non_static = $non_static" . "<br>";	
	global $x;
	echo ++$x;
}
?>

<?php
	for($i = 1; $i <= 4; $i++) {
		echo "<b>เรียกฟังก์ชันเพื่อเพิ่มค่าตัวแปรครั้งที่  #$i</b><br>";
		keep_track();
		echo "<p>";
	}
?>
</body>
</html>
