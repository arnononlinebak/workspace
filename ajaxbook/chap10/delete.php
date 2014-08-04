<!DOCTYPE HTML>
<html>
<head>
<script src="/ajaxbook/ajax_framework.js"> </script>
<script>
function deleteData(id) {
	var URL = "delete_ss.php";

	var data = "id=" + id;

	ajaxLoad('post', URL, data, '');
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
	$dblink = mysql_connect("localhost", "root", "123");
	mysql_query("USE ajax;");

	$sql = "SELECT * FROM books ";
	$result = mysql_query($sql);
?>

<table border="1" cellpadding="5">
<tr bgcolor="#dddddd"><th>ª×èÍË¹Ñ§Ê×Í</th><th>¼Ùéà¢ÕÂ¹</th><th>ÃÒ¤Ò</th><th>Åº</th></tr>
<?php
	while($p = mysql_fetch_array($result)) {

echo <<<TBODY

	<tr id="{$p['id']}">
		<td>{$p['title']}</td>
		<td>{$p['author']}</td>
		<td>{$p['price']}</td>
		<td><button onclick="deleteData({$p['id']})">Åº</td>
	</tr>
TBODY;

	} //end while
?>
</table>

<?php mysql_close($dblink); ?>

</body>
</html>