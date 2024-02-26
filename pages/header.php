<!--
Algo Site Loaders Header Part
Global Loader set for the plugins
-->
<?php if (!defined('ABSPATH')) exit();  ?>

<div class="algo_site_loaders-content" id="plugin-loader"></div>

<div class="algo_site_loaders-header-wrapper">

    <div class="algo_site_loaders-header-cards">
        <?php
        $plugins_logo = esc_url(plugins_url('../assets/images/algo-site-loaders.png', __FILE__));
        ?>
        <img src="<?php echo esc_url($plugins_logo) ?>" height="96px" width="340px" class="algo_site_loaders-logo" alt='algo_site_loaders-logo'/>
    </div>
    <div class="algo_site_loaders-header-cards">
        <ul class="header-menu">
            <li> <a href="<?php echo esc_url(admin_url('admin.php?page=algo_site_loaders')); ?>"> Site Loaders </a> </li>
            <li> <a href="<?php echo esc_url(admin_url('admin.php?page=algo_site_loaders_about')); ?>"> About </a> </li>
            <li> <a href="https://wordpress.org/plugins/algo-site-loaders" target="_blank"> Explore </a> </li>
        </ul>
    </div>

</div>
<span class="loader-nonce" data-nonce="<?php echo wp_create_nonce('algo_site_loaders_nonce'); ?>"></span>

