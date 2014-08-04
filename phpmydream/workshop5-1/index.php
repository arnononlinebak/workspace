<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 5-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
function get_microtime() {
	$mt = explode(" ", microtime());
	return $mt[0] + $mt[1];
}
//-------------------------------------------------

$time_start = get_microtime();

$keep_track = true;
while($keep_track) {
	$rand = rand();
	if($rand == 9999) {
		$keep_track = false;
		
	}
}

$time_end = get_microtime();

$difftime = $time_end - $time_start;
$time = round($difftime, 4);

echo "ใช้เวลาในการสุ่ม $time วินาที";
?>
</body>
</html>
่