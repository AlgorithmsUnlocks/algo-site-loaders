<?php
/*
 * Enqueue JS File For AJAX
 */
add_action('admin_enqueue_scripts', 'enqueue_algo_site_loaders_ajax_scripts');
function enqueue_algo_site_loaders_ajax_scripts($hook)
{
    wp_register_script(
        'algo_site_loaders_ajax_scripts',
        ALGO_SITE_LOADERS . 'admin/js/algo-site-loaders-ajax.js',
        ['jquery'],
        '1.0',
        true
    );
    wp_enqueue_script('algo_site_loaders_ajax_scripts');
    wp_localize_script('algo_site_loaders_ajax_scripts', 'algo_site_loaders_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
}