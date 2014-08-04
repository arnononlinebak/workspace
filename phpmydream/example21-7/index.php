<?php
require("../FPDF/ThaiPDF.class.php");
$pdf = new ThaiPDF();
$pdf->AddThaiFont("cordia");
$pdf->AddPage();
$pdf->SetFont("cordia", '', 16);
 
$html = "
<img src=\"../FPDF/tutorial/logo.png\" width=80>
<p /><p />
<font color=#ff0000><b>รายการสินค้าของบริษัท FreePDF(Thailand)</b></font>
<p />
<table border=1>
<tr>
	<td width=60 bgcolor=#dddddd><b>ลำดับ</b></td>
	<td bgcolor=#dddddd><b>ชื่อสินค้า</b></td>
	<td bgcolor=#dddddd><b>ราคา</b></td>
</tr>
<tr><td width=60>1</td><td>aaa</td><td>123</td></tr>
<tr><td width=60>2</td><td>bbb</td><td>456</td></tr>
<tr><td width=60>3</td><td>ccc</td><td>789</td></tr>
</table>
<br />
<i>ตรวจสอบเพิ่มเติมได้ที่ 
<a href=\"http://www.fpdf.org\">
www.fpdf.org</a></i>";

$pdf->WriteHTML($html);
$pdf->Output();
?>