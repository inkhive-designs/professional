<?php
function professional_customize_register_skins($wp_customize) {
    //Replace Header Text Color with, separate colors for Title and Description
    //Override professional_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->get_section('colors')->panel = 'professional_design_panel';
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors', 'professional');
    $wp_customize->add_setting('professional_site_titlecolor', array(
        'default'     => '#ad4f18',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'professional_site_titlecolor', array(
            'label' => __('Site Title Color','professional'),
            'section' => 'colors',
            'settings' => 'professional_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting(
        'professional_skin',
        array(
            'default'=> 'default',
            'sanitize_callback' => 'professional_sanitize_skin'
        )
    );

    $skins = array( 'default' => __('Default(Professional)','professional'),
        'green' => __('Green','professional'),
        'yellow' => __('Yellow', 'professional'),
        'red' => __('Red', 'professional'),
        'purple' => __('Purple', 'professional'),
    );

    $wp_customize->add_control(
        'professional_skin',array(
            'settings' => 'professional_skin',
            'section'  => 'colors',
            'label' => __('Choose Skin','professional'),
            'description' => __('Free Version of professional Supports 3 Different Skin Colors.','professional'),
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function professional_sanitize_skin( $input ) {
        if ( in_array($input, array('default','green', 'yellow','red', 'purple') ) )
            return $input;
        else
            return '';
    }

}
add_action('customize_register', 'professional_customize_register_skins');