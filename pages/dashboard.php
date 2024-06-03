<?php if (!defined('ABSPATH')) exit();  ?>
<div class="wp-sites-loader-container">

    <?php
    include_once __DIR__ . '/header.php';
    ?>

    <div class="wp-sites-loader-options-wrapper">

        <div class="wp-sites-loader-options-cards">

            <h1> Loader Options</h1>

            <form id="loaderForm" class="wp-sites-loader-forms">

               <div class="inputs-wrapper">
                   <label for="loaderType">Select Loader Type</label>
                   <select id="wpSitesloaderType" class="wp-sites-loader-selected">
                       <option value="wp-sites-loader1">Loader 1</option>
                       <option value="wp-sites-loader2">Loader 2</option>
                       <option value="wp-sites-loader3" disabled>Loader 3</option>
                       <option value="wp-sites-loader4" disabled>Loader 4</option>
                       <option value="wp-sites-loader5" disabled>Loader 5</option>
                   </select>
               </div>

                <div class="inputs-wrapper">
                    <label for="loaderColor">Select Loader Color</label>
                    <small style="color:white; background: red; padding: .3rem;">Coming soon...</small>
                    <input type="color" id="loaderColor" name="loaderColor" disabled>
                </div>

                <button type="button" onclick="showLoader()" class="wp-sites-loader-form-button">Save Changes</button>

            </form>

        </div>

        <div class="wp-sites-loader-options-cards">

            <h1> Preview of Active Loader: <span id="wpSitesloaderName" style="color: #08c5d1; font-weight: 500"> </span></h1>

            <div class="algo-site-loaders-previews">

                <div id="wp-sites-loader1" class="" style="display: none;"> </div>
                <div id="wp-sites-loader2" class="" style="display: none;"> </div>
                <div id="saveMessage" class="wp-sites-loader-save-message" style="display: block;">
                    <?php
                    $wpSiteLoaders = get_option('algo_site_loaders_selectedLoader');

                    switch ($wpSiteLoaders){
                        case "wp-sites-loader1":
                            echo '<div class="loaders-loading-previews">'. esc_html("Loader 1 [ Activated ]"). '<div id="wp-sites-loader1" class="" style="display: block;"></div></div>';
                            break;
                        case "wp-sites-loader2":
                            echo '<div class="loaders-loading-previews">'. esc_html("Loader 2 [ Activated ]"). '<div id="wp-sites-loader2" class="" style="display: block;"></div></div>';
                            break;
                        default:
                            echo esc_html("None of them activated");
                            break;
                    }
                    ?>
                </div>

            </div>

        </div>

    </div>

</div>

<span class="loader-nonce" data-nonce="<?php echo esc_attr(wp_create_nonce('algo_site_loaders_nonce')); ?>"></span>

