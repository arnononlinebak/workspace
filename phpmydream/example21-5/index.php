<?php
require("../FPDF/ThaiPDF.class.php");
$pdf = new ThaiPDF();
$pdf->AddThaiFont();
$pdf->AddPage();

$pdf->SetFont("iris", "B", 30);
$pdf->SetTextColor(255,0,0);   
$pdf->Write(15, "���ҧ�͡��ô��� ThaiPDF \n"); 

$pdf->SetFont("kodchiang", "B", 24);
$pdf->SetTextColor(0,255,0);   
$pdf->Write(12, "��������ö�����ʹ㨤�� \n");

$text = "
	- �������ʹ����Ѻ૵�͹����
	- �������ʹ㹡���ʴ������Ţ˹��
	- �������ʹ㹡���ŧ���ҧ HTML�� PDF";
$pdf->SetFont("cordia", '', 16);
$pdf->SetTextColor(0,0,0);  
$pdf->Write(8, $text);

$pdf->Output();
?>