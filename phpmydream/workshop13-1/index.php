<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Workshop 13-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>
<body>
<?php
//����繡�� Postback
if(isset($_GET['keyword'])) {
	if(!isset($_GET['field_select'])) {
		echo "��ͧ���͡�����ŷ������ʴ������ҧ���� 1 ���ҧ";
	}
	else {
		$field_search = $_GET['field_search'];
		$kw = $_GET['keyword'];
		$match = $_GET['match'];
		$price = $_GET['price'];
		$field_select = implode(", ", $_GET['field_select']);	//��������ʵ�ԧ���ǡѹ��蹴��� ", "
		
		//�Ѵ�ҧ�ѭ�ѡɳ� wildcard ����ʹ���ͧ�Ѻ���˹觤ӷ�����͡
		if($match == "part") {
			$kw = "%$kw%";
		}
		else if($match == "start") {
			$kw = "$kw%";
		}
		else if($match == "end") {
			$kw = "%$kw";
		}
		
		//�Ӥ�Ҩҡ����õ�ҧ����áŧ� SQL
		$sql = "SELECT 		$field_select
					FROM  		book
					WHERE		($field_search  LIKE  '$kw')  AND  (price  $price)";
					
		//����ö�Ӥ����  SQL ���������������Ѻ�ѧ��ѹ mysql_query() �����
	}
	
	echo "������ҧ����� SQL �����: <p />";
	echo nl2br($sql);
	echo "<p /><a href=\"javascript: history.back();\">��͹��Ѻ</a>";
	echo "</body></html>";
	exit;
}
?>
<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
  <label><strong>�к��׺��˹ѧ���:<br />
    </strong><br />
    <input name="field_search" type="radio" value="title" checked="checked" />
����˹ѧ���</label>
    <label>
    <input name="field_search" type="radio" value="author" />
�ѡ��¹</label>
    <label>
    <input name="field_search" type="radio" value="publisher" />
�ӹѡ�����</label>
    <br />
    <input name="keyword" type="text" id="keyword" size="45" />
    <input type="submit" name="Submit" value="����" />
    <br />
  ���˹觤�:
  <label>
  <select name="match" id="match">
    <option value="part">��ǹ�ͧ��</option>
    <option value="whole">�ç�ѹ��駤�</option>
    <option value="start">��鹵鹴���</option>
    <option value="end">ŧ���´���</option>
  </select>
&nbsp;&nbsp;�Ҥ�:
<select name="price" id="price">
  <option value="&gt; 0">�ء�дѺ</option>
  <option value="&lt;= 200">����Թ 200</option>
  <option value="BETWEEN 200 AND 250">200 - 250</option>
  <option value="BETWEEN 250 AND 300">250 - 300</option>
  <option value="BETWEEN 300 AND 400">300 - 400</option>
  <option value="&gt;= 400">400 ����</option>
</select>
  </label>
  <br />
  <br />
  �����ŷ���ʴ�㹼��Ѿ��: 
  <label> <br />
  <input name="field_select[]" type="checkbox" id="field_select[]" value="title" />
  ����˹ѧ���</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="author" />
  �ѡ��¹</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="publisher" />
  ʹ�.</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="price" />
  �Ҥ�</label>
  <label>
  <input name="field_select[]" type="checkbox" id="field_select[]" value="isbn" />
  ISBN</label>
 </form>
</body>
</html>
