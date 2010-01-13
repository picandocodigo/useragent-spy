=== UserAgent-Spy ===
Contributors: fernandobt
Donate Link: http://picandocodigo.net/wordpress/useragent-spy-wordpress-plugin_en/
Tags: useragent, browser, operative system, 
Requires at least: 2.0
Tested up to: 2.9
Stable tag: 1.1.2

== Description ==

UserAgent-Spy is a WordPress plugin which displays the user's Operative System and Web Browser in the comments. It uses the comment->agent property to access the UserAgent string, and through a series of regular expresions, detects the O.S. and browser. Then it shows a message with an icon of the browser and O.S.

The plugin was re-written on version 1.0rc1. It's arrived to a point where it does everything I wanted it to do, and the code was arranged so that adding new browsers, operative systems and devices is much easier now. 
Your feedback is very important, new features have been added by request, so if there’s something you would like to see in UA-Spy, leave a comment, and I’ll see what I can do.

Images created with The Gimp - http://www.gimp.org/

== Installation ==

* Upload useragent-spy folder to /wp-contents/plugins/
* Login to your WordPress Admin menu, go to Plugins, and activate it.
* In your WordPress Admin menu, you will find a new menu under Settings called UserAgent Spy. There you can choose the displayed icons size, and select where to display the plugin. There are three options for displaying the plugin:

   1. Before the comment text. User's WebBrowser and OS will be displayed before comment text.
   2. After the comment text.User's WebBrowser and OS will be displayed after comment text.
   3. Custom (Advanced). You can specify the location using the useragent_spy_custom() function inside the comments loop in your template (Generally in comments.php).
      Example:
      <?php foreach ($comments as $comment) : ?>
      <cite><?php comment_author_link() ?></cite> <?php useragent_spy_custom(); ?> says:<br />
      <?php comment_text() ?>
      CAUTION: If you select "Custom" and don't use <?php useragent_spy_custom(); ?> in your template, you won't get the information displayed.
Other options are the text to use when displaying the user's web browser and Operating System.


== Features ==

* Detects most popular web browsers and Operative Systems (It’s a work in progress, many more browsers/o.s. ’s to come)
* Shows browser icon, name, and a link to the browser’s homepage (this will be customizable in future versions).
* Shows browser/os in the comments management page (unless using “custom” option).
* Customizable, has its own Options Page where you can change the size of the browser/o.s. icon, and where you want it to be displayed.
* Published under GPLv3

Some of you may compare this to another well-known plugin named browsersniff. UserAgent-Spy is written completelly from scratch, with several improvements over browsersniff:

* Easy standard installation, just upload to wp-plugins and activate it.
* Customizable options.
* No basic knowledge of PHP or editing WordPress templates required
* Published under GPLv3.

== Frequently Asked Questions ==

No questions yet. Got any question?
http://picandocodigo.net/programacion/wordpress/useragent-spy-wordpress-plugin-en/


== Screenshots ==

1. Screenshot 1

== Change log ==

= 1.1.2=
* Added rel=nofollow to links

= 1.1.1 =
* Added Linux Mint.

= 1.1 =
* Added: ArchLinux, Mandriva, DragonFly BSD, Edubuntu, MovableType, Nintendo DS, Playstation, Wii, Chrome OS.
* Fixed bug, added pre 2.6 compatibility

= 1.0.3 =

* Added: Android, Laconica new name.
* Small fix


= 1.0.2 =

* Added laconica trackbacks and Venenux GNU/Linux detection.
* Validated readme.txt

= 1.0.1 =

* Fixed Swiftfox detection error, where image wouldn't be displayed.

= 1.0 =

* Added BonEcho, fixed some minor stuff on code. Ready to release version 1.0!

= 1.0rc2 =

* Added web browsers: Fennec, Swiftfox, K-Meleon, Shiira, Midori, Sunrise, Wyzo, Songbird, Dillo, Omniweb.

= 1.0rc1 =

* Rewrote entire code. Now easier to manage and add new stuff. Focused on adding devices detection such as cellphones and other internet-able platforms. Code is way more efficient, I think...
* Fixed options page for WordPress 2.7 (register options and stuff)
* Added CentOs operative system.
* If all goes well, version 1.0 final will be released soon :D.

= 0.7.2 =

* Added SymbianOS

= 0.7.1 =

* Fixed some path bugs
* Added null.png images for undetected OS 

= 0.7 =

* Added trackback detection for WordPress, Pligg, Meneame, and some more. Some new options are included in the Admin page.
* Fixed bug with OpenId plugin, thanks to Gonzalo (http://gon.sociallinux.org/)

= 0.6 =

* Added browser version detection.
* Added Windows versions: Windows 7, Vista, XP, 2000, ME, NT 4, NT, 98, CE - Dedicated to www.elfrancotirador.cl
* Rewrote IE version detection (sorry Albertux :P ).
* Added browsers: Kazehakase, Sleipnir.

= 0.5.4 =

* Added Gran Paradiso.
* Added Zenwalk GNU/Linux.
* Fixed missing iPhone image on 24x24, added new cool one.
* Finally fixed (hopefully) Google Chrome's detection bug. Unhappy word to use, "chrome"...

= 0.5.3.2 =

* Fixed even dumber bug, caused by the rush of getting last bug fixed...

= 0.5.3.1 =

* Fixed dumb bug which broke the whole plugin. Thanks to webmaster@illi.com.

= 0.5.3 =

* Fixed bug where Google Chrome was detected when 'chrome' was in the UserAgent string.
* Added IE version detection by Albertux (http://albertux.ayalasoft.com/)


= 0.5.2 =

* Fixed bug for automatic update installation where it deleted the images directory
* Renamed variables, they were pretty generic so they could conflict with others.

= 0.5.1 =

* Added Google Chrome (the day of its release!)

= 0.5 =

* Option to show complete useragent string.
* Went back to useragent_spy_custom() for custom display.
* Several code fixes (W3C valid XHTML, more order, etc).
* Saved settings are displayed correctly on the settings page.
* Added option to display icons only, with no text or link.
* Fixed bugs: 
      -Epiphany, when built against WebKit would display Safari.
      -Major bug which would show ua-spy in your comment management page, instead of comment text when using custom.

= 0.4.2 =

* Browser added: Lynx, Links.
* Fixed bug where the comments would show without filters.
* Changed Konqueror icon for new 4.0 version.

= 0.4.1 =

* OS added: OLPC XO, SuSE.
* Browser added: W3M, Lobo, Amaya, Maxthon, Camino, NetSurf, Minefield, IceApe, SeaMonkey.
* Fixed some code (includes a bug where OLPC was detected for certain os's).

= 0.4 =

* Made "browsing with" and "on" words in "Browsing with browser on OS" customizable in the Options page.
* Allow logged in user to see the full user-agent string (easier debugging).
* Fixed string for unidentified browser.
* OS's added: FreeBSD, OpenBSD, Solaris.

= 0.3.1 =

* Added p tags for correct formatting
* Added if in options page so that current values are selected on load.

= 0.3 =

* More web-browsers: Epiphany, Galeon, Opera, IE.
* O.S.'s: Xubuntu, Kubuntu, Ubuntu, Slackware.
* Added option to choose displaying useragent_spy before or after the comment text, or using useragent_spy() function in template.

= 0.2 =

* Detects Firefox, Epiphany.
* Detects Debian, Fedora, Gentoo, 
* Options menu under Settings Panel, allows 16x16 or 24x24 pixel images for icon size.
* Integrates into Wordpress before comments text.

= 0.1 =

* Detects Mozilla, IceWeasel, IceCat, Arora, Safari, Konqueror.
* Detects Windows, GNU/Linux, iPhone and MacOS 

= TO-DO =
* New browsers/os's are welcome.
* Links for Operative Systems.
