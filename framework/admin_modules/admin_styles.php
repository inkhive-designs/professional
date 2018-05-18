<?php
/**
 * Enqueue Scripts for Admin
 */
function professional_custom_wp_admin_style() {
    wp_enqueue_style( 'professional-admin_css', get_template_directory_uri() . '/assets/ext-css/admin.css' );
    //Load FontAwesome 5
    wp_enqueue_style('font-awesome',get_template_directory_uri()."/assets/font-awesome/css/fontawesome-all.min.css");
}
add_action( 'admin_enqueue_scripts', 'professional_custom_wp_admin_style' );
