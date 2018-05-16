<?php
/**
 * Enqueue Scripts for Admin
 */
function professional_custom_wp_admin_style() {
    wp_enqueue_style( 'professional-admin_css', get_template_directory_uri() . '/assets/ext-css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'professional_custom_wp_admin_style' );
