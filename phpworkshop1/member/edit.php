<?
include "chksession.php";
include "function.php";

include "connect.php";
$sql="select * from tb_member where username='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$username=$record[username];
$name=$record[name];
$sex=$record[sex];
$email=$record[email];
$telephone=$record[telephone];
$address=$record[address];
$reg_date=$record[reg_date];

mysql_close();
?>
<HTML>
<HEAD><TITLE>Member ระบบสมาชิก</TITLE></HEAD>
<BODY>
<h1>:: Edit Member ::</h1>
<FORM METHOD="POST" ACTION="edit2.php">
  <TABLE CELLSPACING="2">
    <TR> 
      <TD><B>Username : </B></TD><TD><?=$username?></TD>
    </TR>
    <TR> 
      <TD><B>ชื่อ - สกุล : </B></TD><TD><?=$name?></TD>
    </TR>
    <TR> 
      <TD><B>เพศ : </B></TD><TD><?=$sex?></TD>
    </TR>
    <TR> 
      <TD><B>อีเมล : </B></TD>
      <TD><INPUT NAME="email_edit" TYPE="text" VALUE="<?=$email?>" SIZE="26"> * </TD>
    </TR>
    <TR> 
      <TD><B>โทรศัพท์ : </B></TD>
      <TD><INPUT NAME="tel_edit" TYPE="text" VALUE="<?=$telephone?>" SIZE="26"></TD>
    </TR>
    <TR> 
      <TD VALIGN="top"><B>ที่อยู่ติดต่อ :</B></TD>
      <TD><TEXTAREA NAME="address_edit" COLS="35" ROWS="3"><?=$address?></TEXTAREA></TD>
    </TR>
    <TR>
      <TD><B>สมัครเมื่อ :</B></TD>
      <TD><?=displaydate($reg_date)?></TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><INPUT TYPE="Submit" VALUE="Submit"> <INPUT TYPE="Reset" VALUE="Reset"></TD>
    </TR>
  </TABLE>
</FORM>
[ <a href="main.php">กลับหน้าหลัก</a> ] 
</BODY>
</HTML>