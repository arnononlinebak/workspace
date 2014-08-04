<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 4-5</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<table border=1>
<?php
foreach($_SERVER as $key => $value) {
		echo "<tr valign=top>
 	 	 	<td>\$_SERVER['$key']</td>
 	 	 	<td>$value</td>
 	 	  </tr>";
}
?>
</table>
</body>
</html>
