<?php
/**
 * Plugin Name: Page Categorizer
 * Plugin URI: https://wpcorner.co/plugins/page-categorizer
 * Description: Easily add Categories and Tags to Pages. Simply activate and visit the Page Edit screen.
 * Author: WP Corner
 * Version: 1.0.0
 * Author URI: https://wpcorner.co
 * License:  GPL2
 * Text Domain: page-categorizer
 * Requires at least: 5.7
 * Requires PHP: 5.6
 */
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}
// Include the options page
require_once plugin_dir_path(__FILE__) . 'options.php';

// Enqueue admin styles
function pc_enqueue_admin_styles($hook) {
    if ('toplevel_page_page-categorizer-settings' !== $hook) {
        return;
    }
    wp_enqueue_style('pc-admin-styles', plugin_dir_url(__FILE__) . 'includes/style.css');
}
add_action('admin_enqueue_scripts', 'pc_enqueue_admin_styles');

function pc_register_taxonomies() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'pc_register_taxonomies');

function pc_modify_archive_query($wp_query) {
    if ($wp_query->is_main_query() && !is_admin() && ($wp_query->is_category() || $wp_query->is_tag())) {
        $my_post_array = array('post', 'page');
        if ($wp_query->get('category_name') || $wp_query->get('cat'))
            $wp_query->set('post_type', $my_post_array);
        if ($wp_query->get('tag'))
            $wp_query->set('post_type', $my_post_array);
    }
}
add_action('pre_get_posts', 'pc_modify_archive_query');
?>
