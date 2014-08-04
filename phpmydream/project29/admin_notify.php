<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Auction: Admin Notify</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
include("dbconn.inc.php");

//ตรวจสอบสินค้าที่ปิดการประมูล และยังไม่ได้แจ้งผล
$sql = "SELECT item_id, item_name, user_id  
 			FROM item
			WHERE end_date < NOW() AND notified = 0;";

$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);
if($num_rows == 0) {
	echo "ไม่มีรายการที่ต้องแจ้งการปิดประมูล
			</body></html>";
	exit;
}

//ถ้ามีรายการที่ต้องแจ้งการผิดประมูล
$count = 0;
while($item = mysql_fetch_array($result)) {
	$item_id = $item['item_id'];
	$item_name = $item['item_name'];
	$user_id = $item['user_id'];
	
	//ตรวจสอบข้อมูลของเจ้าของสินค้า
	$sql = "SELECT user_name, login FROM user WHERE user_id = $user_id;";
	$result = mysql_query($sql);
	$owner_name =  mysql_result($result, 0, 0);
	$owner_email =  mysql_result($result, 0, 1);	
	
	$msg = "สวัสดีค่ะ คุณ$owner_name, <br /><br />
				จากการที่ท่านได้ส่งของเข้าร่วมประมูลคือ: $item_name <br />
				ซึ่งขณะนี้ได้สิ้นสุดระยะเวลาตามที่ท่านกำหนดแล้ว ผลปรากฏว่า	 <br /><br />";
	
	//ตรวจสอบว่าว่าใครเป็นผู้ชนะการประมูลด้วยราคาเท่าใด
	$sql = "SELECT user_id, offer  FROM bid WHERE item_id = $item_id ORDER BY offer DESC LIMIT 1;";
	$result = mysql_query($sql);
	$winner_id = mysql_result($result, 0, 0);
	$winner_offer = mysql_result($result, 0, 1);

	//ถ้าไม่มีผลลัพธ์แสดงว่า ไม่มีผู้เสนอราคาประมูล
	if(empty($winner_offer)) {
 		$msg .= "<font color=red>ไม่มีผู้เสนอราคาประมูล</font>";
	}
	else {	//ถ้ามีผลลัพธ์ แสดงว่ามีผู้ชะการประมูล ซึ่งเราก็ต้องตรวจสอบข้อมูลของผู้ชนะรายนั้น
		$sql = "SELECT user_name, login FROM user WHERE user_id = $winner_id;";
		$result = mysql_query($sql);
		$winner_name =  mysql_result($result, 0, 0);
		$winner_email =  mysql_result($result, 0, 1);
		
		$msg .= "ผู้ชนะการประมูลคือ: คุณ$winner_name
		 				(<a href=\"mailto: $winner_email\">$winner_email</a>) <br />
					  ราคาที่เสนอคือ: $winner_offer <br /><br />
						
						ขอให้ท่านรีบติดต่อไปยังผู้ชนะการประมูลนี้ภายใน 3 วัน<br />
						เพื่อนัดหมายเรื่องการชำระเงินและจัดส่งของตามแต่จะตกลงกัน";
	}
	
	//นำข้อมูลทั้งหมด มาสร้างเป็นอีเมล
	$header = "From: noreply@basic-auction-project.com\r\n";
	$header .= "Content-type: text/html; charset=tis-620\r\n";
	 
	$to = $owner_email;
	$subject = "แจ้งผลการประมูล";
	$body = $msg;
	
	$sendmail = mail($to, $subject, $body, $header);
	
	if($sendmail) {
		//ถ้าส่งเมลสำเร็จ ให้อัปเดตสถานะการแจ้งเตือนเป็น 1 เพื่อบอกว่าเราได้แจ้งเตือนไปแล้ว
		$sql = "UPDATE item SET notified = 1 WHERE item_id = $item_id;";
		mysql_query($sql);
		$count++;
	}
}

echo "จำนวนรายการที่สิ้นสุดการประมูล: $num_rows <br />
		จำนวนเจ้าของรายการที่แจ้งเตือนแล้ว: $count";
?>
</body>
</html>