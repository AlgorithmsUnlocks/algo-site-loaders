<?php if (!defined('ABSPATH')) exit();  ?>
<div class="wp-sites-loader-container">

    <?php
    include_once __DIR__ . '/header.php';
    ?>

    <div class="wp-sites-loader-options-wrapper">

        <div class="wp-sites-loader-options-cards">

            <h1> Loader Options (Algo Site Loaders) </h1>

            <form id="loaderForm" class="wp-sites-loader-forms">
                <label for="loaderType">Select Loader Type:</label>
                <select id="wpSitesloaderType" class="wp-sites-loader-selected">
                    <option value="wp-sites-loader1">Loader 1</option>
                    <option value="wp-sites-loader2">Loader 2</option>
                    <option value="wp-sites-loader3" disabled>Loader 3</option>
                    <option value="wp-sites-loader4" disabled>Loader 4</option>
                    <option value="wp-sites-loader5" disabled>Loader 5</option>
                </select>
                <label for="loaderColor">Select Loader Color:</label>
                <input type="color" id="loaderColor" name="loaderColor" disabled>
                <small style="color: red">Feature coming soon...</small>
                <button type="button" onclick="showLoader()" class="wp-sites-loader-form-button">Save</button>
            </form>

        </div>

        <div class="wp-sites-loader-options-cards">
            <h1> Preview of the Loaders: <span id="wpSitesloaderName" style="color: #08c5d1; font-weight: 500"> </span></h1>
            <div id="wp-sites-loader1" class="" style="display: none;"> </div>
            <div id="wp-sites-loader2" class="" style="display: none;"> </div>
            <div id="saveMessage" class="wp-sites-loader-save-message" style="display: block;"> Activated Loader:
                <?php
                $wpSiteLoaders = get_option('algo_site_loaders_selectedLoader');
                echo esc_html($wpSiteLoaders);
                ?>
            </div>
        </div>

    </div>

    <div class="wp-sites-loaders-titles">
        <h1> Loader Options (Algo Sites All Loader) </h1>
    </div>

    <div class="wp-sites-loader-all-wrapper">
        <div class="wp-sites-loader-all-cards">
            <label> Loader 1 </label>
            <div id="wp-sites-loader-all-1" class="" style="display: block;"> </div>
        </div>
        <div class="wp-sites-loader-all-cards">
            <label> Loader 2 </label>
            <div id="wp-sites-loader-all-2" class="" style="display: block;"> </div>
        </div>
    </div>
</div>

<span class="loader-nonce" data-nonce="<?php echo esc_attr(wp_create_nonce('algo_site_loaders_nonce')); ?>"></span>

