<?php
function get_microtime() {
	$mt = explode(" ", microtime());
	return floatval($mt[0]) + floatval($mt[1]);
}

$conn = @mysql_connect("localhost", "root", "leaf")
			or die("Connect Error!");

mysql_query("USE phpmysql;");

$sql = "";
if(isset($_POST['sql'])) {

	$sql = stripslashes($_POST['sql']);
	$cmd_type = $_POST['cmd_type'];
	
	$time_start = get_microtime();
	$result = mysql_query($sql);
	$time_end = get_microtime();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title></title>
</head>

<body>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label>
  <br />
  <textarea name="sql" cols="70" rows="5" id="sql"><?php echo $sql; ?></textarea>
  </label>
  <p>
  ประเภทคำสั่ง: 
  <input type="radio" name="cmd_type"  value="select" checked="checked" />
  เลือกข้อมูล
  
  &nbsp;&nbsp;
  <input type="radio" name="cmd_type"  value="modify" />
  เปลี่ยนแปลงข้อมูล

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="Submit" value="ตกลง >>" />

</form>
<p>

<?php

if(!$result) {
	echo mysql_error();
}	
else {
	if($cmd_type=="select") {
		echo mysql_num_rows($result) . " row(s) in set";
	}
	else {
		echo "Query OK, " . mysql_affected_rows() . " row(s) affected";
	}
	$difftime = $time_end - $time_start;
	$time = round($difftime, 5);
	echo " (" . $time . " sec)";
}

if($cmd_type=="select" && $result && mysql_num_rows($result) > 0) {

?>
<table border="1" cellpadding="5" cellspacing="0">
<tr bgcolor="#CCCCCC">
<?php

	$num_fields = mysql_num_fields($result);
	for($i=0; $i<$num_fields; $i++) {
		echo "<td><b>" . mysql_field_name($result, $i) . "</b></td>";
	}
	
?>
</tr>
<?php

	while($data = mysql_fetch_array($result)) {
	
		echo  "<tr valign=top>";
		for($i=0; $i<$num_fields; $i++) {
			echo "<td>" .  $data[$i] . "</td>";
		}
		echo "</tr>";
		
	}
?>
</table>

<?php
	
}  //end if

mysql_close($conn);

?>

</body>
</html>
