<!-- WP Sites Loaders About Page -->

<div class="wp-sites-loader-container">

    <?php
    include_once __DIR__ . '/header.php';
    ?>

    <div class="wp-sites-loader-wrapper">

        <div class="wp-sites-loader-card">
            <?php
            $plugins_img = esc_url(plugins_url('../assets/images/activities.gif', __FILE__));
            ?>
            <img src="<?php echo esc_url($plugins_img) ?>" height="90px" width="auto" alt="activities"/>

            <h2> Install and Activate the Plugins </h2>
            <p> You can install the plugins manually or search for them in the WordPress global plugins section and activate them. </p>
        </div>

        <div class="wp-sites-loader-card">
            <?php
            $plugins_img = esc_url(plugins_url('../assets/images/feedback.gif', __FILE__));
            ?>
            <img src="<?php echo esc_url($plugins_img) ?>" height="90px" width="auto" alt="feedback"/>
            <h2> Share Your Feedback in the Global Area </h2>
            <p> Share your feedback so that other users can see what they can achieve with these plugins. </p>
        </div>

        <div class="wp-sites-loader-card">
            <?php
            $plugins_img = esc_url(plugins_url('../assets/images/check.gif', __FILE__));
            ?>
            <img src="<?php echo esc_url($plugins_img) ?>" height="90px" width="auto" alt="check"/>
            <h2> Update to the Latest Version of <span style="color: #65DDB9"> Algo Site Loaders </span> </h2>
            <p> Update to the latest version of Algo Site Loaders to access the latest features. </p>
        </div>

    </div>
</div>