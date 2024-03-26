<?php
/*
 * Plugin Name:         Algo Site Loaders
 * Plugin URI:          https://wordpress.org/plugins/algo-site-loaders
 * Description:         Algo Site Loaders is a simple loader plugin that can create awesome loader animations for your sites.
 * Version:             1.0.0
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Contributor:         algorithmsunlocks
 * Author:              Ruman Ahmed
 * Author URI:          https://support.algounlocks.com
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         algo-site-loaders
 * Domain Path:         /languages
 */

if (!defined('ABSPATH')) exit();

/*
 * Plugins Base URL
 */
define('ALGO_SITE_LOADERS', plugin_dir_url(__FILE__));

/*
 * Including Menu, Script, Styles, Google Fonts Load.
 */
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_menus.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_styles.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_scripts.php');
include(plugin_dir_path(__FILE__) . 'includes/algo_site_loaders_google_fonts.php');

/*
 * Algo Site Loaders Setting Links
 */
$filter_name = 'plugin_action_links_' . plugin_basename(__FILE__);
add_filter($filter_name, 'algo_site_loaders_add_settings_link');
function algo_site_loaders_add_settings_link($links) {
    $settings_url = esc_url(admin_url('admin.php?page=algo_site_loaders'));
    $settings_text = esc_html__('Dashboard', 'algo-site-loaders');
    $settings_link = '<a href="' . $settings_url . '">' . $settings_text . '</a>';

    // Create nonce
    $nonce = wp_create_nonce('algo_site_loaders_nonce');

    $deactivate_key = array_search('deactivate', array_keys($links));

    if ($deactivate_key !== false) {
        array_splice($links, $deactivate_key, 0, $settings_link . ' <span class="loader-nonce" data-nonce="' . $nonce . '"></span>'); // Add nonce to the links
    } else {
        $links[] = $settings_link . ' | <span class="loader-nonce" data-nonce="' . $nonce . '"></span>'; // Add nonce to the links
    }
    return $links;
}

/*
 * Save Loader to the Database option tables
 * Add AJAX action for saving loader options
 * Add nonce verification to your AJAX callback function algo_site_save_loader_options
 */
add_action('wp_ajax_save_loader_options', 'algo_site_save_loader_options');
function algo_site_save_loader_options(): void
{
    // Verify nonce
    $nonce = isset($_POST['algo_site_loaders_nonce']) ? sanitize_text_field(wp_unslash($_POST['algo_site_loaders_nonce'])) : '';

    if (!wp_verify_nonce($nonce, 'algo_site_loaders_nonce')) {
        wp_send_json_error('Error: Unauthorized request.');
        return;
    }

    $selectedLoader = isset($_POST['algo_site_loaders_selectedLoader']) ? sanitize_text_field($_POST['algo_site_loaders_selectedLoader']) : '';
    $selectedColor = isset($_POST['algo_site_loaders_selectedColor']) ? sanitize_text_field($_POST['algo_site_loaders_selectedColor']) : '';

    if (!empty($selectedLoader)) {
        update_option('algo_site_loaders_selectedLoader', $selectedLoader);
        wp_send_json_success('Loader saved successfully.', $selectedLoader);
    } else {
        wp_send_json_error('Error: Missing data.');
    }
}

/*
 * Fetch Loaders options
 * Push HTML code to the Websites Front-end based on the users selected loaders
 */
function algo_site_loaders_push_custom_html_after_body_open(): void {
    $file_path = plugin_dir_path(__FILE__) . 'pages/loader_html.php';

    if (file_exists($file_path)) {
        include $file_path;
    }
}
add_action('wp_body_open', 'algo_site_loaders_push_custom_html_after_body_open');
