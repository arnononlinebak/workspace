<?php
require("../FPDF/ThaiPDF.class.php");
$pdf = new ThaiPDF();
$pdf->AddThaiFont();
$pdf->AddPage();

$pdf->SetFont("iris", "B", 30);
$pdf->SetTextColor(255,0,0);   
$pdf->Write(15, "สร้างเอกสารด้วย ThaiPDF \n"); 

$pdf->SetFont("kodchiang", "B", 24);
$pdf->SetTextColor(0,255,0);   
$pdf->Write(12, "ความสามารถที่น่าสนใจคือ \n");

$text = "
	- เพิ่มเมธอดสำหรับเซตฟอนต์ไทย
	- เพิ่มเมธอดในการแสดงหมายเลขหน้า
	- เพิ่มเมธอดในการแปลงตาราง HTMLเป็น PDF";
$pdf->SetFont("cordia", '', 16);
$pdf->SetTextColor(0,0,0);  
$pdf->Write(8, $text);

$pdf->Output();
?>