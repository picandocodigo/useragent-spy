<?php
/*
Plugin Name: UserAgent Spy
Plugin URI: http://picandocodigo.net
Description: UserAgent-Spy is a WordPress plugin which displays the user's Operative System and Web Browser in the comments. It uses the comment->agent property to access the UserAgent string, and through a series of regular expresions, detects the O.S. and browser. Then it shows a message with an icon of the browser and O.S.
Version: 0.4.2
Author: Fernando Briano
Author URI: http://picandocodigo.net
*/

/* Copyright 2008  Fernando Briano  (email : transformers.es@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$size = get_option('uaspy_size'); //Image size
$surfing = get_option('uaspy_surfing'); //Word for "Using"
$on=get_option('uaspy_on'); //Word for "on" 
$url_img=get_option('siteurl')."/wp-content/plugins/useragent-spy/img/";
$url_os=get_option('siteurl')."/wp-content/plugins/useragent-spy/img/os/";
$location = get_option('uaspy_location');

function img($title, $code){
	global $size, $url_img;
	if($size==""){
		$size=16;
	}
	//Set the img to display browser/os
	//src=http://blogurl/plugins,etc/size/os-net/code.png
	$var="<img src='".$url_img.$size.$code.".png' title='".$title."' border='0'>";
	return $var;
}

function detect_mozillas(){
	global $useragent, $code, $link, $title, $img;
	if(preg_match('/Epiphany/i', $useragent)){
		$link="http://gnome.org/projects/epiphany/";
		$title="Epiphany";
		$code.="epiphany";
	}elseif(preg_match('/Camino/i', $useragent)){
		$link="http://caminobrowser.org/";
		$title="Camino";
		$code.="camino";
	}elseif(preg_match('/Minefield/i', $useragent)){
		$link="http://www.mozilla.org/projects/minefield/";
		$title="Minefield";
		$code.="minefield";
	}elseif(preg_match('/Iceape/i', $useragent)){
		$link="http://packages.debian.org/iceape";
		$title="IceApe";
		$code.="iceape";
	}elseif(preg_match('/SeaMonkey/i', $useragent)){
		$link="http://www.seamonkey-project.org/";
		$title="SeaMonkey";
		$code.="seamonkey";
	}elseif (preg_match('/Firefox/i', $useragent)){
		$link="http://mozilla.org";
		$title="Firefox";
		$code.="firefox";
	}elseif (preg_match('/IceWeasel/i', $useragent)){
		$link="http://geticeweasel.org";
		$title="Debian IceWeasel";
		$code.="iceweasel";
	}elseif (preg_match('/IceCat/i', $useragent)){
		$link="http://gnuzilla.gnu.org";
		$title="GNU IceCat";
		$code.="icecat";
	}elseif (preg_match('/Galeon/i', $useragent)){
		$link="http://galeon.sourceforge.net/";
		$title="Galeon";
		$code.="galeon";
	}elseif (preg_match('/Epiphany/i', $useragent)){
		$link="http://www.gnome.org/projects/epiphany/";
		$title="Epiphany";
		$code.="epiphany";
	}elseif (preg_match('/Lobo/i', $useragent)){
		$link="http://lobobrowser.org/";
		$title="Lobo";
		$code.="lobo";
	}elseif (preg_match('/MSIE/', $useragent)){
		detect_ies();
	}else{
		$link="http://mozilla.org";
		$title="Mozilla Compatible";
		$code.="mozilla";
	}//To-do: Netscape, among others...
}

function detect_ies(){
		global $useragent, $code, $link, $title, $img;
		$link="http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
		$title="Internet Explorer";
		$code.="ie";
		//TO-DO: Detect Internet Explorer different versions and make fun of the user...
}

function detect_webbrowser($useragent){
	global $useragent, $link, $title, $code, $img;
	$code = "/net/";
	//"/expression/i" » 'i' case insensitive mode
	if (preg_match('/Arora/i', $useragent)){
		$link="http://code.google.com/p/arora/";
		$title="Arora";
		$code.="arora";
	}elseif (preg_match('/Amaya/i', $useragent)){
		$link="http://www.w3.org/Amaya/";
		$title="Amaya";
		$code.="amaya";
	}elseif (preg_match('/Konqueror/i', $useragent)){
		$link="http://konqueror.kde.org";
		$title="Konqueror";
		$code.="konqueror";
	}elseif (preg_match('/Safari/i', $useragent)){
		$link="http://www.apple.com/safari/";
		$title="Safari";
		$code.="safari";
	}elseif(preg_match('/Opera/i', $useragent)){
		$link="http://opera.com";
		$title="Opera";
		$code.="opera";
	}elseif(preg_match('/w3m/i', $useragent)){
		$link="http://w3m.sourceforge.net/";
		$title="W3M";
		$code.="w3m";
	}elseif(preg_match('/Links/i', $useragent)){
		$link="http://links.sourceforge.net/";
		$title="Links";
		$code.="links";
	}elseif(preg_match('/Lynx/i', $useragent)){
		$link="http://lynx.browser.org/";
		$title="Lynx";
		$code.="lynx";
	}elseif(preg_match('/NetSurf/i', $useragent)){
		$link="http://www.netsurf-browser.org/";
		$title="NetSurf";
		$code.="netsurf";
	}elseif(preg_match('/Maxthon/i', $useragent)){
		$link="http://www.maxthon.com/";
		$title="Maxthon";
		$code.="maxthon";
	}elseif(preg_match('/Mozilla/i', $useragent)){
		detect_mozillas($useragent);
	}else{
		//TO-DO:
		$link="#";
		$title="Unidentified browser (yet)";
		$code.="null";
	}
	$img=img($title, $code);
	$ret = $img." <a href='".$link."' target='_blank' title='".$title."'>".$title."</a>";
	return $ret;
}

function detect_os(){
	global $useragent, $url_os, $url_img, $os, $code, $on, $surfing;
	$code = "/os/";
	if (preg_match('/Windows/i', $useragent)){
		$os = "Windows";
		$code.="win";
	}elseif (preg_match('/iPhone/i', $useragent)){
		//$link="http://apple.com/iphone";
		$os="iPhone";
		$code.="iphone";
	}elseif (preg_match('/Mac/i', $useragent)){
		$os="Mac OS";
		$code.="mac";
	}elseif (preg_match('/Linux/i', $useragent)){
		detect_distro();
	}elseif (preg_match('/FreeBSD/i', $useragent)){
		$os="FreeBSD";
		$code.="freebsd";
	}elseif (preg_match('/OpenBSD/i', $useragent)){
		$os="OpenBSD";
		$code.="openbsd";
	}elseif (preg_match('/Solaris/i', $useragent)){
		$os="Solaris";
		$code.="solaris";
	}else{
		$os="Unknown O.S.";
		$code.="null";	
	}
	$img_os=img($os, $code);
	if($surfing==""){
		echo "Using ";
	}else{
		echo $surfing." ";
	}
	echo detect_webbrowser($useragent)." ";
	if($on==""){
		echo " on ";
	}else{
		echo $on." ";
	}
	echo $img_os." ".$os;
	/*Allow admin to check the User-Agent string*/
	global $user_ID, $post, $comment;
	get_currentuserinfo();
	if (user_can_edit_post_comments($user_ID, $post->ID)) {
		echo "<br/><small>".htmlspecialchars($comment->comment_agent)."</small>";
	}
}

function detect_distro(){
	global $useragent, $code, $url_os, $os;
	if(preg_match('/Debian/i', $useragent)){
		$link="http://debian.org";
		$os="Debian GNU/Linux";
		$code.="debian";
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
	}else{
		$os="GNU/Linux";
		$code.="linux";
	}
}

function useragent_spy(){
	global $comment, $useragent, $location;
	get_currentuserinfo();
	$useragent= $comment->comment_agent;
	if($location=="before"){
		echo "<p>".detect_os($url_os, $url_img, $useragent);
		uaspy_comment();
		add_filter('comment_text', 'useragent_spy');	
	}elseif($location=="after"){
		uaspy_comment();
		echo detect_os($url_os, $url_img, $useragent)."</p>";
		add_filter('comment_text', 'useragent_spy');
	}elseif($location=="custom"){
		remove_filter('comment_text', 'useragent_spy');
		echo detect_os($url_os, $url_img, $useragent);
	}
}

function uaspy_comment(){
	global $comment;
	remove_filter('comment_text', 'useragent_spy');
	apply_filters('get_comment_text', $comment->comment_content);	
	echo apply_filters('comment_text', $comment->comment_content);	
}

//Deprecated, use useragent_spy() instead
function useragent_spy_custom(){
	global $location;
	if($location=="custom"){
		useragent_spy();
	}
}

function add_option_page(){
	add_options_page('UserAgent Spy', 'UserAgent Spy', 'manage_options','useragent-spy/useragent-spy-options.php');
}

add_action('admin_head', 'add_option_page');
add_filter('comment_text', 'useragent_spy');

?>
