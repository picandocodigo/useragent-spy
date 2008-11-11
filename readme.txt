=== UserAgent-Spy ===
Contributors: fernandobt
Donate Link: http://picandocodigo.net/wordpress/useragent-spy-wordpress-plugin_en/
Tags: useragent, browser, operative system, 
Requires at least: 2.0
Tested up to: 2.6.1
Stable tag: 0.5.2

== Description ==

UserAgent-Spy is a WordPress plugin which displays the user's Operative System and Web Browser in the comments. It uses the comment->agent property to access the UserAgent string, and through a series of regular expresions, detects the O.S. and browser. Then it shows a message with an icon of the browser and O.S.

I’m adding new stuff and changing the code frequently. Your feedback is very important, new features have been added by request, so if there’s something you would like to see in UA-Spy, leave a comment, and I’ll see what I can do.

UserAgent Spy was written with Geany - http://geany.uvena.de/
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

== Release Notes ==

0.5.3
* Fixed bug where Google Chrome was detected when 'chrome' was in the UserAgent string.
* Added IE version detection by Albertux (http://albertux.ayalasoft.com/)

0.5.2
* Fixed bug for automatic update installation where it deleted the images directory
* Renamed variables, they were pretty generic so they could conflict with others.

0.5.1
* Added Google Chrome (the day of its release!)

0.5
* Option to show complete useragent string.
* Went back to useragent_spy_custom() for custom display.
* Several code fixes (W3C valid XHTML, more order, etc).
* Saved settings are displayed correctly on the settings page.
* Added option to display icons only, with no text or link.
* Fixed bugs: 
      -Epiphany, when built against WebKit would display Safari.
      -Major bug which would show ua-spy in your comment management page, instead of comment text when using custom.

0.4.2
* Browser added: Lynx, Links.
* Fixed bug where the comments would show without filters.
* Changed Konqueror icon for new 4.0 version.

0.4.1
* OS added: OLPC XO, SuSE.
* Browser added: W3M, Lobo, Amaya, Maxthon, Camino, NetSurf, Minefield, IceApe, SeaMonkey.
* Fixed some code (includes a bug where OLPC was detected for certain os's).

0.4
* Made "browsing with" and "on" words in "Browsing with browser on OS" customizable in the Options page.
* Allow logged in user to see the full user-agent string (easier debugging).
* Fixed string for unidentified browser.
* OS's added: FreeBSD, OpenBSD, Solaris.

0.3.1
* Added <p> tags for correct formatting
* Added if in options page so that current values are selected on load.

0.3
* More web-browsers: Epiphany, Galeon, Opera, IE.
* O.S.'s: Xubuntu, Kubuntu, Ubuntu, Slackware.
* Added option to choose displaying useragent_spy before or after the comment text, or using useragent_spy() function in template.

0.2
* Detects Firefox, Epiphany.
* Detects Debian, Fedora, Gentoo, 
* Options menu under Settings Panel, allows 16x16 or 24x24 pixel images for icon size.
* Integrates into Wordpress before comments text.

0.1
* Detects Mozilla, IceWeasel, IceCat, Arora, Safari, Konqueror.
* Detects Windows, GNU/Linux, iPhone and MacOS 

TO-DO:
* Allow users to modify links for each browser/OS.
* New browsers/os's are welcome.
* Browser versions.
* Links for Operative Systems.
Roadmap: 
