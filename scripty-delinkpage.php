<?php
/*
Plugin Name: Delink Pages
Plugin URI: http://www.scriptygoddess.com/archives/2009/10/07/delink-pages-plugin/
Description: This plugin will let you specify certain pages that will not be linked when wp_list_pages is called. To use, add a custom field with a key of 'delink' and value 'true' or 'href' in order for the page to not have a link when the page should not have be linked when wp_list_pages is used.
Author: Jennifer Stuart
Version: 1.1
Author URI: http://scriptygoddess.com
*/

/* 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('wp_list_pages', 'scripty_de_link');

function scripty_de_link($output) {	
		$allpageids = get_posts(array('post_type' => 'page', 'numberposts' => -1));
		foreach ($allpageids as $eachpage) {
			//get custom field value for delink
			$delinkthis = get_post_meta($eachpage->ID,"delink",true);
			if ($delinkthis == "true") { 
				$newurl = preg_quote(get_permalink($eachpage->ID));
				$output = preg_replace('@\<a(.*?)href="'.$newurl.'"(.*?)>(.*?)\<\/a>@i', '$3', $output);
			} else if ($delinkthis == "href") {
				$newurl = preg_quote(get_permalink($eachpage->ID));
				$output = preg_replace('@\<a(.*?)href="'.$newurl.'"(.*?)>(.*?)\<\/a>@i', '<a href="#" $2>$3</a>', $output);
			}
		}
        return $output;
}
?>