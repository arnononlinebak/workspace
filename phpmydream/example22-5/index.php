<?php
include("../JpGraph/src/jpgraph.php");
include("../JpGraph/src/jpgraph_pie.php");	
//include("../JpGraph/src/jpgraph_pie3d.php");			

$g = new PieGraph(300, 400);

$title = iconv("tis-620", "utf-8", "�����Ǩ�����Դ���");
$g->title->Set($title);
$g->title->SetFont(FF_JASMINE, FS_BOLD, 16);

$subtitle = iconv("tis-620", "utf-8", "��ҹ������������㴺��·���ش");
$g->subtitle->Set($subtitle);
$g->subtitle->SetFont(FF_CORDIA, FS_NORMAL, 16);

$legends = array("IE","Firefox","Chrome","Safari");
$data = array(830, 270, 40, 30);

$pie = new PiePlot($data);	
$pie->SetLegends($legends);

$g->Add($pie);
$g->Stroke();
?>