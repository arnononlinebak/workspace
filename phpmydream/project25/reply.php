<?php
include("webboard.inc.php");
my_connect();

$topic_id = 0;
$errmsg = "";

//ถ้าเป็นการโพสต์ข้อมูลแสดงความคิดเห็นจากฟอร์มเข้ามา
if($_POST) {
	//ตรวจสอบความถูกต้องของข้อมูล
	foreach($_POST as $k => $v) {
		if(get_magic_quotes_gpc()) {
			$v = stripslashes($v);	
		}
		$v = trim(htmlspecialchars($v)); 		//ป้องกันการใส่แท็ก HTML
		if(empty($v)) {
			$errmsg = "กรุณาใส่ข้อมูลให้่ครบด้วยค่ะ";
			break;
		}
		else if(has_rudeword($v)) {			//ตรวจสอบคำหยาบ
			$errmsg = "ไม่อนุญาตให้ใช้คำที่ไม่เหมาะสมค่ะ";
			break;
		}
		$_POST[$k] = $v;
	}
	
	//ถ้าไม่มีข้อผิดพลาด ให้บันทึกลงในตารางฐานข้อมูล
	if($errmsg == "") {			
		$topic_id = $_POST['topicid'];
		$message = $_POST['message'];
		$message = nl2br($message);
		$name =  $_POST['name'];	
	
		$bgcolor = $_POST['bgcolor'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "INSERT INTO reply VALUES
		 			(0, $topic_id, '$message', '$name', NOW(), '$bgcolor', '$ip');";
					
	 	@mysql_query($sql) or die(mysql_error());
		
		//อัปเดตจำนวนคำตอบในตาราง topic เพิ่มไปอีก 1 ค่า
		$sql = "UPDATE topic SET num_reply = num_reply + 1
			 		WHERE topic_id = $topic_id;";
					
		@mysql_query($sql) or die(mysql_error());
	
		header("Refresh: 3; url=reply.php?topicid=$topic_id");
		echo "<font size=5>การตอบกระทู้เสร็จเรียบร้อย <br />
			 จะกลับไปที่หน้าตอบกระูทู้ใน 3 วินาที</font>";
	}
	else {
 		echo "<font size=5 color=red>$errmsg<p />
				 <a href=\"javascript: history.back()\">ย้อนกลับไปแก้ไข</a></font>";
	}
	exit;
}
else if(isset($_GET['topicid'])) { 	//ถ้าเปิดเพจจากการคลิกลิงค์ที่เพจ index.php เข้ามา
	$topic_id = $_GET['topicid'];
}
else {
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Webboard: Reply</title>
<link rel="stylesheet" href="../css/style.css"  />
<style type="text/css">
        #shadow {background-color:#cccccc; width: 550px;}
        #shadow #msgbox {position: relative; left:-10px; top:-10px; width:100%; border:solid 1px gold;}
		
		#title {font-size:12pt; font-weight:bold; color:yellow; padding:10px; padding-bottom:0px;}		
		#details {padding:10px; font-size:11pt; color:white; border-bottom:dotted 1px #aaaaaa;}
		#replier {color:aqua; padding:5px;}
		#btalert {font-size:7pt;}
</style>
<script src="../ajax/framework.js"> </script>
<script>
function ajaxCall(topicID, replyID) {
	if(!confirm('แจ้งลบ?')) {
		return;
	}
	
	var URL = "alert.php";
	var data = "topicid=" + topicID + "&replyid=" + replyID;
	ajaxLoad("post", URL, data, null);
	window.status = "กำลังส่งข้อมูลการแจ้งลบ...";
}
</script>
</head>
<body bgcolor="#aaaaaa">
<?php include("header.inc.html");	?>
<table align="center" border="0" style="margin-top:1.5em;">
<tr><td colspan="3" align="center">

<?php
$sql = "SELECT *, DATE_FORMAT(date_post, '%d/%m/%Y') AS datepost
	 		FROM topic WHERE topic_id = $topic_id;";
			
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
?>

<div id="shadow" style="width: 600px; text-align: left">
 <table id="msgbox" bgcolor="#0080C0" cellspacing="0" cellpadding="0">
<tr>
	<td id="title" colspan="2"><?php echo $data['title']; ?></td>
</tr>
<tr>
	<td id="details" colspan="2"><?php	echo $data['details']; ?></td>
</tr>
<tr>
<td id="replier" colspan="0">กระทู้คุณ: <?php echo $data['name']; ?> - 
	  									   วันที่: <?php echo $data['datepost']; ?>
</td>
	<td align="right"><button id="btalert" 
		onclick="ajaxCall(<?php echo $data['topic_id']; ?>, 0)">แจ้งลบ</button>
	</td>
</tr>
</table>
</div>		

</td></tr>
<tr height="30"><td width="50">&nbsp;</td><td>&nbsp;</td><td width="50">&nbsp;</td>
</tr>

<tr><td>&nbsp;</td>
<td>
<?php
include("../inc/paging.inc.php");

$current_page = 1;
if(isset($_GET['page'])) {
	$current_page = $_GET['page'];
} 

$rows_per_page = 10;
$start_row = paging_start_row($current_page, $rows_per_page);

//อ่านข้อมูลจากตาราง reply โดยเรียงลำดับจากความเห็นล่าสุดไปยังก่อนหน้านี้
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM reply 
			WHERE topic_id = $topic_id
			ORDER BY reply_id DESC
	 		LIMIT $start_row, $rows_per_page;";

$result = mysql_query($sql);
$found_rows = mysql_query("SELECT FOUND_ROWS();");
$total_rows = mysql_result($found_rows, 0, 0);
$total_pages = paging_total_pages($total_rows, $rows_per_page); 

//แสดงเลขลำดับความคิดเห็น โดยเริ่มจากแถวสุดท้ายของหน้านั้นก่อน
while($data = mysql_fetch_array($result)) {
?>
<br  />
<div id="shadow">
<table id="msgbox" cellspacing="0" cellpadding="0"  bgcolor="<?php echo $data['bgcolor']; ?>">

<tr>
	<td id="details" colspan="2"><?php echo $data['message']; ?></td>
</tr>
<tr>
	<td id="replier">ความเห็นคุณ: <?php echo $data['name']; ?></td>
	<td align="right"><button id="btalert" 
		onclick="ajaxCall(<?php echo "{$data['topic_id']}, {$data['reply_id']}"; ?>)">
		แจ้งลบ</button>
	</td>
</tr>
</table>
</div>
<br />
<?php
}
?>
</td><td>&nbsp;</td>
</tr>

<tr><td>&nbsp;</td><td align="center">
<?php
$page_range = 5;
$qry_str = "topicid=$topic_id";
$pagenum = paging_pagenum($current_page, $total_pages, 				
 							   $page_range, $qry_str);
echo "หน้า: " . $pagenum;
?>
</td><td>&nbsp;</td></tr>

<tr>
<td colspan="3">

<form name="form1" action="<?php echo $_SERVER['PHP_SELF'] . "?topicid=" . $_GET['topicid']; ?>" method="post">
<table align="center" cellpadding="3" cellspacing="1" style="border:solid 0px gold;" bgcolor="">
<tr valign="top">
<td><b>ตอบ</b></td>
<td><textarea name="message" cols="70" rows="6"></textarea></td>
</tr>
<tr>
<td><b>ชื่อ</b></td><td>
<input type="text" name="name" maxlength="30" size="20" value="" />&nbsp;&nbsp;&nbsp;&nbsp;
  <b>สีพื้นหลัง</b>&nbsp;&nbsp;<select name="bgcolor">
	<option value="green">เขียว</option>
	<option value="navy">น้ำเงินเข้ม</option>
	<option value="brown">น้ำตาล</option>
	<option value="black">ดำ</option>
	</select>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="   ส่ง   " />
	<input type="hidden" name="topicid" value="<?php echo $_GET['topicid']; ?>"  />
	</td>
</tr>
</table>

</form>

</td>
</tr>
</table>
<p><br  />
</body>
</html>
