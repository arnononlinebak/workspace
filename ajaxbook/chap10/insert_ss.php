<?php
	header("content-type:text/javascript; charset=tis-620");

	$tt = iconv('utf-8', 'tis-620', $_POST['tt']); 
	$title = addslashes($tt);   					
	
	$au = iconv('utf-8', 'tis-620', $_POST['au']); 
	$author = addslashes($au);    				
	
	$price = $_POST['pc'];

$sql = <<<SQL

	INSERT INTO books VALUES
	('', '$title', '$author', $price);

SQL;

	$dblink = mysql_connect("localhost", "root", "123");
	mysql_query("USE ajax;");

	mysql_query($sql);

	$msg = "";
	$resetForm = "";
 	if(mysql_affected_rows($dblink)==0) {
		$msg = "<font color=red>";
 		$msg .= "à¡Ô´¢éÍ¼Ô´¾ÅÒ´ äÁèÊÒÁÒÃ¶¨Ñ´à¡çº¢éÍÁÙÅä´é</font>";
	}
	else {
		$msg = "¢éÍÁÙÅ¶Ù¡¨Ñ´à¡çºáÅéÇ ¡ÃØ³ÒãÊè¢éÍÁÙÅÅÓ´Ñº¶Ñ´ä»";
		$resetForm = "document.getElementById('frm').reset();";
	}

	mysql_close($dblink);

echo <<<JS
	var el = document.getElementById('displayDiv');
	el.innerHTML = "$msg";
	$resetForm
JS;

?>
