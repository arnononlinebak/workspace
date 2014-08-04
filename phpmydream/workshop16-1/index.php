<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 16-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
@mysql_connect("localhost", "root", "leaf")  or die(mysql_error());
mysql_select_db("phpmysql");

//ถ้าเป็นการอัปโหลดไฟล์ขึ้นมา ให้จัดเก็บลงในฐานข้อมูลก่อน
if($_FILES) {
	
	$num_files = count($_FILES['file']['name']);
	
	//เนื่องจากอัปโหลดแบบอาร์เรย์ เราจึงใช้ลูปเพื่อจัดการทีละไฟล์
	for($i = 0; $i < $num_files; $i++) {
		if($_FILES['file']['error'][$i] != 0) {		//ถ้าไฟล์นั้นเกิดข้อผิดพลาด ให้ข้ามไปยังไฟล์ต่อไป
			continue;
	 	}
		
		/*		ส่วนนี้ใช้สำหรับบที่ 17 เรื่องการแก้ไขภาพก่อนเก็บลงในฐานข้อมูล
		$file =$_FILES['file']['tmp_name'][$i]; 
 		$size = getImageSize($file);
 		$type = $size['mime'];

		if(eregi("(png)$", $type)) {		
			$img = imageCreateFromPng($file);
		}
		else if(eregi("(gif)$", $type)) {		
			$img = imageCreateFromGif($file);
		}
		else { 	
			$img = imageCreateFromJpeg($file);
		}

	 	$red = imageColorAllocate($img, 255,0,0);
		$x = 10;
		$y =imagesy($img) - 20;
	 	imagestring($img, 3, $x, $y, "developerthai.com", $red);
	
		if(eregi("(png)$", $type)) {		
			imagePng($img, $_FILES['file']['tmp_name'][$i]);
		}
		else if(eregi("(gif)$", $type)) {		
			imageGif($img, $_FILES['file']['tmp_name'][$i]);
		}
		else { 	
			imageJpeg($img, $_FILES['file']['tmp_name'][$i]);
		}
		
	 	imageDestroy($img);
		*/
		
		//อ่านเนื้อหาของไฟล์
		$upfile = $_FILES['file']['tmp_name'][$i];
		$file = fopen($upfile, "r");
		$content = fread($file, filesize($upfile));
		$content = addslashes($content);
		fclose($file);
		
		//$size = filesize($_FILES['file']['tmp_name'][$i]);
		$size = $_FILES['file']['size'][$i];
		$name = $_FILES['file']['name'][$i];
		$type = $_FILES['file']['type'][$i];
		
 		$sql = "INSERT INTO uploadfile VALUES(0, '$name', '$type', '$size', '$content');";
		$qry = mysql_query($sql);
		
		
		if(!$qry) {
			echo "การบันทึกไฟล์ลำดับที่ " . ($i + 1) . " เกิดข้อผิดพลาด! <br />";
		}
		else {
			echo "การบันทึกไฟล์ลำดับที่  " . ($i + 1) . " เสร็จเรียบร้อย <br />";
		}
	}
}
?>
<p />
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  File 1: 
  <label>
  <input name="file[]" type="file" id="file[]" />
  <br />
  File 2: 
  <input name="file[]" type="file" id="file[]" />
  <br />
  File 3: 
  <input name="file[]" type="file" id="file[]" />
  <br />
  <br />
  <input type="submit" name="Submit" value="Upload" />
  <br />
  </label>
</form><p />
<?php
//แสดงรายชื่อไฟล์ที่อยู่ในฐานข้อมูล

$result = mysql_query("SELECT * FROM uploadfile;");
if(!$result  || mysql_num_rows($result) == 0) {
	echo "ไม่พบไฟล์ในฐานข้อมูล </body></html>";
	exit();
}

//ถ้ามีไฟล์ในฐานข้อมูล ให้แสดงเป็นรายการแบบตาราง
echo "<table border=1 cellpadding=5 cellspacing=1>
		<caption>รายชื่อไฟล์ที่เก็บไว้ในฐานข้อมูล</caption>";
		
//ส่วนฟิลด์ของตาราง
echo "<tr>";
$num_fields = mysql_num_fields($result);
for($i = 0; $i < $num_fields - 1; $i++) {		// -1 เพราะจะไม่แสดงฟิลด์ที่เป็นเนื้อหาของไฟล์
	echo "<th>" . mysql_field_name($result, $i) . "</th>";
}
echo "</tr>";

//อ่านข้อมูลจากแต่ละแถว
while($data = mysql_fetch_array($result)) {
		echo  "<tr valign=top>";
		
		$id = $data[0];
		for($i = 0; $i < $num_fields - 1; $i++) {	//อ่านข้อมูลจากแต่ละฟิลด์
			echo "<td>";
			
			//ถ้าเป็นฟิลด์ที่แสดงชื่อไฟล์ ให้สร้างลิงค์เพื่อเชื่อมโยงไปยังเพจแสดงไฟล์
		 	if($i == 1) {   
				echo "<a href=\"show_file.php?id=$id\" target=\"_blank\">{$data[$i]}</a>";
			}
			else {						//ถ้าเป็นฟิลด์อื่นๆ ให้แสดงข้อมูลตามปกติ
				echo  $data[$i];
			}
			echo "</td>";
		}
		echo "</tr>";
}
echo "</table>";
?>
</body>
</html>