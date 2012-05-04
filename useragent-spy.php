<?php
/*
Plugin Name: UserAgent Spy
Plugin URI: http://picandocodigo.net
Description: UserAgent-Spy is a WordPress plugin which displays the user's Operative System and Web Browser in the comments. It uses the comment->agent property to access the UserAgent string, and through a series of regular expresions, detects the O.S. and browser. Then it shows a message with an icon of the browser and O.S.
Version: 1.3.1
Author: Fernando Briano
Author URI: http://picandocodigo.net
*/

/* 
Copyright 2008-2012  Fernando Briano  (email : fernando@picandocodigo.net)
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

// Compatibility for pre-2.6
if(!defined('WP_CONTENT_URL'))
	define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if(!defined('WP_CONTENT_DIR'))
	define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if(!defined('WP_PLUGIN_URL'))
	define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if(!defined('WP_PLUGIN_DIR'))
	define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

$uas_location = get_option('uaspy_location');
$uas_display_uastring = get_option('uaspy_uabool');

include('useragent-spy-browsers.php');
include('useragent-spy-os.php');
include('useragent-spy-devices.php');

/*
 * Create img string
 * @entity - String (dev, net, os)
 * @title - Sting, the title for the image
 * @code - String, code for the image
 */
function uas_img($entity, $name, $code){
	global $uaspy_trackback;

	//Image size
	$uas_size = get_option('uaspy_size');

	//Image size for trackbacks
	$uas_tracksize = get_option('uaspy_track_size');

	$uas_url_img = WP_PLUGIN_URL . '/useragent-spy/img';

	//Defaults:
	if(empty($uas_size)):	$uas_size = 16; endif;
	if(empty($uas_tracksize)): $uas_tracksize = 16; endif;

	//Set the img to display browser/os
	//src=http://blogurl/plugins,etc/size/os-net/code.png
	if($uaspy_trackback == 1){
		$size = $uas_tracksize;
	}else{
		$size = $uas_size;
	}

	$src = "$uas_url_img/$size/$entity/$code.png";
	return "<img src='$src' title='$name' style='border:0px;' alt='$name'/>";
}

//Main function
function useragent_spy(){
	global $comment, $uas_location, $uaspy_trackback;
	$uaspy_trackback = 0;
	get_currentuserinfo();
	$useragent = $comment->comment_agent;

	// We differentiate according to where the user wants it displayed
	if($uas_location == "before"){
		display_useragentspy($useragent);
		uaspy_comment();
		add_filter('comment_text', 'useragent_spy');
	}elseif($uas_location == "after"){
		uaspy_comment();
		display_useragentspy($useragent);
		add_filter('comment_text', 'useragent_spy');
	}
}

//Function to create the final String
function display_useragentspy($useragent){
	global $uas_display_uastring, $comment;
	$uas_data = array();

	//Check if the comment is a trackback.
	if($comment->comment_type=='trackback' || $comment->comment_type=='pingback'){
		$uas_data['browser'] = detect_trackback();
		$uas_data['browser']['image'] =
			uas_img('net', $uas_data['browser']['name'], $uas_data['browser']['code']);
	}else{
		$uas_data['browser'] = detect_webbrowser($useragent);
		$uas_data['browser']['image'] =
			uas_img('net', $uas_data['browser']['name'], $uas_data['browser']['code']);

		$uas_data['os'] = detect_os($useragent);
		$uas_data['os']['image'] =
			uas_img('os', $uas_data['os']['name'], $uas_data['os']['code']);

		$uas_data['device'] = detect_device($useragent);
	}

	if(empty($_POST['comment_post_ID'])){
		$uas_surfing = get_option('uaspy_surfing'); //Word for "Using"
		$uas_on = get_option('uaspy_on'); //Word for "on"
		$uas_text = get_option('uaspy_show_text');

		if ($uas_text){
			$uaret =  $uas_surfing . " " . $uas_data['browser']['image'] .
				" " . $uas_on . " " . $uas_data['os']['image'];
		}else{
			$uaret = $uas_data['browser']['image'] . ' ' . $uas_data['os']['image'];
		}

		if (!empty($uas_data['device'][0]['name'])){
			$uaret .= " " .
				uas_img('dev', $uas_data['device']['name'], $uas_data['device']['code']);
		}

		echo $uaret;
	}

	if($uas_display_uastring == 'true'){
		echo "<br/><small>" . htmlspecialchars($comment->comment_agent) . "</small>";
	}

}

//Custom function
function useragent_spy_custom(){
	global $uas_location;

	if($uas_location == "custom"){
		global $comment, $useragent, $uas_location;
		get_currentuserinfo();
		$useragent= $comment->comment_agent;
		display_useragentspy($useragent);
	}
}

//Util functions for filters and stuff.
function uaspy_comment(){
	global $comment;
	remove_filter('comment_text', 'useragent_spy');
	apply_filters('get_comment_text', $comment->comment_content);
	echo apply_filters('comment_text', $comment->comment_content);
}

function add_option_page(){
	add_options_page(
									 'UserAgent Spy',
									 'UserAgent Spy',
									 'manage_options',
									 'useragent-spy/useragent-spy-options.php'
									 );
}

add_action('admin_menu', 'add_option_page');

if ($uas_location != 'custom'){
	add_filter('comment_text', 'useragent_spy');
}

?>