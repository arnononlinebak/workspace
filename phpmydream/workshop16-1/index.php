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

//����繡���ѻ��Ŵ������� ���Ѵ��ŧ㹰ҹ�����š�͹
if($_FILES) {
	
	$num_files = count($_FILES['file']['name']);
	
	//���ͧ�ҡ�ѻ��ŴẺ�������� ��Ҩ֧���ٻ���ͨѴ��÷������
	for($i = 0; $i < $num_files; $i++) {
		if($_FILES['file']['error'][$i] != 0) {		//���������Դ��ͼԴ��Ҵ ��������ѧ������
			continue;
	 	}
		
		/*		��ǹ���������Ѻ���� 17 ����ͧ�������Ҿ��͹��ŧ㹰ҹ������
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
		
		//��ҹ�����Ңͧ���
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
			echo "��úѹ�֡����ӴѺ��� " . ($i + 1) . " �Դ��ͼԴ��Ҵ! <br />";
		}
		else {
			echo "��úѹ�֡����ӴѺ���  " . ($i + 1) . " �������º���� <br />";
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
//�ʴ���ª������������㹰ҹ������

$result = mysql_query("SELECT * FROM uploadfile;");
if(!$result  || mysql_num_rows($result) == 0) {
	echo "��辺���㹰ҹ������ </body></html>";
	exit();
}

//��������㹰ҹ������ ����ʴ�����¡��Ẻ���ҧ
echo "<table border=1 cellpadding=5 cellspacing=1>
		<caption>��ª�������������㹰ҹ������</caption>";
		
//��ǹ��Ŵ�ͧ���ҧ
echo "<tr>";
$num_fields = mysql_num_fields($result);
for($i = 0; $i < $num_fields - 1; $i++) {		// -1 ���Ш�����ʴ���Ŵ����������Ңͧ���
	echo "<th>" . mysql_field_name($result, $i) . "</th>";
}
echo "</tr>";

//��ҹ�����Ũҡ������
while($data = mysql_fetch_array($result)) {
		echo  "<tr valign=top>";
		
		$id = $data[0];
		for($i = 0; $i < $num_fields - 1; $i++) {	//��ҹ�����Ũҡ���п�Ŵ�
			echo "<td>";
			
			//����繿�Ŵ����ʴ�������� ������ҧ�ԧ������������§��ѧྨ�ʴ����
		 	if($i == 1) {   
				echo "<a href=\"show_file.php?id=$id\" target=\"_blank\">{$data[$i]}</a>";
			}
			else {						//����繿�Ŵ����� ����ʴ������ŵ������
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