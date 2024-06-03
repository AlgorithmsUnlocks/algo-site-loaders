<?php
/*
 * Load JS for plugins admin panel
 */
if (!defined('ABSPATH')) exit();

add_action('admin_enqueue_scripts', 'algo_site_loaders_admin_scripts');
function algo_site_loaders_admin_scripts($hook)
{
    wp_register_script(
        'algo_site_loaders_admin',
        ALGO_SITE_LOADERS . 'admin/js/algo_site_loaders_admin_scripts.js',
        [],
        time()
    );
    if (('toplevel_page_algo_site_loaders' || 'algo_site_loaders_about' ) == $hook) {
        wp_enqueue_script('algo_site_loaders_admin');
    }
}

/*
 * Load JS whole websites
 */
add_action('wp_enqueue_scripts', 'algo_site_loaders_frontend_scripts');
function algo_site_loaders_frontend_scripts($hook)
{
    wp_register_script(
        'algo_site_loaders_frontend',
        ALGO_SITE_LOADERS . 'frontend/js/algo_site_loaders_frontend_scripts.js',
        [],
        time()
    );

    wp_enqueue_script('algo_site_loaders_frontend');
}