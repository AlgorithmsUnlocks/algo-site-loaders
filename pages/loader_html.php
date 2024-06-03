<?php
/*
 * Algo Site Loaders : Loader dynamics HTML/JS for the users selections
 */
if (!defined('ABSPATH')) exit();
?>


<?php
$loader = get_option('algo_site_loaders_selectedLoader');
?>
<div class="wp-sites-loader-options-cards" id="wp-sites-loader-wrapper" style="display: none;">
    <div id="<?php echo esc_attr($loader); ?>" class="wp_site_loaders_display" style="display: none"></div>
</div>
<span class="loader-nonce" data-nonce="<?php echo esc_attr(wp_create_nonce('algo_site_loaders_nonce')); ?>"></span>
<script>
    const wpSiteLoadersWrapper = document.getElementById('wp-sites-loader-wrapper');
    const wpSiteLoadersDisplay = document.querySelector('.wp_site_loaders_display');

    wpSiteLoadersWrapper.style.display = 'block';
    wpSiteLoadersDisplay.style.display = 'block';
    setTimeout(function () {
        wpSiteLoadersWrapper.style.display = 'none';
        wpSiteLoadersDisplay.style.display = 'none';
    }, 500);
</script>
