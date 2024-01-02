<!-- WP Sites Loaders About Page -->


<div class="wp-sites-loader-container">

    <?php
    include_once (__DIR__.'/header.php');
    ?>

    <div class="wp-sites-loader-wrapper">

        <div class="wp-sites-loader-card">
            <?php
            $plugins_img = plugins_url('../assets/images/activities.gif', __FILE__);
            ?>
            <img src="<?php echo $plugins_img ?>" height="90px" width="auto" alt="activities"/>

            <h2> Install and Activated the Plugins </h2>
            <p> You can install the plugins manually or searching it to the WordPress global plugins section and activate it. </p>
        </div>

        <div class="wp-sites-loader-card">
            <?php
            $plugins_img = plugins_url('../assets/images/feedback.gif', __FILE__);
            ?>
            <img src="<?php echo $plugins_img ?>" height="90px" width="auto" alt="feedback"/>
            <h2> Share your Feedback is Global Area </h2>
            <p> Share your feedback, so that another users can see what he achieve with this plugins. </p>
        </div>

        <div class="wp-sites-loader-card">
            <?php
            $plugins_img = plugins_url('../assets/images/check.gif', __FILE__);
            ?>
            <img src="<?php echo $plugins_img ?>" height="90px" width="auto" alt="check"/>
            <h2> Update latest version <span style="color: #65DDB9"> Algo Site Loaders </span> </h2>
            <p> Update the latest version of Algo Site Loaders, which might help you get the latest feature to use. </p>
        </div>


    </div>
</div>