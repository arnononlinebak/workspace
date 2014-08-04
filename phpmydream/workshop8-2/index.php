<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 8-2: Index</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
require("../inc/validate.inc.php");

$email = $_POST['email'];
if(!is_valid_email($email)) {
	//
}

$rudes = check_rude_words($_POST['msg']);
if(count($rudes) > 0) {
	//
}

$msg = link_in_str(valid_html_str($_POST['msg']));

?>
</body>
</html>
