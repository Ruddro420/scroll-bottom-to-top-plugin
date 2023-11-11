<?php
function sbttp_main_callback(){
    ?>
    <h1>Bottom To Top</h1>
    <div class="body_area">
        <form action="options.php" method="post">
            <?php wp_nonce_field('update-options'); ?>
            <div>
                <label for="sbttp-primary-color"
                       name="sbttp-primary-color"><?php print esc_attr( 'Background Color' ); ?></label> <br> <br>
                <input type="color" name="sbttp-primary-color" value="<?php print get_option('sbttp-primary-color') ?>">
            </div>
            <br>
            <div>
                <label for="sbttp-hover-color"
                       name="sbttp-hover-color"><?php print esc_attr( 'Hover Color' ); ?></label> <br> <br>
                <input type="color" name="sbttp-hover-color" value="<?php print get_option('sbttp-hover-color') ?>">
            </div><br>
            <div>
                <label for="sbttp-text-change"
                       name="sbttp-text-change"><?php print esc_attr( 'Change Text' ); ?></label> <br> <br>
                <input type="text" name="sbttp-text-change" value="<?php print get_option('sbttp-text-change') ?>">
            </div><br>
            <div>
                <label for="sbttp-animation-change"
                       name="sbttp-animation-change"><?php print esc_attr( 'Animation' ); ?></label> <br> <br>
                <select name="sbttp-animation-change">
                    <option value="slide" <?php selected(get_option('sbttp-animation-change'), 'slide'); ?>>Slide</option>
                    <option value="Fade" <?php selected(get_option('sbttp-animation-change'), 'Fade'); ?>>Fade</option>
                </select>
            </div>
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="page_options" value="sbttp-primary-color,sbttp-hover-color,sbttp-text-change,sbttp-animation-change">
            <br><br>
            <input type="submit" name="submit" class="button button-primary"
                   value="<?php _e('Save Changes', 'sbttp') ?>">
        </form>
    </div>
    <?php
}
// functions settings change
function sbttp_settings_change(){
    ?>
    <style>
        #scrollUp{
            background-color: <?php print get_option('sbttp-primary-color') ?>!important;
        }
        #scrollUp:hover {
            background-color: <?php print get_option('sbttp-hover-color')?>!important;
        }
    </style>
    <?php
}
add_action('wp_enqueue_scripts','sbttp_settings_change');
// function script change
function sbttp_script_change(){
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery.scrollUp(
                {
                    scrollName: 'scrollUp', // Element ID
                    topDistance: '300', // Distance from top before showing element (px)
                    topSpeed: 300, // Speed back to top (ms)
                    animation: '<?php
                        if(get_option('sbttp-animation-change') == 'Fade'){
                            echo 'Fade';
                        }else if(get_option('sbttp-animation-change') == 'slide'){
                            echo 'slide';
                        }
                        ?>', // Fade, slide, none
                    animationInSpeed: 200, // Animation in speed (ms)
                    animationOutSpeed: 200, // Animation out speed (ms)
                    scrollText: '<?php echo get_option('sbttp-text-change')?>', // Text for element
                    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                }
            )
        });
    </script>
    <?php
}
add_action('wp_footer','sbttp_script_change');
