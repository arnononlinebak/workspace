<?php
include("../JpGraph/src/jpgraph.php");
include("../JpGraph/src/jpgraph_bar.php");			

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

$data = array(357,250,300,175,425,400);
$bar = new BarPlot($data);					 	
$bar->SetShadow();
$bar->value->Show();

$g->Add($bar);
$g->Stroke();
?>