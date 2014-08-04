<?php
	header("content-type:text/plain; charset=tis-620");

	$dblink = mysql_connect("localhost", "root", "123");
	mysql_query("USE ajax;");

	$q = iconv('utf-8', 'tis-620', $_GET['q']);
	$kw = addslashes($q);

	$sql = "SELECT * FROM books ";
	$sql .= "WHERE title LIKE '%$kw%';";

	$result = mysql_query($sql);
	if(!$result) {
		echo "äÁèÊÒÁÒÃ¶Ê×º¤é¹¢éÍÁÙÅä´é! $sql";
		mysql_close($dblink);
		exit();
	}

$response = <<<RES
	¼Å¡ÒÃÊ×º¤é¹ $kw
 	<table border=1 cellpadding=5>
	<tr bgcolor="#dddddd">
	<th>ÃËÑÊ</th><th>ª×èÍË¹Ñ§Ê×Í</th><th>¼Ùéà¢ÕÂ¹</th><th>ÃÒ¤Ò</th></tr>
RES;

	while($p = mysql_fetch_array($result)) {

$tbody = <<<TBODY

	<tr><td>{$p['id']}</td>
	<td>{$p['title']}</td>
	<td>{$p['author']}</td>
	<td>{$p['price']}</td></tr>

TBODY;
	$response .= $tbody;

	}  //end block while

	$response .= "</table>";
	
	if(mysql_num_rows($result)==0) {
		$response = "äÁè¾º¢éÍÁÙÅÊÔ¹¤éÒ \"$kw\"";
	}

	mysql_close($dblink);

	echo $response;
?>
	