<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 7-2</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>

<?php
if($_POST) {
 	echo "<b>�������:</b><br />";
 	foreach($_POST['address'] as $address) {
	 	echo $address . "<br />";
 	}

 	echo "<p /><b>���ҷ����¹��:</b> ";
 	if(isset($_POST['lang'])) {
	 	//���ͧ�ҡ�����ŷ������������ٻẺ��������
	 	//��Ҩ֧����ö�����Ҫԡ�����ʵ�ԧ���ǡѹ����� implode()
	 	$lang = implode(", ", $_POST['lang']);  	//��蹴��� ", "
	 	echo $lang;
 	}

 	echo "<p /><b>���˹觧ҹ�����Ѥ�:</b> <br />";
	
	//������͡ Multiple selection ��ͧ��Ǩ�ͺ���͹ ���м�����Ҩ������͡��¡�����¡���
 	if(isset($_POST['jobs'])) {
	 	$jobs = implode("<br />", $_POST['jobs']);		//��蹴��� "<br />" ��������¡��餹�к�÷Ѵ
	 	echo $jobs;
 	}
	//��ѧ����ʴ��� ������ʴ�������ա �ѧ��鹨���ش��÷ӧҹ�ͧྨ
 	echo "</body></html>";
 	exit;
}
?>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <strong>�������</strong><br />
  ��÷Ѵ��� 1: 
  <label>
  <input name="address[]" type="text" id="address[]" size="35" />
  </label>
  <br />
��÷Ѵ��� 2: 
<label>
<input name="address[]" type="text" id="address[]" size="35" />
</label>
<br />
��÷Ѵ��� 3: 
<label>
<input name="address[]" type="text" id="address[]" size="35" />
</label>
<br />
<strong>���ҷ����¹��</strong>
<label>
<input name="lang[]" type="checkbox" id="lang[]" value="PHP" />
PHP</label>
<label>
<input name="lang[]" type="checkbox" id="lang[]" value=".NET" />
.NET</label>
 <label>
 <input name="lang[]" type="checkbox" id="lang[]" value="Java" />
 Java </label>
 <label></label>
 <br />
 <strong>���˹觧ҹ�����Ѥ� 
 <label></label>
 </strong>
 <label><br />
 <select name="jobs[]" size="3" multiple="multiple" id="jobs[]">
   <option value="System Analyst">System Analyst</option>
   <option value="Web Developer">Web Developer</option>
   <option value="App Developer">App Developer</option>
  </select>
</label>
 <label>
 <input type="submit" name="Submit" value="�觢�����" />
 </label>
</form>
</body>
</html>
