<?
session_start();
if ($_SESSION[sess_userid]<>session_id()) { 
	header( "Location: admin.php"); exit(); 
}
include "function.php";
$date_today=date("Y-m-d");
$date_today=displaydate($date_today);
$time_today=date("H:i:s");
?>
<HTML>
<HEAD><TITLE>à¾ÔèÁ Blog ãËÁè</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</HEAD>
<BODY>
<h1>เพิ่มบทความ</h1>
<FORM METHOD="POST" ACTION="blog_add2.php">
  <TABLE CELLSPACING="2">
    <TR> 
      <TD><B>ชื่อเรื่อง : </B></TD>
      <TD><INPUT NAME="title" TYPE="text" SIZE="50"> *</TD>
    </TR>
    <TR> 
      <TD><B>วัน-เวลา : </B></TD>
      <TD><? echo "$date_today $time_today"; ?></TD>
    </TR>
    <TR> 
      <TD VALIGN="top"><B>เนื้อหา :</B></TD>
      <TD><TEXTAREA NAME="detail" COLS="55" ROWS="8"></TEXTAREA></TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><INPUT TYPE="Submit" VALUE="Submit"> <INPUT TYPE="Reset" VALUE="Reset"> </TD>
    </TR>
  </TABLE>
</FORM>
[ <a href="blog_main.php">กลับไปหน้าแรก</a> ] 
</BODY>
</HTML>