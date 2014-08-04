<?php
function tis2utf($data) {
	if(is_array($data)) {
		for($i=0; $i<count($data); $i++) {
			$data[$i] = iconv("tis-620", "utf-8", $data[$i]);
		}
	}
	else {
		$data = iconv("tis-620", "utf-8", $data);
	}
	return $data;
}
?>