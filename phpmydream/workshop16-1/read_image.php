<?php
@mysql_connect("localhost", "root", "leaf")  or die(mysql_error());
mysql_select_db("phpmysql");

$id = $_GET['id'];
$sql = "SELECT type, content FROM uploadfile WHERE id = $id;";
$result = mysql_query($sql);

$type = mysql_result($result, 0, "type");
$content = mysql_result($result, 0, "content");

header("Content-type: $type");
echo $content;
?>