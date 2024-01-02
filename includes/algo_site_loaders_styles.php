<?php

/*
 * Load CSS for plugins admin panel (specific menu page)
 */

add_action("admin_enqueue_scripts","algo_site_loaders_admin_styles",10);
function algo_site_loaders_admin_styles($hook){
    wp_register_style(
      "algo_site_loaders_admin",
        ALGO_SITE_LOADERS."admin/css/algo_site_loaders_admin_styles.css",
        [],
        time()
    );
    if( ('toplevel_page_algo_site_loaders' || 'algo_site_loaders_about') == $hook ){
        wp_enqueue_style("algo_site_loaders_admin");
    }
}

/*
 * Load CSS for Frontend single page or post
 */

add_action("wp_enqueue_scripts", "algo_site_loaders_frontend_styles");
function algo_site_loaders_frontend_styles($hook)
{
    wp_register_style(
        "algo_site_loaders_frontend",
        ALGO_SITE_LOADERS."frontend/css/algo_site_loaders_frontend_styles.css",
        [],
        time()
    );

    wp_enqueue_style("algo_site_loaders_frontend");

}