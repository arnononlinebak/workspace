<?php
session_start();

include("../JpGraph/src/jpgraph_antispam.php"); 
$spam = new AntiSpam();  

$chars = $spam->Rand(4); 	
$_SESSION['captcha'] = $chars;

$spam->Stroke();
?>