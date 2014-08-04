<?
session_start();
if ($_SESSION[sess_userid]<>session_id()) { 
	header( "Location: admin.php"); exit(); 
}

$id_edit=$_POST[id_edit];
$title=$_POST[title];
$detail=$_POST[detail];

include "connect.php";
$sql="update tb_blog set  title_blog='$title',detail_blog='$detail' where id_blog='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>á¡éä¢ Blog àÃÕÂºÃéÍÂáÅéÇ¤ÃÑº</h3>";
	echo "[ <a href=blog_main.php>¡ÅÑºË¹éÒËÅÑ¡</a> ] ";
} else {
	echo "<h3>äÁèÊÒÁÒÃ¶á¡éä¢¢éÍÁÙÅä´é</h3>";
}
mysql_close();
?>