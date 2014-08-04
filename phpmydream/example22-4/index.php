<?php
include("../JpGraph/src/jpgraph.php");
include("../JpGraph/src/jpgraph_bar.php");

$g = new Graph(500, 300);
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
$g->xaxis->SetLabelAngle(90);

$data1 = array(357, 250, 425,  300, 175, 250);
$bar1 = new BarPlot($data1);

$data2 = array(150, 200, 175, 300, 250, 275);
$bar2 = new BarPlot($data2);

$data3 = array(300, 325, 250, 150, 200, 175);
$bar3 = new BarPlot($data3);

$bar1->value->Show();
$bar1->value->SetAngle(90);
$bar1->SetFillColor("blue");
$bar1->SetLegend("Product 1");

$bar2->value->Show();
$bar2->value->SetAngle(90);
$bar2->SetFillColor("lightgray");
$bar2->SetLegend("Product 2");

$bar3->value->Show();
$bar3->value->SetAngle(90);
$bar3->SetFillColor("wheat");
$bar3->SetLegend("Product 3");

$bars = array($bar1, $bar2, $bar3);
$gb = new GroupBarPlot($bars);

$g->Add($gb);
$g->Stroke();
?>