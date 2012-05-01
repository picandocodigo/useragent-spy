<?php
//Detect device (cellphone, console, etc.)
function detect_device($useragent){
	$uas_dev = array();
	if (preg_match('/iPhone/i', $useragent)){
		$uas_dev['name'] ="iPhone";
		$uas_dev['code'] = "iphone";
	}elseif(preg_match('/iPad/i', $useragent)){
		$uas_dev['name'] ="iPad";
		$uas_dev['code'] = "ipad";
	}elseif(preg_match('/iPod/i', $useragent)){
		$uas_dev['name'] ="iPod";
		$uas_dev['code'] = "iphone";
	}elseif(preg_match('/htc/i', $useragent)){
		$uas_dev['name'] = "HTC";
		$uas_dev['code'] = "htc";
	}elseif(preg_match('/nokia/i', $useragent)){
		$uas_dev['name'] = "Nokia";
		$uas_dev['code'] = "nokia";
	}elseif(preg_match('/BlackBerry/i', $useragent)){
		$uas_dev['name'] = "BlackBerry";
		$uas_dev['code'] = "bb";
	}
	return $uas_dev;
}