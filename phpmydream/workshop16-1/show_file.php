<?php
@mysql_connect("localhost", "root", "leaf")  or die(mysql_error());
mysql_select_db("phpmysql");

$id = $_GET['id'];
$sql = "SELECT * FROM uploadfile WHERE id = $id;";
$result = mysql_query($sql);

$type = mysql_result($result, 0, "type");
$pat_img = "^(image)";
$pat_swf = "(flash)$";

//�������誹Դ�ٻ�Ҿ ����������ô�ǹ���Ŵ
if(!eregi($pat_img, $type) && !eregi($pat_swf, $type)) {
	$name = mysql_result($result, 0, "name");
 	$size = mysql_result($result, 0, "size");
	$type = mysql_result($result, 0, "type");
 	$content = mysql_result($result, 0, "content");

	header("Content-Type: $type");
	header("Content-Length: $size"); 
	header("Content-Disposition: attachment; filename=$name"); 
 	
 	echo $content;
	exit();
}

//������ٻ�Ҿ����ʴ����Ẻ���ྨ
echo "<html><body>";

if(eregi($pat_img, $type)) {
	echo "<img src=\"read_image.php?id=$id\" />";
}
else if(eregi($pat_swf, $type)) {
	echo  "<object width=468 height=60>
	 			<param name=movie value=\"read_image.php?id=$id\" />
	 			<embed width=468 height=60 src=\"read_image.php?id=$id\"></embed>
 			 </object>";
}

echo "</body></html>";
?>