<?php

if(!isset($argv[1],$argv[2])){
    die('ERROR : Failure $ARGV');
}

function chkNetmask($netmask){
	$netmask = str_replace("/", "", $netmask);
	
	$net = array();
	for($i=1; $i<=32; $i++){
		if($i < $netmask)
			$net[$i] = 1;
		else 
			$net[$i] = 0;
	}
	return $net;
}
/*
function dec2bin($ip){
	$ip = $ip%2;
	return dec2bin($ip);
}
*/
function chkIP($ip){	
	$ip = explode(".", $ip);
	$nip = array();
	
	for($i=0; $i<=count($ip); $i++){
		//if($ip[$i] <= 0 || $ip[$i] >= 255) break;
	    
		for($a = 0; $a <= 7; $a++){
			if($a > pow(2, $a)) {
				$a = $a % pow(2, $a);
				$nip[$a] = 1;
			}else 
				$nip[$a] = 0;
	   }
	}
		
	return $nip;
}

$ip = chkIP($argv[1]);
$netmask = chkNetmask($argv[2]);

print_r($ip);
?>
