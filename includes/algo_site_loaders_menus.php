<?php

/*
 * Algo Site Loaders Menu for plugins
 */

if (!defined('ABSPATH')) exit();

add_action('admin_menu', 'algo_site_loaders_admin_menu', 10,2);
function algo_site_loaders_admin_menu()
{
    /*
     * Main Menu
        * dynamic title
        * Menu name
        * manage option
        * slug
        * callback function
        * icon
        * placement
    */
    add_menu_page(
        'Algo Site Loaders',
        'Site Loaders',
        'manage_options',
        'algo_site_loaders',
        'algo_site_loaders_menu_callback',
        'dashicons-update',
        100
    );

    /*
     * Sub Menu
        * text-domain
        * Dynamics Title
        * Menu Name
        * manage_options
        * slug
        * callback function
     */

    add_submenu_page(
        "algo_site_loaders",
        __("All Loader","algo_site_loaders"),
        __("All Loader","algo_site_loaders"),
        "manage_options",
        "algo_site_loaders_all_loaders",
        "algo_site_loaders_all_loaders_submenu_callback"
    );

    add_submenu_page(
        "algo_site_loaders",
        __("Loaders About","algo_site_loaders"),
        __("About","algo_site_loaders"),
        "manage_options",
        "algo_site_loaders_about",
        "algo_site_loaders_submenu_callback"
    );

}

/*
 * Algo Site Loaders Main Menu callback
 */
function algo_site_loaders_menu_callback()
{

    if (!current_user_can('manage_options')) {
        return;
    }
    include_once(__DIR__ . '/../pages/dashboard.php');
}

/*
 * Algo Site Loaders Submenu Markup
 */

function algo_site_loaders_submenu_callback(): void
{
    if(!current_user_can("manage_options")){
        return;
    }
    include_once(__DIR__ . '/../pages/about.php');
}

function algo_site_loaders_all_loaders_submenu_callback(): void
{
    if(!current_user_can("manage_options")){
        return;
    }
    include_once(__DIR__ . '/../pages/all_loaders.php');
}