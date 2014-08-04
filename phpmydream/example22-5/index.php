<?php
include("../JpGraph/src/jpgraph.php");
include("../JpGraph/src/jpgraph_pie.php");	
//include("../JpGraph/src/jpgraph_pie3d.php");			

$g = new PieGraph(300, 400);

$title = iconv("tis-620", "utf-8", "ผลสำรวจความคิดเห็น");
$g->title->Set($title);
$g->title->SetFont(FF_JASMINE, FS_BOLD, 16);

$subtitle = iconv("tis-620", "utf-8", "ท่านใช้เว็บเบราเซอร์ใดบ่อยที่สุด");
$g->subtitle->Set($subtitle);
$g->subtitle->SetFont(FF_CORDIA, FS_NORMAL, 16);

$legends = array("IE","Firefox","Chrome","Safari");
$data = array(830, 270, 40, 30);

$pie = new PiePlot($data);	
$pie->SetLegends($legends);

$g->Add($pie);
$g->Stroke();
?>