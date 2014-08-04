<?php
require("../FPDF/ThaiPDF.class.php");
$pdf = new ThaiPDF();
$pdf->AddThaiFont("cordia");
$pdf->AddPage();
$pdf->SetLeftMargin(40);

//��¹���ͺ���ѷ
$pdf->SetFont("cordia", 'B', 30);
$pdf->Write(10, "FreePDF(Thailand) Limited \n");

//��ҹ���˹� (x,y) ���ͨй����º㹡���ҧ����
$x = $pdf->GetX() + 100;		
$y = $pdf->GetY() - 10;

//��¹����������ѷ
$pdf->SetFont("cordia", '', 14);
$pdf->Write(7, "123/456 �.�ҧ��-��Ҵ ��ا෾ 10260  �� 02-1234567-89 \n\n");

//�ҧ����
$pdf->Image("../FPDF/tutorial/logo.png", $x, $y, 30);

//�ҧ��ͤ�����͹���ҧ
$pdf->SetFontSize(20);
$pdf->Write(10, "��¡�â���Թ��һ�Ш���͹ \n");

$pdf->SetFontSize(16);

//��ǹ��Ǣͧ���ҧ
$html = "
<table border=1>
<tr>
	<td width=50 bgcolor=#cccccc><b>�ӴѺ</b></td>
	<td width=150 bgcolor=#cccccc><b>�����Թ���</b></td>
	<td width=100 bgcolor=#cccccc><b>�Ҥ�</b></td>
	<td width=100 bgcolor=#cccccc><b>�ӹǹ�����</b></td>
	<td width=100 bgcolor=#cccccc align=right><b>���</b></td>
</tr>";

//��ҹ�����Ũҡ�ҹ���������͹�����ҧ���ҧ
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sql = "	SELECT id, name, price, soldout, price*soldout AS subtotal
	 		FROM pdf_report;";
			
$result = mysql_query($sql);

//��ǹ�����Ţͧ���ҧ
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

//���ͧ�ҡ����������ö���Ը��غ������Ẻ HTML ��
//�֧���Ըշҧ������蹤������˹��������ҧ�ͧ������
//�й�������ѹ��ҡѺ�������ҧ�ͧ�ء����㹪�ǧ�������ѹ
$html .= "<tr>
				<td width=500 align=right>���������   $grand_total</td>
			</tr></table>";

$pdf->WriteHTML($html);
$pdf->Output();
?>