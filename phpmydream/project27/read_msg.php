<?php
include("chatroom.inc.php");
my_connect();

//��ҹ 10 ��ͤ�������ش�����§������ҷ���ʵ������	
$sql = "SELECT *, TIME(post_time) AS pst FROM message
	 	  ORDER BY post_time DESC LIMIT 10;";
$result = mysql_query($sql);
$num_msg = mysql_num_rows($result);

//��ǹ�ç��ҧ�ͧ���ҧ��ͤ��������觡�Ѻ��ʴ���
$response = "<table width=520>
	 	 		<tr>
		 	 		<td width=40></td><td width=100></td>
		 	 		<td width=10></td><td width=370></td>
	 	 		</tr>";

//��ҹ�ҡ���ش���¢ͧ���Ѿ����͹��Ѻ���ѧ���á ����˵ؼŷ��������������
for($i = ($num_msg - 1); $i >= 0; $i--) {
	$m = mysql_result($result, $i, "msg");
	$color = mysql_result($result, $i, "color");
	$message = "<font color=$color>$m</font>";

	$time = mysql_result($result, $i, "pst");
	$n = mysql_result($result, $i, "name");
	$name = "<font color=$color>$n</font>";	
	
	$response .= "<tr valign=top>
		 	 	 		<td>$time</td><td align=right>$name</td>
 			 	 		<td>:</td><td>$message</td>
	 		  	   </tr>";
} 
$response .= "</table>";

header("Content-Type: text/plain; charset=tis-620");
echo $response;
?>