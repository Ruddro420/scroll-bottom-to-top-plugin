<?php

function sbttp_add_scripts(){
    wp_enqueue_style('sbttp_plugin_style', plugins_url("assets/css/sbttp_plugin_style.css", __DIR__));
    wp_enqueue_script("jquery");
    wp_enqueue_script('sbttp_plugin_scroll', plugins_url("assets/js/sbttp_plugin_scroll.js", __DIR__),array(),"1.0.0",true);
}

add_action('wp_enqueue_scripts','sbttp_add_scripts');

function active_scroll_script(){
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery.scrollUp()
        });
    </script>
    <?php
}
add_action("wp_footer","active_scroll_script");

?>

