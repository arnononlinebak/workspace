<?php
include("ecard.inc.php");
my_connect();

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM card WHERE id = $id;");
$type = mysql_result($result, 0, "type");
$content = mysql_result($result, 0, "content");

header("Content-type: $type");
echo $content;
?>