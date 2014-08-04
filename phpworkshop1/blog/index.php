<!DOCTYPE HTML>
<html>
<head><title>My Blog </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>:: My Blog  ::</h1>
<table width="100%">
  <tr valign="top">
    <td width="4%"> 
      <? include "calendar.php";?>
    </td>
    <td width="96%">
<?
$sql="select * from tb_blog where date_blog='$year-$month-$day' ";
$result=mysql_db_query($dbname,$sql);
$number=mysql_num_rows($result);

if ($number<=0) {
	$sql="select * from tb_blog  order by id_blog desc";
	$result=mysql_db_query($dbname,$sql);
}
$r=mysql_fetch_array($result);
$id_blog=$r[id_blog];
$title_blog=$r[title_blog];
$detail_blog=nl2br(htmlspecialchars($r[detail_blog]));
$date_blog=displaydate($r[date_blog]);
$time_blog=$r[time_blog];
?>
<table width="100%">
        <tr> 
          <td bgcolor="#D7D7D7"><b><?=$title_blog?></b><br>
            วัน-เวลา<? echo " $date_blog $time_blog" ?></b> </td>
        </tr>
        <tr> 
          <td height="100" valign="top" bgcolor="#F3F3F3"><?=$detail_blog?></td>
        </tr>
      </table>
      <hr>
      <b>Comments :</b> <br>
      <hr> 
      <form action="comment.php" method="post">
        <table width="100%">
          <tr> 
            <td width="23%" valign="top"><strong>ชื่อ :</strong></td>
            <td width="77%"><input name="name" type="text" size="35"></td>
          </tr>
          <tr> 
            <td valign="top"><strong>แสดงความคิดเห็น : </strong></td>
            <td><textarea name="detail" cols="40" rows="5" ></textarea></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input type="submit" value="Submit"> <input type="reset" value="Reset">
              <input name="day" type="hidden" value="<?=$day?>">
              <input name="month" type="hidden" value="<?=$month?>">
              <input name="year" type="hidden"  value="<?=$year?>">
              <input name="id_blog" type="hidden"  value="<?=$id_blog?>"> </td>
          </tr>
        </table>
      </form>
<?
$sql_comm="select * from tb_comment where ref_id_blog='$id_blog' ";
$result_comm=mysql_db_query($dbname,$sql_comm);
while ($r=mysql_fetch_array($result_comm)) {
	$name_comment=$r[name_comment];
	$detail_comment=nl2br(htmlspecialchars($r[detail_comment]));
	$date_comment=displaydate($r[date_comment]);
	$time_comment=$r[time_comment];

	echo "
      <table width=\"100%\">
        <tr>
          <td height=\"50\" valign=\"top\" bgcolor=\"#F3F3F3\"> $detail_comment
            <p>¨Ò¡ : $name_comment<br>
              àÁ×èÍ : $date_comment $time_comment</p></td>
        </tr>
      </table><br>";
}
?>
</td>
  </tr>
</table>
</body>
</html>