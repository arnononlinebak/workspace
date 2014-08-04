<?php
require("../FPDF/ThaiPDF.class.php");
$pdf = new ThaiPDF();
$pdf->AddThaiFont("cordia");
$pdf->AddPage();
$pdf->SetLeftMargin(40);

//เขียนชื่อบริษัท
$pdf->SetFont("cordia", 'B', 30);
$pdf->Write(10, "FreePDF(Thailand) Limited \n");

//อ่านตำแหน่ง (x,y) เพื่อจะนำไปเทียบในการวางโลโก้
$x = $pdf->GetX() + 100;		
$y = $pdf->GetY() - 10;

//เขียนที่อยู่บริษัท
$pdf->SetFont("cordia", '', 14);
$pdf->Write(7, "123/456 ถ.บางนา-ตราด กรุงเทพ 10260  โทร 02-1234567-89 \n\n");

//วางโลโก้
$pdf->Image("../FPDF/tutorial/logo.png", $x, $y, 30);

//วางข้อความก่อนตาราง
$pdf->SetFontSize(20);
$pdf->Write(10, "รายการขายสินค้าประจำเดือน \n");

$pdf->SetFontSize(16);

//ส่วนหัวของตาราง
$html = "
<table border=1>
<tr>
	<td width=50 bgcolor=#cccccc><b>ลำดับ</b></td>
	<td width=150 bgcolor=#cccccc><b>ชื่อสินค้า</b></td>
	<td width=100 bgcolor=#cccccc><b>ราคา</b></td>
	<td width=100 bgcolor=#cccccc><b>จำนวนที่ขาย</b></td>
	<td width=100 bgcolor=#cccccc align=right><b>รวม</b></td>
</tr>";

//อ่านข้อมูลจากฐานข้อมูลเพื่อนำไปสร้างตาราง
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sql = "	SELECT id, name, price, soldout, price*soldout AS subtotal
	 		FROM pdf_report;";
			
$result = mysql_query($sql);

//ส่วนข้อมูลของตาราง
$grand_total = 0;
while($data = mysql_fetch_array($result)) {
	$html .= "<tr>
					<td width=50>{$data['id']}</td>
					<td width=150>{$data['name']}</td>
					<td width=100>{$data['price']}</td>
					<td width=100>{$data['soldout']}</td>
					<td width=100 align=right>{$data['subtotal']}</td>
				</tr>";

	$grand_total +=  $data['subtotal'];
}

//เนื่องจากเราไม่สามารถใช้วิธียุบเซลล์ตามแบบ HTML ได้
//จึงใช้วิธีทางอ้อมนั่นคือให้กำหนดความกว้างของเซลล์ที่
//จะนำมารวมกันเท่ากับความกว้างของทุกเซลล์ในช่วงนั้นรวมกัน
$html .= "<tr>
				<td width=500 align=right>รวมทั้งสิ้น   $grand_total</td>
			</tr></table>";

$pdf->WriteHTML($html);
$pdf->Output();
?>