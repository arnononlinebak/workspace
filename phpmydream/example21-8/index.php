<?php
header("Content-Type: application/msword");
header('Content-Disposition: attachment; filename="product.doc"');
?>
<html>
<body>
<img src="C:/Appserv/www/phpmydream/FPDF/tutorial/logo.png" width=80>
<br />
<font color="#ff0000"><b>��¡���Թ��Ңͧ����ѷ FreePDF(Thailand)</b></font>
<table border=1>
<tr>
<tr bgcolor="#dddddd">
	<th>�ӴѺ</th><th>�����Թ���</th><th>�Ҥ�</th>
</tr>
<tr><td>1</td><td>aaa</td><td>123</td></tr>
<tr><td>2</td><td>bbb</td><td>456</td></tr>
<tr><td>3</td><td>ccc</td><td>789</td></tr>
</table>
<i>��Ǩ�ͺ����������� 
<a href="http://www.fpdf.org">
www.fpdf.org</a></i>
</body>
</html>