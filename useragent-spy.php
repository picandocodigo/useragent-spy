<?php
/*
Plugin Name: UserAgent Spy
Plugin URI: http://picandocodigo.net
Description: UserAgent-Spy is a WordPress plugin which displays the user's Operative System and Web Browser in the comments. It uses the comment->agent property to access the UserAgent string, and through a series of regular expresions, detects the O.S. and browser. Then it shows a message with an icon of the browser and O.S.
Version: 1.0rc2
Author: Fernando Briano
Author URI: http://picandocodigo.net
*/

/* Copyright 2008  Fernando Briano  (email : transformers.es@gmail.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

//Load plugin options:
$url_img=get_option('siteurl')."/wp-content/plugins/useragent-spy/img/";
$url_os=get_option('siteurl')."/wp-content/plugins/useragent-spy/img/os/";

$uasize = get_option('uaspy_size'); //Image size
$surfing = get_option('uaspy_surfing'); //Word for "Using"
$on=get_option('uaspy_on'); //Word for "on"
$ualocation = get_option('uaspy_location');
$uabool = get_option('uaspy_uabool');
$uatext = get_option('uaspy_show_text');
$uatracksize = get_option('uaspy_track_size'); //Image size for trackbacks


//Detect webbrowsers:
function detect_webbrowser(){
    global $uatext, $surfing, $useragent, $title, $code;
    $code = "/net/";
    $mobile = 0;
    if (preg_match('#Arora/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://code.google.com/p/arora/";
        $title="Arora";
        $code.="arora";
        $version=$regmatch[1];
    }elseif (preg_match('#Amaya/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://www.w3.org/Amaya/";
        $title="Amaya";
        $code.="amaya";
        $version=$regmatch[1];
    }elseif (preg_match('#Safari/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://www.apple.com/safari/";
        $title="Safari";
        $code.="safari";
        $version=$regmatch[1];
    }elseif (preg_match('/MSIE/', $useragent)){
        $link="http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
        $title="Internet Explorer";
        $code.="ie";
        if (preg_match('/MSIE ([.0-9]+)/i',$useragent, $regmatch)) {
            $version = $regmatch[1];
        }
    }elseif (preg_match('#Konqueror/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://konqueror.kde.org";
        $title="Konqueror";
        $code.="konqueror";
        $version=$regmatch[1];
    }elseif(preg_match('#Opera/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
        $link="http://opera.com";
        $code.="opera";
        $version = $regmatch[1];
        $title="Opera";
        $mobile=1;
    }elseif(preg_match('#w3m/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
        $link="http://w3m.sourceforge.net/";
        $title="W3M";
        $code.="w3m";
        $version=$regmatch[1];
    }elseif(preg_match('/Links/i', $useragent)){
        $link="http://links.sourceforge.net/";
        $title="Links";
        $code.="links";
    }elseif(preg_match('#Lynx/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://lynx.browser.org/";
        $title="Lynx";
        $code.="lynx";
        $version=$regmatch[1];
    }elseif(preg_match('/NetSurf/i', $useragent)){
        $link="http://www.netsurf-browser.org/";
        $title="NetSurf";
        $code.="netsurf";
    }elseif(preg_match('/Maxthon/i', $useragent)){
        $link="http://www.maxthon.com/";
        $title="Maxthon";
        $code.="maxthon";
    }elseif(preg_match('#Kazehakase/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
        $link="http://kazehakase.sourceforge.jp/";
        $title="Kazehakase";
        $code.="kazehakase";
        $version=$regmatch[1];
    }elseif(preg_match('#Sleipnir/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
        $link="http://www.fenrir-inc.com/other/sleipnir/";
        $title="Sleipnir";
        $code.="sleipnir";
        $version=$regmatch[1];
    }elseif(preg_match('/midori/i', $useragent)){
      $link="http://www.twotoasts.de/index.php?/pages/midori_summary.html";
      $title="Midori";
      $code.="midori";    
    }elseif(preg_match('#Chrome/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://google.com/chrome/";
        $title="Google Chrome";
        $code.="chrome";
        $version=$regmatch[1];
    }elseif(preg_match('#Fennec/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link ="https://wiki.mozilla.org/Fennec";
        $title="Fennec";
        $code.="fennec";
        $version=$regmatch[1];
    }elseif(preg_match('#GranParadiso/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link ="http://mozilla.org";
        $title="Gran Paradiso";
        $code.="paradiso";
        $version=$regmatch[1];
    }elseif(preg_match('#Shiretoko([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link ="http://mozilla.org";
        $title="Shiretoko";
        $code.="paradiso";
        $version=$regmatch[1];
    }elseif(preg_match('#Camino/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://caminobrowser.org/";
        $title="Camino";
        $code.="camino";
        $version=$regmatch[1];
    }elseif(preg_match('#Minefield/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://www.mozilla.org/projects/minefield/";
        $title="Minefield";
        $code.="minefield";
        $version=$regmatch[1];
    }elseif(preg_match('#Iceape/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://packages.debian.org/iceape";
        $title="IceApe";
        $code.="iceape";
        $version=$regmatch[1];
    }elseif(preg_match('#SeaMonkey/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://www.seamonkey-project.org/";
        $title="SeaMonkey";
        $code.="seamonkey";
        $version=$regmatch[1];
    }elseif (preg_match('#Swiftfox#i', $useragent)){
        $link="http://mozilla.org";
        $title="Firefox";
        $code.="firefox";
        $version=$regmatch[1];
    }elseif (preg_match('#Firefox/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://mozilla.org";
        $title="Firefox";
        $code.="firefox";
        $version=$regmatch[1];
    }elseif (preg_match('#IceWeasel/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://geticeweasel.org";
        $title="Debian IceWeasel";
        $code.="iceweasel";
        $version=$regmatch[1];
    }elseif (preg_match('#IceCat/([.a-zA-Z0-9]+)#i', $useragent, $regmatch)){
        $link="http://gnuzilla.gnu.org";
        $title="GNU IceCat";
        $code.="icecat";
        $version=$regmatch[1];
    }elseif (preg_match('#Galeon/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://galeon.sourceforge.net/";
        $title="Galeon";
        $code.="galeon";
        $version=$regmatch[1];
    }elseif (preg_match('#Epiphany/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://www.gnome.org/projects/epiphany/";
        $title="Epiphany";
        $code.="epiphany";
        $version=$regmatch[1];
    }elseif (preg_match('#Lobo/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://lobobrowser.org/";
        $title="Lobo";
        $code.="lobo";
        $version=$regmatch[1];
    }elseif (preg_match('#K-Meleon/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://kmeleon.sourceforge.net/";
        $title="K-Meleon";
        $code.="kmeleon";
        $version=$regmatch[1];
    }elseif (preg_match('/Shiira/i', $useragent)){
        $link="http://shiira.jp/en.php";
        $title="Shiira";
        $code.="shiira";
   }elseif (preg_match('#Sunrise/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://www.sunrisebrowser.com/";
        $title="Sunrise";
        $code.="sunrise";
        $version=$regmatch[1];
   }elseif (preg_match('#Wyzo/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $link="http://www.wyzo.com/";
        $title="Wyzo";
        $code.="wyzo";
    }elseif(preg_match('#Mozilla/([.0-9a-zA-Z]+)#i', $useragent, $regmatch)){
        $link="http://mozilla.org";
        $title="Mozilla Compatible";
        $code.="mozilla";
        $version=$regmatch[1];
    }else{
        $link="#";
        $title="Unknown";
        $code.="null";
        $version="";
    }
    $title.=" ".$version;
    $img=img($title, $code);
    switch ($uatext){
        case 1; //true
            $uasret = $surfing." ".$img." <a href='".$link."' title='".$title."'>".$title."</a>";
            break;
        case 0;
            $uasret = $img;
            break;
    }
    return $uasret;
}

//Detect Operative System:
function detect_os(){
    global $useragent, $os, $code,$url_os, $url_img, $on, $uabool, $uatext, $uaspy_os, $uaspy_device;
    $uaspy_device = false;
    $code = "/os/";
    if (preg_match('#(Windows|Win) ([a-zA-Z0-9.\ ]+)#i', $useragent, $regmatch)){
        $os = "Windows";
        $code.="win";
        detect_win($regmatch[0]);
    }elseif (preg_match('/Mac/i', $useragent)){
        $os="Mac OS";
        $code.="mac";
        $uaspy_device = true;
    }elseif (preg_match('/Linux/i', $useragent)){
        detect_distro();
        $uaspy_device = true;
    }elseif (preg_match('/FreeBSD/i', $useragent)){
        $os="FreeBSD";
        $code.="freebsd";
    }elseif (preg_match('/OpenBSD/i', $useragent)){
        $os="OpenBSD";
        $code.="openbsd";
    }elseif (preg_match('/Solaris/i', $useragent)){
        $os="Solaris";
        $code.="solaris";
    }elseif (preg_match('#SymbianOS/([.0-9a-zA-Z]+)#i', $useragent,$regmatch)){
        $os="SymbianOS";
        $code.="symbian";
        $version=$regmatch[1];
        $os.=" ".$version;
        $uaspy_device = true;
    }else{
        $os="Unknown O.S.";
        $code.="null";	
    }
    $img_os=img($os, $code);
    switch ($uatext){
        case 1; //true
            $uaret = " ".$on." ".$img_os." ".$os;
            break;
        case 0;
            $uaret = $img_os;
            break;
    }
    if($uaspy_device==true){
        $uaret.=" ".detect_device();
    }
    return $uaret;
}

//Detect device (cellphone, console, etc.)
function detect_device(){
    global $useragent, $code;
    $code = "/dev/";
    if (preg_match('/iPhone/i', $useragent)){
        $device ="iPhone";
        $code.="iphone";
        $uaret = img($device, $code);
    }elseif(preg_match('/nokia/i', $useragent)){
        $device = "Nokia";
        $code.="nokia";
        $uaret = img($device, $code);
    }else{
        $uaret = "";
    }
    return $uaret;
}

//Create img string:
function img($title, $code){
  global $uasize, $url_img, $uatracksize,$uaspy_trackback;
  if($uasize==""){
        $uasize=16;
    }
    if($uatracksize==""){
        $uatracksize=16;
    }
    //Set the img to display browser/os
    //src=http://blogurl/plugins,etc/size/os-net/code.png
    if($uaspy_trackback==1){
        $uasimg ="<img src='".$url_img.$uatracksize.$code.".png' title='".$title."' style='border:0px;' alt='".$title."'/>";
    }else{
        $uasimg ="<img src='".$url_img.$uasize.$code.".png' title='".$title."' style='border:0px;' alt='".$title."'/>";
    }
    return $uasimg;
}

//Detect GNU/Linux distros
function detect_distro(){
    global $useragent, $code, $url_os, $os, $link;
    if(preg_match('/Debian/i', $useragent)){
        $link="http://debian.org";
        $os="Debian GNU/Linux";
        $code.="debian";
    }elseif(preg_match('/CentOs/', $useragent)){
        $link="";
        $os="CentOs";
        $code.="centos";
    }elseif(preg_match('/Gentoo/i', $useragent)){
        $link="http://gentoo.org/";
        $os="Gentoo";
        $code.="gentoo";
    }elseif(preg_match('/Fedora/i', $useragent)){
        $link="htt[://fedoraproject.org//";
        $os="Fedora";
        $code.="fedora";
    }elseif(preg_match('/Xubuntu/i', $useragent)){
        $link="http://xubuntu.org";
        $os="Xubuntu";
        $code.="xubuntu";
    }elseif(preg_match('/Kubuntu/i', $useragent)){
        $link="http://kubuntu.org";
        $os="Kubuntu";
        $code.="kubuntu";
    }elseif(preg_match('/Ubuntu/i', $useragent)){
        $link="http://ubuntu.org";
        $os="Ubuntu";
        $code.="ubuntu";
    }elseif(preg_match('/Slackware/i', $useragent)){
        $link="http://slackware.com/";
        $os="Slackware";
        $code.="slackware";
    }elseif(preg_match('/OLPC/', $useragent)){
        $link="http://laptop.org/";
        $os="OLPC (XO)";
        $code.="olpc";
    }elseif(preg_match('/Suse/i', $useragent)){
        $link="http://www.opensuse.org/";
        $os="SuSE";
        $code.="suse";
    }elseif(preg_match('/Zenwalk/i', $useragent)){
        $link="http://www.zenwalk.org/";
        $os="Zenwalk GNU Linux";
        $code.="zenwalk";
    }else{
        $os="GNU/Linux";
        $code.="linux";
    }
}
//Detect Windows Version:
function detect_win($ver_match){
  global $os, $uaspy_device;
  if (preg_match('/NT 6.0/i',$ver_match)){
    $os.=" Vista";
  }elseif (preg_match('/NT 5.1/i',$ver_match)){
    $os.=" XP";
  }elseif (preg_match('/NT 5.0/i',$ver_match)){
    $os.=" 2000";
  }elseif (preg_match('/9x 4.90/i',$ver_match)){
    $os.=" ME";
  }elseif (preg_match('/NT4.0/i',$ver_match)){
    $os.=" NT 4";
  }elseif (preg_match('/NT/i',$ver_match)){
    $os.=" NT";
  }elseif (preg_match('/Win98/i',$ver_match)){
    $os.=" 98";
  }elseif (preg_match('/CE/i',$ver_match)){
    $os.=" CE";
    $uaspy_device = true;
  }elseif (preg_match('/NT 6.1/i',$ver_match)){
    $os.=" 7";
  }else{
    $os.=" Unknown";
  }
}

//Check if it works...
function detect_trackback(){
    global $useragent, $uaspy_trackback;
    $uaspy_trackback =1;
    $code = "/net/";
    if(preg_match('#WordPress/([.0-9a-zA-Z]+)#i',$useragent,$regmatch)){
        $link="http://wordpress.org";
        $title="WordPress";
        $code.="wordpress";
        $version=$regmatch[1];
    }elseif (preg_match('/Feedburner/i',$useragent,$regmatch)){
        $link="http://feedburner.com";
        $title="FeedBurner";
        $code.="feedburner";
        $version="";
    }elseif (preg_match('#pligg#i',$useragent,$regmatch)){
        $link="http://pligg.com";
        $title="Pligg";
        $code.="pligg";
        $version="";
    }elseif (preg_match('#meneame#i', $useragent, $regmatch)){
        $link="http://meneame.net";
        $title="Meneame";
        $code.="meneame";
    }else{
        $link="";
        $title="Unknown";
        $code.="null";
    }
    $title.=" ".$version;
    $img = img($title, $code);
    switch ($uatext){
        case 1; //true
            $uasret = $img." <a href='".$link."' title='".$title."'>".$title."</a>";
            break;
        case 0;
            $uasret = $img;
            break;
    }
    return $uasret;
}

//Main function
function useragent_spy(){
	global $comment, $useragent, $ualocation, $uaspy_trackback;
        $uaspy_trackback =0;
	get_currentuserinfo();
	$useragent = $comment->comment_agent;
	if($ualocation=="before"){
		display_useragentspy();
		uaspy_comment();
		add_filter('comment_text', 'useragent_spy');
	}elseif($ualocation=="after"){
		uaspy_comment();
		display_useragentspy();
		add_filter('comment_text', 'useragent_spy');
	}
}

//Function to form the final String
function display_useragentspy(){
    global $uabool,$comment;
    //Check if the comment is a trackback.
    if($comment->comment_type=='trackback' || $comment->comment_type=='pingback'){
        $uaspy = detect_trackback();
    }else{
        $uaspy = detect_webbrowser();
        $uaspy .= detect_os();
    }
    echo $uaspy;
    if($uabool=='true'){
        echo "<br/><small>".htmlspecialchars($comment->comment_agent)."</small>";
    }
}

//Custom function
function useragent_spy_custom(){
	global $ualocation;
	if($ualocation=="custom"){
		global $comment, $useragent, $ualocation;
		get_currentuserinfo();
		$useragent= $comment->comment_agent;
		display_useragentspy();
	}
}
//Utilitary functions for filters and stuff.
function uaspy_comment(){
	global $comment;
	remove_filter('comment_text', 'useragent_spy');
	apply_filters('get_comment_text', $comment->comment_content);
	echo apply_filters('comment_text', $comment->comment_content);
}
function add_option_page(){
	add_options_page('UserAgent Spy', 'UserAgent Spy', 'manage_options','useragent-spy/useragent-spy-options.php');
}
add_action('admin_menu', 'add_option_page');
if ($ualocation!='custom'){
	add_filter('comment_text', 'useragent_spy');
}

?>