<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>AJAX Calendar</title>
<link rel="stylesheet" href="../css/style.css"  />
<style>
	.sun { color: red; }
	.sat { color: #bbbbbb; }
	.gen {color: black; }
</style>
<script src="../ajax/framework.js"></script>
<script>
function ajaxCalendar(time) {
	var data = "time=" + time;
	var url = "calendar_ajax.php";
	
	ajaxLoad('get', url, data, 'calendar');
}
</script>
</head>
<body>
<table width="500">
<tr valign="top">
	<td id=calendar><script> ajaxCalendar(''); </script></td>
	<td>เพจนี้โหลดเมื่อ: <?php echo date('j F Y G:i:s'); ?></td>
</tr>
</table>
</body>
</html>
