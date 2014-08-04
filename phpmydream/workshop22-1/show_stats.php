<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
mysql_select_db("phpmysql");

$sql = "SELECT* FROM stats;";
$result = mysql_query($sql);

include("../JpGraph/src/jpgraph.php");
include("../JpGraph/src/jpgraph_pie.php");

$g = new PieGraph(500, 500);

$title = iconv("tis-620", "utf-8", "สถิติการใช้เว็บเบราเซอร์");
$g->title->Set($title);
$g->title->SetFont(FF_JASMINE, FS_BOLD, 18);

$legends = array();
$data_graph = array();
while($data = mysql_fetch_array($result)) {
	$lg = iconv("tis-620", "utf-8", $data['browser']);
	array_push($legends, $lg);
	array_push($data_graph, $data['num_request']);
}

$pie = new PiePlot($data_graph);
$pie->SetLegends($legends);

$g->Add($pie);
$g->Stroke();
?>