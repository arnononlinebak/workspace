<!DOCTYPE HTML>
<?
session_start();
if ($_SESSION[sess_userid]<>session_id()) { 
	header( "Location: admin.php"); exit(); 
}
$id_edit=$_GET[id_edit];

include "function.php";
include "connect.php";
$sql="select * from tb_blog where id_blog='$id_edit'";
$result=mysql_db_query($dbname,$sql);
$r=mysql_fetch_array($result);
$id_blog=$r[id_blog];
$title_blog=$r[title_blog];
$detail_blog=$r[detail_blog];
$date_blog=displaydate($r[date_blog]);
$time_blog=$r[time_blog];
?>
<html>
<HEAD><TITLE>My Blog á¡éä¢</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>
<BODY>
<h1>:: My Blog Edit ::</h1>
<FORM method="post" action="blog_edit2.php">
  <TABLE cellspacing="2">
    <TR> 
      <TD><B>ชื่อเรื่อง : </B></TD>
      <TD><INPUT name="title" type="text" value="<?=$title_blog?>" size="50"> * </TD>
    </TR>
    <TR>
      <TD valign="top"><B>วัน-เวลา :</B></TD>
      <TD><? echo "$date_blog $time_blog";?></TD>
    </TR>
    <TR> 
      <TD valign="top"><B>เนื้อหา :</B></TD>
      <TD><TEXTAREA name="detail" cols="55" rows="8" ><?=$detail_blog?></TEXTAREA></TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><INPUT type="submit" value="Submit"> <INPUT type="reset" value="Reset">
        <INPUT name="id_edit" type="hidden" value="<?=$id_edit?>"></TD>
    </TR>
  </TABLE>
</FORM>
[ <a href="blog_main.php">กลับไปหน้าแรก</a> ] 
</BODY>
</html>