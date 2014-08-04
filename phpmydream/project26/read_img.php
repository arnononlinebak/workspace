<?php
include("blog.inc.php");
my_connect();

$img_id = $_GET['imgid'];

$sql = "SELECT type, content FROM img WHERE img_id = $img_id;";
$result = mysql_query($sql);

$type = mysql_result($result, 0, "type");
$content = mysql_result($result, 0, "content");

header("Content-type: $type");
echo $content;
?>