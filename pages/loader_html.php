<?php
/*
 * Algo Site Loaders : Loader dynamics HTML/JS for the users selections
 */
?>

<?php
$loader = get_option('selected_loader');
?>
<div class="wp-sites-loader-options-cards" id="wp-sites-loader-wrapper" style="display: none;">
    <div id="<?php echo $loader; ?>" class="wp_site_loaders_display" style="display: none"></div>
</div>
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