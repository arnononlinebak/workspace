<?php
require("../FPDF/ThaiPDF.class.php");
$pdf = new ThaiPDF();
$pdf->AddThaiFont();
$pdf->AddPage();

$pdf->SetPageNo('left', '˹��: ', '/', 
 					'jasmine', 'I', '20');
$pdf->AddPageNo();

$pdf->SetFont('dillenia', '', 25);
for($i=1; $i<=100; $i++) {
	$pdf->Write(13, "��÷Ѵ��� $i  \n");		
}

$pdf->Output();
?>