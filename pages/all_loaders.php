<!-- WP Sites Loaders About Page -->
<?php if (!defined('ABSPATH')) exit();  ?>
<div class="wp-sites-loader-container">

    <?php
    include_once __DIR__ . '/header.php';
    ?>

   <div class="algo-site-loaders-all-loaders_page">

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

</div>
<span class="loader-nonce" data-nonce="<?php echo esc_attr(wp_create_nonce('algo_site_loaders_nonce')); ?>"></span>
