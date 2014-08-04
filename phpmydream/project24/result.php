<?php
include("dbconn.inc.php");

$topic_id = $_GET['tid'];

$sql = "SELECT title, num_votes FROM topic WHERE topic_id = $topic_id;";
$result = mysql_query($sql);

$num_votes = mysql_result($result, 0, "num_votes");
if($num_votes == 0) {
 	die("<h2>ยังไม่มีผู้โหวตหัวข้อนี้</h2>");
}

include("../JpGraph/src/jpgraph.php");
include("../JpGraph/src/jpgraph_pie.php");
$g = new PieGraph(500, 500);

$title = iconv("tis-620", "utf-8", "ผลสำรวจความคิดเห็น");
$g->title->Set($title);
$g->title->SetFont(FF_JASMINE, FS_BOLD, 18);

$topic = mysql_result($result, 0, "title");
$subtitle = iconv("tis-620", "utf-8", $topic);
$g->subtitle->Set($subtitle);
$g->subtitle->SetFont(FF_CORDIA, FS_NORMAL, 16);

$sql = "SELECT * FROM choice WHERE topic_id = $topic_id;";
$result = mysql_query($sql);

$legends = array();
$data_graph = array();
while($data = mysql_fetch_array($result)) {
	$lg = iconv("tis-620", "utf-8", $data['item']);
	array_push($legends, $lg);
	array_push($data_graph, $data['score']);
}

$pie = new PiePlot($data_graph);
$pie->SetLegends($legends);
$g->legend->SetFont(FF_CORDIA, FS_NORMAL, 12);

$g->Add($pie);
$g->Stroke();
?>