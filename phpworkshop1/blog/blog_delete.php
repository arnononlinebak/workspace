<?
session_start();
if ($_SESSION[sess_userid]<>session_id()) { 
	header( "Location: admin.php"); exit(); 
}
$id_del=$_GET[id_del];

include "connect.php";
$sql="delete from tb_blog where id_blog='$id_del' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Åº Blog ÍÍ¡¨Ò¡ÃÐººàÃÕÂºÃéÍÂáÅéÇ</h3>";
	echo "[ <a href=blog_main.php>¡ÅÑºË¹éÒËÅÑ¡</a> ] ";
} else {
	echo "<h3>äÁèÊÒÁÒÃ¶Åº¢éÍÁÙÅä´é¤ÃÑº</h3>";
}
mysql_close();
?>