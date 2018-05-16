<?php
/**
 * professional Theme Customizer
 *
 * @package professional
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function professional_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


}
add_action( 'customize_register', 'professional_customize_register' );

//All settings are required here that are used to load customizer controls
require_once get_template_directory().'/framework/customizer/_customizer_controls.php';
require_once get_template_directory().'/framework/customizer/_miscscripts.php';
require_once get_template_directory().'/framework/customizer/_sanitization.php';
require_once get_template_directory().'/framework/customizer/_googlefonts.php';
require_once get_template_directory().'/framework/customizer/_layouts.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/skins.php';
require_once get_template_directory().'/framework/customizer/slider.php';
require_once get_template_directory().'/framework/customizer/showcase.php';


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function professional_customize_preview_js() {
    wp_enqueue_script( 'professional_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'professional_customize_preview_js' );
