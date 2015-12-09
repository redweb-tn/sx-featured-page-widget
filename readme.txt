=== SX Featured Page Widget ===
Contributors: sabrex82
Author URI: http://www.sabri-elgueder.tn/
Plugin URL: http://www.redweb.tn/sx-featured-page-widget-wordpress-plugin/
Donate link: http://www.sabri-elgueder.tn/donate/
Tags: widget, sidebar, page widget, featured page, pages  
Requires at least: 3.0
Tested up to: 4.2.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress widget to Feature a page and display its contents.


== Description ==

[SX Featured Page Widget](http://www.redweb.tn/sx-featured-page-widget-wordpress-plugin/) creates a widget that features a specific page, showing its contents.

Check official website for

*   [More info](http://www.redweb.tn/sx-featured-page-widget-wordpress-plugin)					
*   [Comments/Suggestion](http://www.redweb.tn/sx-featured-page-widget-wordpress-plugin)			
*   [About author](http://www.sabri-elgueder.tn/)				

[SX Featured Page Widget](http://github.com/redweb-tn/sx-featured-page-widget) is available on GitHub. If you want to contribute, please fork it and send a pull request!

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `sx-featured-page-widget` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to 'Widgets' menu and drag it to your sidebar

== Frequently Asked Questions ==

= Can I use it outside my sidebar / widget area? =

Sure you can! Just call [`the_widget()`](http://codex.wordpress.org/Function_Reference/the_widget) wherever you want to display your featured page. If you want to customize it, there's four arguments:

* `page`: The page ID. *Required*.
* `title`: The widget title.

Example:
`
<?php
the_widget( 'SX_Featured_Page_Widget', array( 'page' => 311 ) );
?>
`

If you don't know the page ID, you can try [`get_page_by_path()`](http://codex.wordpress.org/Function_Reference/get_page_by_path) function:
`
<?php
the_widget( 'SX_Featured_Page_Widget', 'page=' . get_page_by_path( 'about' )->ID );
?>
`
[Frequently Asked Questions](http://www.redweb.tn/sx-featured-page-widget-wordpress-plugin/)

== Screenshots ==

1. Admin Screen for SX Featured Page Widget http://www.redweb.tn/sx-featured-page-widget-wordpress-plugin

== Changelog ==

= 1.0 =
* First version. Final 08/12/2015


== Upgrade Notice ==

= 1.0 =
This version fixes a security related bug.  Upgrade immediately.