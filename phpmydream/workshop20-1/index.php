<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 20-1</title>
<link rel="stylesheet" href="../css/style.css"  />
<script src="../ajax/framework.js"> </script>
<script>
function ajaxCall() { 
	var data = getFormData("form1");
	var URL = "update_tables.php";
	ajaxLoad('get', URL, data, null);
}
function removeOption() {
	var el = document.getElementById('table');
	while(el.length>0) {
		el.options[0] = null;
	}
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<table border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td>ฐานข้อมูล: </td>
    <td>
<select id="database" name="database" onchange="ajaxCall()">
<?php
	@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
  
 	$dbs = mysql_list_dbs();
 	while(list($db) = mysql_fetch_row($dbs)) {
	 	echo "<option value=$db>$db</option>";
 	}
?>
</select>
	</td>
  </tr>
  <tr>
    <td>ตาราง: </td>
    <td><select id="table" name="table">
      <option>*</option>
                </select></td>
  </tr>
</table>
</form>
<script> ajaxCall(); </script>
</body>
</html>

