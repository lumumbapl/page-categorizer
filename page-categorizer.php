<?php
/**
 * Plugin Name: Page Categorizer
 * Plugin URI: https://github.com/lumumbapl/page-categorizer
 * Description: Easily add Categories and Tags to Pages. Simply activate and visit the Page Edit screen.
 * Author: Patrick Lumumba
 * Version: 1.2.0
 * Author URI: https://lumumbas.blog/
 * License:  GPL2
 * Text Domain: page-categorizer
 * Requires at least: 5.7
 * Requires PHP: 5.6
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

function pagecate_register_taxonomies() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'pagecate_register_taxonomies');

function pagecate_modify_archive_query($wp_query) {
    if ($wp_query->is_main_query() && !is_admin() && ($wp_query->is_category() || $wp_query->is_tag())) {
        $my_post_array = array('post', 'page');
        if ($wp_query->get('category_name') || $wp_query->get('cat'))
            $wp_query->set('post_type', $my_post_array);
        if ($wp_query->get('tag'))
            $wp_query->set('post_type', $my_post_array);
    }
}
add_action('pre_get_posts', 'pagecate_modify_archive_query');
