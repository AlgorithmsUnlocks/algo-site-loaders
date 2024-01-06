<?php

// Plugins header define for Algo Site Loaders
/*
 * Plugin Name:         Algo Site Loaders
 * Plugin URI:          https://wordpress.org/plugins/algo-site-loaders
 * Description:         Algo Site Loaders is a simple loader plugin that can create awesome loader animations for your sites.
 * Version:             1.0.0
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Contributor:         algorithmsunlocks
 * Author:              Ruman Ahmed
 * Author URI:          https://algounlocks.com
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         algo-site-loaders
 * Domain Path:         /languages
 */

if (!defined('WPINC')) {
    die;
}

/*
 * Plugins Base URL
 */
define('ALGO_SITE_LOADERS', plugin_dir_url(__FILE__));

/*
 * Including Menu, Script, Styles, Google Fonts, Boostrap CSS/JS Loads.
 */
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_menus.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_styles.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_scripts.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_google_fonts.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_boostrap_load.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_ajax_load.php');


/*
 * Algo Site Loaders Setting Links
 */
function algo_site_loaders_add_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=algo_site_loaders">' . __('Settings', 'algo_site_loaders') . '</a>';
    array_push($links, $settings_link);
    return $links;
}
$filter_name = 'plugin_action_links_' . plugin_basename(__FILE__);
add_filter($filter_name, 'algo_site_loaders_add_settings_link');

/*
 * Load AJAX VIA PHP
 */
add_action('wp_ajax_save_loader_to_database', 'algo_site_loaders_ajax_handler_function');
add_action('wp_ajax_nopriv_save_loader_to_database', 'algo_site_loaders_ajax_handler_function');
function algo_site_loaders_ajax_handler_function(): void
{
    wp_send_json_success('AJAX Data received');
    wp_die();
}

/*
 * Save Loader to the Database option tables
 * Add AJAX action for saving loader options
 */
add_action('wp_ajax_save_loader_options', 'save_loader_options');
function save_loader_options() {
    if (isset($_POST['selectedLoader']) || isset($_POST['selectedColor'])) {
        $selectedLoader = sanitize_text_field($_POST['selectedLoader']);
        $selectedColor = sanitize_text_field($_POST['selectedColor']);

        update_option('selected_loader', $selectedLoader);
        update_option('selected_color', $selectedColor);

        $response = 'Loader Save Successfully';
        $status_code = 200;
        wp_send_json_success($selectedLoader, $response, $status_code);

    } else {
        wp_send_json_error('Error: Missing data.');
    }
}

/*
 * Fetch Loaders options
 * Push HTML code to the Websites Front-end based on the users selected loaders
 */
function algo_site_loaders_push_custom_html_after_body_open():void {
    include(plugin_dir_path(__FILE__).'pages/loader_html.php');
}
add_action('wp_body_open', 'algo_site_loaders_push_custom_html_after_body_open');
