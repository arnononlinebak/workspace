<?
$filename="poll.txt";
$fp=fopen($filename,"r");
$get_poll=fread($fp,filesize($filename));
fclose($fp);
$data_poll=explode("-",$get_poll);

$total=array_sum($data_poll);

$data_poll[0]=round(($data_poll[0]/$total)*100,2);
$data_poll[1]=round(($data_poll[1]/$total)*100,2);
$data_poll[2]=round(($data_poll[2]/$total)*100,2);
$data_poll[3]=round(($data_poll[3]/$total)*100,2);

$width_bar0=$data_poll[0]*3;
$width_bar1=$data_poll[1]*3;
$width_bar2=$data_poll[2]*3;
$width_bar3=$data_poll[3]*3;

echo "<h4>จังหวัดไหนน่าเที่ยวมากที่สุด</h4>";
echo "
<TABLE>
<TR>
	<TD>เชียงใหม่</TD>
	<TD><IMG SRC='bar.gif' WIDTH='$width_bar0' HEIGHT='15' > $data_poll[0] %</TD>
</TR>
<TR>
	<TD>กาญจนบุรี</TD>
	<TD><IMG SRC='bar.gif' WIDTH='$width_bar1' HEIGHT='15' > $data_poll[1] %</TD>
</TR>
<TR>
	<TD>ภูเก็ต</TD>
	<TD><IMG SRC='bar.gif' WIDTH='$width_bar2 ' HEIGHT='15' > $data_poll[2] %</TD>
</TR>
<TR>
	<TD>กระบี่</TD>
	<TD> <IMG SRC='bar.gif' WIDTH='$width_bar3' HEIGHT='15' > $data_poll[3] %</TD>
</TR>
</TABLE><BR>	";
echo "จำนวนผู้โหวตทั้งหมด $total คน";
?>
