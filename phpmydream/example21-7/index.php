<?php
require("../FPDF/ThaiPDF.class.php");
$pdf = new ThaiPDF();
$pdf->AddThaiFont("cordia");
$pdf->AddPage();
$pdf->SetFont("cordia", '', 16);
 
$html = "
<img src=\"../FPDF/tutorial/logo.png\" width=80>
<p /><p />
<font color=#ff0000><b>��¡���Թ��Ңͧ����ѷ FreePDF(Thailand)</b></font>
<p />
<table border=1>
<tr>
	<td width=60 bgcolor=#dddddd><b>�ӴѺ</b></td>
	<td bgcolor=#dddddd><b>�����Թ���</b></td>
	<td bgcolor=#dddddd><b>�Ҥ�</b></td>
</tr>
<tr><td width=60>1</td><td>aaa</td><td>123</td></tr>
<tr><td width=60>2</td><td>bbb</td><td>456</td></tr>
<tr><td width=60>3</td><td>ccc</td><td>789</td></tr>
</table>
<br />
<i>��Ǩ�ͺ����������� 
<a href=\"http://www.fpdf.org\">
www.fpdf.org</a></i>";

$pdf->WriteHTML($html);
$pdf->Output();
?>