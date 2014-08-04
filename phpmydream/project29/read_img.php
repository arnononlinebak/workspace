<?php
include("dbconn.inc.php");

$item_id = $_GET['item_id'];

$sql = "SELECT type, content FROM img WHERE item_id = $item_id;";
$result = mysql_query($sql);

$type = mysql_result($result, 0, "type");
$content = mysql_result($result, 0, "content");

header("content-type: $type");
echo $content;
?>