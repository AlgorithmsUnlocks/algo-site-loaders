<?php
/*
* Connect Google Fonts
*/
function algo_site_loaders_enqueue_google_fonts() {

wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100;16..144,200;16..144,300;16..144,400;16..144,500&display=swap');

}
add_action('wp_enqueue_scripts', 'algo_site_loaders_enqueue_google_fonts',10,2);