<HTML>
<HEAD><TITLE> PHOTO GALLERY</TITLE></HEAD>
<BODY>
<h2>ADMIN : PHOTO GALLERY</h2>
<FORM METHOD=POST ACTION="insert.php" ENCTYPE="multipart/form-data">
  <TABLE>
    <TR> 
      <TD><div align="right">�ٻ�Ҿ :</div></TD>
      <TD><INPUT TYPE="file" NAME="photo"></TD>
    </TR>
    <TR> 
      <TD valign="top"><div align="right">��͸Ժ���ٻ�Ҿ: </div></TD>
      <TD><TEXTAREA NAME="detail" ROWS="4" COLS="35"></TEXTAREA></TD>
    </TR>
    <TR> 
      <TD>&nbsp;</TD>
      <TD><input name="submit" type="submit" value="Submit"> 
	  <input name="reset" type="reset" value="Reset"> 
      </TD>
    </TR>
  </TABLE>
</FORM>
<?
$no=0;
include "connect.php";
$sql="select * from tb_photo order by id_photo";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {

	echo "
		
	<TABLE BORDER=1 >
  <TR bgcolor=#EEEEEE> 
    <TD><strong>�ӴѺ</strong></TD>
    <TD><strong>��������ٻ�Ҿ</strong></TD>
    <TD><strong>��������´</strong></TD>
    <TD><strong>ź</strong></TD>
  </TR>";

	while ($r=mysql_fetch_array($result)) {
		$id_photo=$r[id_photo];
		$name_photo=$r[name_photo];
		$detail_photo=$r[detail_photo];
		$no++;

		echo " 
		<TR>
		<TD><center>$no</center></TD>
		<TD>$name_photo</TD>
		<TD>$detail_photo</TD>
		<TD><a href='delete.php?id_del=$id_photo&name_del=$name_photo' 
			onclick=\"return confirm('�س��㨷���ź�ٻ $name_photo �͡�ҡ�к�?')\"><img src=\"delete.jpg\" border=0></a> 
			</TD> </TR>"; 
		} // end while 
	} // end if 
  ?> 
</TABLE>
</BODY>
</HTML>