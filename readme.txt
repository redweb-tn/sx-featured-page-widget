# SX Featured Page Widget #
*A WordPress widget to Feature a page and display its contents.*  


**Official WordPress plugin directory**: http://wordpress.org/plugins/sx-featured-page-widget/  
**Contributors:** sabrex82  
**Tags:** widget, sidebar, page widget, featured page, pages  
**Requires at least:** 3.0  
**Tested up to:** 4.3  
**Stable tag:** 1.0 
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html

## Description ##

This plugin creates a widget that features a specific page, showing its.

### Languages ###

* Français (Tunisie)

### Contributing ###
[SX Featured Page Widget](https://github.com/redweb-tn/sx-featured-page-widget) is available on GitHub. If you want to contribute, please fork it and send a pull request!

## Installation ##

1. Upload `sx-featured-page-widget` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to 'Widgets' menu and drag it to your sidebar

## Frequently Asked Questions ##

### Can I use it outside my sidebar / widget area?

Sure you can! Just call [`the_widget()`](http://codex.wordpress.org/Function_Reference/the_widget) wherever you want to display your featured page. If you want to customize it, there's four arguments:

* `page`: The page ID. *Required*.
* `title`: The widget title.

Example:
```
<?php
the_widget( 'SX_Featured_Page_Widget', array( 'page' => 734 ) );
?>
```

If you don't know the page ID, you can try [`get_page_by_path()`](http://codex.wordpress.org/Function_Reference/get_page_by_path) function:
```
<?php
the_widget( 'SX_Featured_Page_Widget', 'page=' . get_page_by_path( 'about' )->ID );
?>
```

### Can I change the default text "Continue reading"? ###

Yes. In your `functions.php` file, you cand use the `afpw_link_text` filter:
```

## Changelog ##

### 1.0 ###
* First version.
