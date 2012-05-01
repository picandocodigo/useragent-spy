<?php
//Detect webbrowsers:
function detect_webbrowser($useragent){
	$uas_browser = array();

	$mobile = 0;

	if (preg_match('#Arora/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://code.google.com/p/arora/";
		$uas_browser['name'] = "Arora";
		$uas_browser['code'] = "arora";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Amaya/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.w3.org/Amaya/";
		$uas_browser['name'] = "Amaya";
		$uas_browser['code'] = "amaya";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#K-Meleon([/.0-9a-zA-Z]+)?#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://kmeleon.sourceforge.net/";
		$uas_browser['name'] = "K-Meleon";
		$uas_browser['code'] = "kmeleon";
		$uas_version = $regmatch[1];
	}elseif (preg_match('/MSIE/', $useragent)){
		$uas_browser['link'] = "http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
		$uas_browser['name'] = "Internet Explorer";
		$uas_browser['code'] = "ie";
		if (preg_match('/MSIE ([.0-9]+)/i',$useragent, $regmatch)) {
			$uas_version = $regmatch[1];
		}
	}elseif (preg_match('#Konqueror/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://konqueror.kde.org";
		$uas_browser['name'] = "Konqueror";
		$uas_browser['code'] = "konqueror";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Opera/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://opera.com";
		$uas_browser['code'] = "opera";
		$uas_version = $regmatch[1];
		$uas_browser['name'] = "Opera";
		$mobile=1;
	}elseif(preg_match('#w3m/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://w3m.sourceforge.net/";
		$uas_browser['name'] = "W3M";
		$uas_browser['code'] = "w3m";
		$uas_version = $regmatch[1];
	}elseif(preg_match('/Links/i', $useragent)){
		$uas_browser['link'] = "http://links.sourceforge.net/";
		$uas_browser['name'] = "Links";
		$uas_browser['code'] = "links";
	}elseif(preg_match('#Lynx/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://lynx.browser.org/";
		$uas_browser['name'] = "Lynx";
		$uas_browser['code'] = "lynx";
		$uas_version = $regmatch[1];
	}elseif(preg_match('/NetSurf/i', $useragent)){
		$uas_browser['link'] = "http://www.netsurf-browser.org/";
		$uas_browser['name'] = "NetSurf";
		$uas_browser['code'] = "netsurf";
	}elseif(preg_match('#Dillo/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.dillo.org/";
		$uas_browser['name'] = "Dillo";
		$uas_browser['code'] = "dillo";
		$uas_version = $regmatch[1];
	}elseif(preg_match('/Maxthon/i', $useragent)){
		$uas_browser['link'] = "http://www.maxthon.com/";
		$uas_browser['name'] = "Maxthon";
		$uas_browser['code'] = "maxthon";
	}elseif(preg_match('#Kazehakase/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://kazehakase.sourceforge.jp/";
		$uas_browser['name'] = "Kazehakase";
		$uas_browser['code'] = "kazehakase";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Sleipnir/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://www.fenrir-inc.com/other/sleipnir/";
		$uas_browser['name'] = "Sleipnir";
		$uas_browser['code'] = "sleipnir";
		$uas_version = $regmatch[1];
	}elseif(preg_match('/midori/i', $useragent)){
		$uas_browser['link'] = "http://www.twotoasts.de/index.php?/pages/midori_summary.html";
		$uas_browser['name'] = "Midori";
		$uas_browser['code'] = "midori";
	}elseif(preg_match('#Chrome/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://google.com/chrome/";
		$uas_browser['name'] = "Google Chrome";
		$uas_browser['code'] = "chrome";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Fennec/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "https://wiki.mozilla.org/Fennec";
		$uas_browser['name'] = "Fennec";
		$uas_browser['code'] = "fennec";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#GranParadiso/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://mozilla.org";
		$uas_browser['name'] = "Gran Paradiso";
		$uas_browser['code'] = "paradiso";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Shiretoko/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://mozilla.org";
		$uas_browser['name'] = "Shiretoko";
		$uas_browser['code'] = "paradiso";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Camino/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://caminobrowser.org/";
		$uas_browser['name'] = "Camino";
		$uas_browser['code'] = "camino";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Minefield/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.mozilla.org/projects/minefield/";
		$uas_browser['name'] = "Minefield";
		$uas_browser['code'] = "minefield";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#BonEcho/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.mozilla.org/projects/bonecho/";
		$uas_browser['name'] = "BonEcho";
		$uas_browser['code'] = "paradiso";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Iceape/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://packages.debian.org/iceape";
		$uas_browser['name'] = "IceApe";
		$uas_browser['code'] = "iceape";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#SeaMonkey/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.seamonkey-project.org/";
		$uas_browser['name'] = "SeaMonkey";
		$uas_browser['code'] = "seamonkey";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Wyzo/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.wyzo.com/";
		$uas_browser['name'] = "Wyzo";
		$uas_browser['code'] = "wyzo";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Swiftfox#i', $useragent)){
		$uas_browser['link'] = "http://getswiftfox.com/";
		$uas_browser['name'] = "Swiftfox";
		$uas_browser['code'] = "swiftfox";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Songbird/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://getsongbird.com/";
		$uas_browser['name'] = "Songbird";
		$uas_browser['code'] = "songbird";
		$uas_version =$regmatch[1];
	}elseif (preg_match('#IceWeasel/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://geticeweasel.org";
		$uas_browser['name'] = "Debian IceWeasel";
		$uas_browser['code'] = "iceweasel";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#IceCat/([.a-zA-Z0-9]+)#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://gnuzilla.gnu.org";
		$uas_browser['name'] = "GNU IceCat";
		$uas_browser['code'] = "icecat";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Firefox/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://mozilla.org";
		$uas_browser['name'] = "Firefox";
		$uas_browser['code'] = "firefox";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Galeon/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://galeon.sourceforge.net/";
		$uas_browser['name'] = "Galeon";
		$uas_browser['code'] = "galeon";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Epiphany/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.gnome.org/projects/epiphany/";
		$uas_browser['name'] = "Epiphany";
		$uas_browser['code'] = "epiphany";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Lobo/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://lobobrowser.org/";
		$uas_browser['name'] = "Lobo";
		$uas_browser['code'] = "lobo";
		$uas_version = $regmatch[1];
	}elseif (preg_match('/Shiira/i', $useragent)){
		$uas_browser['link'] = "http://shiira.jp/en.php";
		$uas_browser['name'] = "Shiira";
		$uas_browser['code'] = "shiira";
	}elseif (preg_match('#Sunrise/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.sunrisebrowser.com/";
		$uas_browser['name'] = "Sunrise";
		$uas_browser['code'] = "sunrise";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Omniweb/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.omnigroup.com/applications/omniweb/";
		$uas_browser['name'] = "OmniWeb";
		$uas_browser['code'] = "omniweb";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#Safari/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
		$uas_browser['link'] = "http://www.apple.com/safari/";
		$uas_browser['name'] = "Safari";
		$uas_browser['code'] = "safari";
		$uas_version = $regmatch[1];
	}elseif(preg_match('#Mozilla/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://mozilla.org";
		$uas_browser['name'] = "Mozilla Compatible";
		$uas_browser['code'] = "mozilla";
		$uas_version = $regmatch[1];
	}else{
		$uas_browser['link'] = "#";
		$uas_browser['name'] = "Unknown";
		$uas_browser['code'] = "null";
	}
	$uas_browser['name'] .= " " . $uas_version;
	return $uas_browser;
}

function detect_trackback(){
	global $useragent, $uaspy_trackback;
	$uaspy_trackback =1;
	$uas_browser['code'] = "/net/";
	if(preg_match('#WordPress/([.0-9a-zA-Z]+)#i',$useragent,$regmatch)){
		$uas_browser['link'] = "http://wordpress.org";
		$uas_browser['name'] = "WordPress";
		$uas_browser['code'] = "wordpress";
		$uas_version = $regmatch[1];
	}elseif (preg_match('/Feedburner/i',$useragent,$regmatch)){
		$uas_browser['link'] = "http://feedburner.com";
		$uas_browser['name'] = "FeedBurner";
		$uas_browser['code'] = "feedburner";
		$uas_version ="";
	}elseif (preg_match('#pligg#i',$useragent,$regmatch)){
		$uas_browser['link'] = "http://pligg.com";
		$uas_browser['name'] = "Pligg";
		$uas_browser['code'] = "pligg";
		$uas_version ="";
	}elseif (preg_match('#meneame#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://meneame.net";
		$uas_browser['name'] = "Meneame";
		$uas_browser['code'] = "meneame";
	}elseif(preg_match('#MovableType/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://www.movabletype.org/";
		$uas_browser['name'] = "MovableType";
		$uas_browser['code'] = "movabletype";
		$uas_version = $regmatch[1];
	}elseif (preg_match('#laconica|statusnet#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://status.net/";
		$uas_browser['name'] = "StatusNet";
		$uas_browser['code'] = "laconica";
	}elseif (preg_match('#vBSEO#i', $useragent, $regmatch)){
		$uas_browser['link'] = "http://www.vbseo.com/";
		$uas_browser['name'] = "vBSEO (VBulletin)";
		$uas_browser['code'] = "vbseo";
	}else{
		$uas_browser['link'] = "";
		$uas_browser['name'] = "Unknown";
		$uas_browser['code'] = "null";
	}
	return $uas_browser;
}