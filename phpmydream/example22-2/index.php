<?php
include("../JpGraph/src/jpgraph.php");
include("../JpGraph/src/jpgraph_line.php");

$g = new Graph(300, 250);
$g->SetScale("textlin");

$title = iconv("tis-620", "utf-8", "ยอดขายสินค้า 6 เดือนแรกของปี");
$g->title->Set($title);
$g->title->SetFont(FF_JASMINE, FS_BOLD, 16);

$labels = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย." ,"พ.ค.", "มิ.ย.");
for($i = 0; $i < count($labels); $i++) {
	$labels[$i] = iconv("tis-620", "utf-8", $labels[$i]);
}
$g->xaxis->SetTickLabels($labels);
$g->xaxis->SetFont(FF_CORDIA, FS_NORMAL, 14);
$g->xaxis->SetLabelAngle(45);

$data1 = array(357, 250, 425,  300, 175, 250);
$line1 = new LinePlot($data1);

$data2 = array(150, 200, 175, 300, 250, 275);
$line2 = new LinePlot($data2);

$data3 = array(300, 325, 250, 150, 200, 175);
$line3 = new LinePlot($data3);

$line1->value->Show();
$line1->mark->SetType(MARK_FILLEDCIRCLE);
$line1->SetLegend("Product 1");

$line2->value->Show();
$line2->mark->SetType(MARK_SQUARE);
$line2->SetLegend("Product 2");

$line3->value->Show();
$line3->mark->SetType(MARK_STAR);
$line3->SetLegend("Product 3");

$g->Add($line1);
$g->Add($line2);
$g->Add($line3);

$g->Stroke();
?>