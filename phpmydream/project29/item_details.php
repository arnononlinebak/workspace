<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Auction: Item Details</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
include("header.inc.php");
include("dbconn.inc.php");

//ตารางสำหรับกำหนดโรงร่างของเนื้อหา
echo "
<table align=center width=500>
<tr>
<td align=center>";

//อ่านค่า id ของสินค้าที่ส่งเข้ามาทาง Query String
$id = $_GET['item_id'];

//ถ้าเป็นการส่งข้อมูลการเสนอราคากลับเข้ามา
if($_POST) {
	//ถ้ายังไม่ได้เข้าสู่ระบบ จะย้ายไปที่เพจสำหรับการล็อกอิน
	if(!isset($_SESSION['user_id'])) {
		header("Location: user_login.php");
	}
	
	$user_id = $_SESSION['user_id'];
	$item_id = $id;
	$offer = $_POST['offer'];
	$valid_offer = false;
	
	//ก่อนที่จะจัดเก็บข้อมูลการเสนอราคา 
	//เราต้องตรวจสอบข้อมูลการเสนอราคาเดิมก่อน
	//โดยเริ่มจากการหาราคาปัจจุบันของสินค้านั้นก่อน
	$sql = "SELECT MAX(offer) FROM bid WHERE item_id = $item_id;";
	$result = mysql_query($sql);
	$max = mysql_result($result, 0, 0);
	
	//ถ้าได้ค่าว่าง แสดงยังไม่มีผู้เสนอราคา ก็ให้นำราคาเริ่มต้นมาใช้แทน
	if(empty($max)) {
		$sql = "SELECT starting_price FROM item
					WHERE item_id = $item_id;";
		$result = mysql_query($sql);
		$starting_price = mysql_result($result, 0, 0);
		
		//ถ้าราคาที่เสนอ ไม่น้อยกว่าราคาเริ่มต้น ก็แสดงว่าราคานั้นยอมรับได้
		if($offer >= $starting_price) {
			$valid_offer = true;
		}
	}
	else {	//ถ้าราคาที่เสนอมากกว่าราคาปัจจุบัน ก็แสดงว่าราคานั้นยอมรับได้
		if($offer > $max) {
			$valid_offer = true;
		}
	}
	
	//หากราคาที่เสนอนั้น เป็นราคทที่ยอมรับได้ ก็จัดเก็บลงในฐานข้อมูล
	if(is_numeric($offer) && $valid_offer) {
		$sql = "INSERT INTO bid VALUES
					(0, $item_id, $user_id, $offer);";
		@mysql_query($sql) or die(mysql_error());
	}
	else {	//หากราคาที่เสนอนั้นยอมรับไม่ได้ ก็แจ้งข้อผิดพลาดกลับไป
		echo "<div style=\"font-size: 12pt; color: red;\">ราคาที่เสนอ($offer) ไม่สามารถยอมรับไดั</div><br />";
	}
}

//ต่อไป คือการอ่านข้อมูลมาแสดงผล

$sql = "SELECT *, DATE_FORMAT(end_date, '%d/%m/%Y') AS ndate 
 			FROM item WHERE item_id = $id;";
$result = mysql_query($sql);
if(mysql_num_rows($result) == 0) {
	echo "ไม่พบข้อมูลสินค้านี้
			</td></tr></body></html>";
	exit;
}

$item = mysql_fetch_array($result);

//ตรวจสอบราคาสูงสุด
$sql ="SELECT MAX(offer) AS max_offer, COUNT(bid_id) AS num_bids
			FROM bid WHERE item_id = $id;";

$result = mysql_query($sql);
$bid = mysql_fetch_array($result);

if($bid['num_bids'] != 0) {
	$num_bids = $bid['num_bids'];
	$max_offer = $bid['max_offer'];
}
else {	//ถ้าไม่มีผู้เสนอราคา ให้ราคาปัจจุบันเท่ากับราคาเริ่มต้น
	$num_bids = 0;
	$max_offer = $item['starting_price'];
}

//แสดงผล
echo "
<div style=\"font-size:14pt;color:brown;\"> {$item['item_name']} </div> <br />

<b>ผู้ร่วมประมูล:</b> $num_bids 
-
<b>ราคาปัจจุบัน:</b> $max_offer 
-
<b>วันปิดประมูล</b>: {$item['ndate']}
<br /><br />

<img src=read_img.php?item_id=$id />
<br /><br />

{$item['description']} <br />";

//ถ้าเข้าสู่ระบบแล้ว ใ้ห้แสดงฟอร์มสำหรับรับข้อมูลการเสนอราคา
if(isset($_SESSION['user_id'])) {
?>
<br />
<div style="width: 300px; background-color: #CCFFFF; padding: 3px; text-align: center">

<!-- action ของฟอร์ม จะต้องนำค่า id ของสินค้ามาแนบแบบ Query String เอาไว้ด้วย
		เพื่อให้หลังการโพสต์ข้อมูลขึ้นไป สามารถนำไปใช้ตรวจสอบได้ว่าเป็นของสินค้าใด -->
		
<form action="<?php echo $_SERVER['PHP_SELF'] . "?item_id=$id"; ?>" method="post">
เสนอราคา:<input type="text" name="offer" />
<input type="submit" value="ตกลง"  /><br />
*ราคาที่เสนอต้องสูงกว่าราคาสูงสุดที่มีผู้่เสนอไว้แล้ว
</form>
</div>
<?php
}
else {
	echo "<br /><i>หากต้องการเสนอราคา ต้องล็อกอินเข้าสู่ระบบก่อน</i>";
}

echo "
</td>
</tr>
<tr>
<td style=\"padding-left: 100px;\">";

//แสดงประวัติการเสนอราคา ซึ่งก็คือการอ่านราคาทั้งหมดที่เคยมีผู้เสนอสำหรับสินค้านั้น
$sql = "SELECT bid.offer, user.user_name 
 			FROM bid, user
			WHERE bid.user_id = user.user_id 
			 	AND bid.item_id = $id 
			ORDER BY bid.offer DESC;";

$result = mysql_query($sql);

if(mysql_num_rows($result) > 0) {
	echo "<br /><b>ประวัติการเสนอราคาของรายการนี้:</b>
	 		<ul>";
	while($data = mysql_fetch_array($result)) {
		echo "<li> {$data['user_name']} - {$data['offer']} </li>";
	}
	echo "</ul";
}

echo "
</td>
</tr>
</table>";
?>

<p>&nbsp;</p>
</body>
</html>