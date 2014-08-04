<?php
class Validation {

	private $rude_words = array("xxx", "yyy", "zzz");
	
	public function getRudeWords($str) {
		$rudes = array();
		$len = count($this->rude_words);
		for($i=0; $i<$len; $i++) {
			$r = $this->rude_words[$i];
			if(eregi($r, $str)) {
				array_push($rudes, $r);
			}
		}
		return $rudes;		
	}
	
	public function getStressRudeWord($str) {
		$len = count($this->rude_words);
		for($i=0; $i<$len; $i++) {
			$pattern = $this->rude_words[$i];
			$rep = "<font color=red><b>\\0</b></font>";
			$str = eregi_replace($pattern, $rep, $str);
		}
		
		return $str;		
	}
	
	public function isValidMail($eml, 
		$pattern="^[a-z][a-z0-9]+([_\.]*[a-z0-9])*@([a-z0-9\-]{2,}\.)([a-z]{2,5}(\.[a-z]{2,5})*)$") {
		
		return ereg($pattern, $eml);
	}
	
	public function isValidUrl($url, 
		$pattern="^(http(s?):\/\/)([a-z0-9\-]+\.)*([a-z0-9\-]{2,}\.)([a-z]{2,5}(\.[a-z]{2,5})*)(\/.+)*$") {
	
		return ereg($pattern, $url);
	}

	public function isValidDate($date, 
	 	$pattern="^((0?[1-9])|([1-2][0-9])|(3[0-1]))([\/\-])((0?[1-9])|(1[0-2]))([\/\-])(2[0-9]{3})$") {
		
		return ereg($pattern, $date);
	}
	
	public function isInString($substr, $str) {
		return ereg($substr, $str);
	}


}


?>
