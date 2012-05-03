<?php
//Detect device (cellphone, console, etc.)
function detect_device($useragent){
	$uas_dev = array();
	if (preg_match('/iPhone/i', $useragent)){
		$uas_dev['name'] ="iPhone";
		$uas_dev['code'] = "iphone";
		$uas_version = uas_get_apple_version($useragent);
	}elseif(preg_match('/iPad/i', $useragent)){
		$uas_dev['name'] ="iPad";
		$uas_dev['code'] = "ipad";
		$uas_version = uas_get_apple_version($useragent);
	}elseif(preg_match('/iPod/i', $useragent)){
		$uas_dev['name'] ="iPod";
		$uas_dev['code'] = "iphone";
		$uas_version = uas_get_apple_version($useragent);
	}elseif(preg_match('/htc/i', $useragent)){
		$uas_dev['name'] = "HTC";
		$uas_dev['code'] = "htc";
	}elseif(preg_match('/nokia/i', $useragent)){
		$uas_dev['name'] = "Nokia";
		$uas_dev['code'] = "nokia";
	}elseif (preg_match('/BlackBerry/i', $useragent)){
		$uas_dev['name'] = "BlackBerry";
		$uas_dev['code'] = "bb";
	}elseif(preg_match('/PlayStation\ Portable/i', $useragent)){
		$uas_dev['name'] = "PlayStation Portable";
		$uas_dev['code'] = "psp";
	}elseif(preg_match('/PlayStation Vita ([0-9a-zA-Z.]+)/i', $useragent, $regmatch)){
		$uas_dev['name'] = "PlayStation Vita";
		$uas_dev['code'] = "vita";
		$uas_version = $regmatch[1];
	}elseif(preg_match('/PLAYSTATION 3/i', $useragent)){
		$uas_dev['name'] = "PlayStation 3";
		$uas_dev['code'] = "playstation";
	}else{
		$uas_dev = uas_check_others($useragent);
	}
	$uas_dev['name'] .= ' ' . $uas_version;
	return $uas_dev;
}

function uas_check_others($useragent){
	$uas_dev = array();
	$samsung = array('SPH-D700' => 'Epic 4G',
									 'GT-S3653' => 'Corby',
									 'GT-I9000' => 'Galaxy S',
									 'SAMSUNG-SGH-A' => 'Flight',
									 'GT-S5830' => 'Galaxy Ace',
									 'GT-S3310' => 'Metro',
									 'Galaxy Nexus' => 'Galaxy Nexus',
									 'SGH-T959' => 'Freeform III',
									 'sam-r380' => 'Vibrant Galaxy S',
									 's5620' => 'S5620 Monte',
									 'GT-I9220' => 'Galaxy Note',
									 'SGH-i900' => 'Omnia',
									 'GT-S8530' => 'Wave 2',
									 'GT-P7100' => 'Galaxy Tab',
									 'GT-S8530' => 'Wave 2',
									 'GT-I5500' => 'Galaxy Europa',
									 'GT-P1000' => 'Galaxy Pad'
									 );
	foreach($samsung as $key => $value){
		if (preg_match("/$key/i", $useragent)){
			$uas_dev['name'] = "Samsung $samsung[$key]";
			$uas_dev['code'] = 'samsung';
			break;
		}
	}
	return $uas_dev;
}

function uas_get_apple_version($useragent){
	if (preg_match('/OS ([0-9_]+)/', $useragent, $regmatch)){
		return "iOS " . str_replace("_", ".", $regmatch[1]);
	}
}