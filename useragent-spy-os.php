<?php
//Detect Operative System:
function detect_os($useragent){
	$uas_os = array();
	if (preg_match('#(Windows|Win) ([a-zA-Z0-9.\ ]+)#i', $useragent, $regmatch)){
		$uas_os['name'] = "Windows";
		$uas_os['code'] = "win";
		$uas_os['name'] .= " " . detect_win($regmatch[0]);
	}elseif (preg_match('/Mac/i', $useragent)){
		$uas_os['name'] = "Mac OS";
		$uas_os['code'] = "mac";
	}elseif (preg_match('/Linux/i', $useragent)){
		$uas_os = detect_distro($useragent);
	}elseif (preg_match('/CrOS/', $useragent)){
		$uas_os = "Chrome OS";
		$uas_os['code'] = "chrome";
	}elseif (preg_match('/FreeBSD/i', $useragent)){
		$uas_os['name'] = "FreeBSD";
		$uas_os['code'] = "freebsd";
	}elseif (preg_match('/OpenBSD/i', $useragent)){
		$uas_os['name'] = "OpenBSD";
		$uas_os['code'] = "openbsd";
	}elseif (preg_match('/Solaris/i', $useragent)){
		$uas_os['name'] = "Solaris";
		$uas_os['code'] = "solaris";
	}elseif (preg_match('/Nintendo Wii/i', $useragent)){
		$uas_os['name'] = "Nintendo Wii";
		$uas_os['code'] = "wii";
	}elseif(preg_match('/Nintendo DSi/i', $useragent)){
		$uas_os['link'] = "http://www.nintendodsi.com/";
		$uas_os['title'] = "Nintendo DSi";
		$uas_os['code'] = "ndsi";
	}elseif (preg_match('#SymbianOS/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
		$uas_os['name'] = "SymbianOS";
		$uas_os['code'] = "symbian";
		$uas_os['version'] = $regmatch[1];
	}else{
		$uas_os['name'] = "Unknown O.S.";
		$uas_os['code'] = "null";
	}
	return $uas_os;
}

//Detect GNU/Linux distros
function detect_distro($useragent){
	if(preg_match('/Debian/i', $useragent)){
		$uas_os['link'] = "http://debian.org";
		$uas_os['name'] = "Debian GNU/Linux";
		$uas_os['code'] = "debian";
	}elseif(preg_match('/CentOs/', $useragent)){
		$uas_os['link'] = "http://www.centos.org/";
		$uas_os['name'] = "CentOs";
		$uas_os['code'] = "centos";
	}elseif(preg_match('/Gentoo/i', $useragent)){
		$uas_os['link'] = "http://gentoo.org/";
		$uas_os['name'] = "Gentoo";
		$uas_os['code'] = "gentoo";
	}elseif(preg_match('/Fedora/i', $useragent)){
		$uas_os['link'] = "http://fedoraproject.org//";
		$uas_os['name'] = "Fedora";
		$uas_os['code'] = "fedora";
	}elseif(preg_match('/Xubuntu/i', $useragent)){
		$uas_os['link'] = "http://xubuntu.org";
		$uas_os['name'] = "Xubuntu";
		$uas_os['code'] = "xubuntu";
	}elseif(preg_match('/Kubuntu/i', $useragent)){
		$uas_os['link'] = "http://kubuntu.org";
		$uas_os['name'] = "Kubuntu";
		$uas_os['code'] = "kubuntu";
	}elseif(preg_match('/Edubuntu/i', $useragent)){
		$uas_os['link'] = "http://edubuntu.org/";
		$uas_os['name'] = "Edubuntu";
		$uas_os['code'] = "edubuntu";
	}elseif(preg_match('/Ubuntu/i', $useragent)){
		$uas_os['link'] = "http://ubuntu.org";
		$uas_os['name'] = "Ubuntu";
		$uas_os['code'] = "ubuntu";
	}elseif(preg_match('/Arch\ Linux/', $useragent)){
		$uas_os['link'] = "http://www.archlinux.org/";
		$uas_os['name'] = "ArchLinux";
		$uas_os['code'] = "archlinux";
	}elseif(preg_match('/Mandriva/i', $useragent)){
		$uas_os['link'] = "http://www.mandriva.com/";
		$uas_os['name'] = "Mandriva";
		$uas_os['code'] = "mandriva";
	}elseif(preg_match('/Mint/i', $useragent)){
		$uas_os['link'] = "http://www.linuxmint.com/";
		$uas_os['name'] = "Linux Mint";
		$uas_os['code'] = "mint";
	}elseif(preg_match('/Slackware/i', $useragent)){
		$uas_os['link'] = "http://slackware.com/";
		$uas_os['name'] = "Slackware";
		$uas_os['code'] = "slackware";
	}elseif(preg_match('/PCLinuxOS/i', $useragent)){
		$uas_os['link'] = "http://www.pclinuxos.com/";
		$uas_os['name'] = "PCLinuxOS";
		$uas_os['code'] = "pclinux";
	}elseif(preg_match('/OLPC/i', $useragent)){
		$uas_os['link'] = "http://laptop.org/";
		$uas_os['name'] = "OLPC (XO)";
		$uas_os['code'] = "olpc";
	}elseif(preg_match('/Suse/i', $useragent)){
		$uas_os['link'] = "http://www.opensuse.org/";
		$uas_os['name'] = "SuSE";
		$uas_os['code'] = "suse";
	}elseif(preg_match('/Zenwalk/i', $useragent)){
		$uas_os['link'] = "http://www.zenwalk.org/";
		$uas_os['name'] = "Zenwalk GNU Linux";
		$uas_os['code'] = "zenwalk";
	}elseif(preg_match('/venenux/i', $useragent)){
		$uas_os['link'] = "http://venenux.org/";
		$uas_os['name'] = "Venenux GNU Linux";
		$uas_os['code'] = "venenux";
	}elseif(preg_match('/Android/i', $useragent)){
		$uas_os['link'] = "http://www.android.com/";
		$uas_os['name'] = "Android";
		$uas_os['code'] = "android";
	}else{
		$uas_os['name'] = "GNU/Linux";
		$uas_os['code'] = "linux";
	}
	return $uas_os;
}

//Detect Windows Version:
function detect_win($ver_match){
	if (preg_match('/NT 6.0/i',$ver_match)){
		return "Vista";
	}elseif (preg_match('/NT 5.1/i',$ver_match)){
		return "XP";
	}elseif (preg_match('/NT 5.0/i',$ver_match)){
		return "2000";
	}elseif (preg_match('/9x 4.90/i',$ver_match)){
		return "ME";
	}elseif (preg_match('/NT4.0/i',$ver_match)){
		return "NT 4";
	}elseif (preg_match('/Win98/i',$ver_match)){
		return "98";
	}elseif (preg_match('/CE/i',$ver_match)){
		return "CE";
	}elseif (preg_match('/NT 6.1|NT 7.0/i',$ver_match)){
		return "7";
	}elseif (preg_match('/NT 6.2/i',$ver_match)){
		return "8";
	}elseif (preg_match('/NT/i',$ver_match)){
		return "NT";
	}else{
		return "Unknown";
	}
}