<?php
	$url = "http://www.thaicyberjob.com/jobs.php";
	$qryStr = "skill=" . urlencode("Visual C#");
	$qryStr .= "&date_posted=" . urlencode("10-11-20006 10:11:12");
	$url .= "?" . $qryStr;
	echo $url;
?>
