=== Plugin Name ===
Contributors: scripty
Donate link: http://www.scriptygoddess.com/tip-jar/
Tags: pages, unlink, wp_list_pages
Requires at least: 2.8
Tested up to: 2.8.5
Stable tag: 1.1.1

This plugin will allow you to specify certain pages to not be linked when wp_list_pages() is used in a theme.

== Description ==

This plugin will allow you to specify certain pages to not be linked when `wp_list_pages()` is used in a theme. You might want to do this if you want a header for a series of subpages, but don't specifically want that header to be a real page itself.

== Installation ==

1. Download plugin archive and expand it
2. Put scripty-delinkpage.php in your wp-content/plugins/ directory
3. Activate plugin through the 'Plugins' menu in WordPress
4. To indicate that a page should not be linked when `wp_list_pages()` is used, edit the page that you do not want linked and create a custom field with a key of "delink" and value of "true" (to have NO link at all) or "href" to change the it to link to #.

== Frequently Asked Questions ==

Please see plugin homepage.

== Screenshots ==

1. Custom field needed on page that should not have a link

== Changelog ==

= 1.1.1 =
Bug fix - now checking for random values both before and after href in the a tag with preg_replace

= 1.1 =
* added check for delink to have a value of "href" to leave page linked but only to #

= 1.0 =
* initial release