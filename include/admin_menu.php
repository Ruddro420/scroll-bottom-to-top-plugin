<?php
function sbttp_admin_menu() {
	add_menu_page(
        'Bottom To Top',
        'Bottom To Top',
        'manage_options',
        'bottom-to-top',
        'sbttp_main_callback',
        'dashicons-arrow-up-alt2',
        80
    );
}
add_action( 'admin_menu', 'sbttp_admin_menu' );