<?php
function professional_customize_register_googlefonts($wp_customize){
    $wp_customize->add_section(
        'professional_typo_options',
        array(
            'title'     => __('Google Web Fonts','professional'),
            'priority'  => 41,
            'panel' => 'professional_design_panel'
        )
    );

    $font_array = array('Michroma','Noto Sans','HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'professional_title_font',
        array(
            'default'=> 'Michroma',
            'sanitize_callback' => 'professional_sanitize_gfont'
        )
    );

    function professional_sanitize_gfont( $input ) {
        if ( in_array($input, array('Michroma','Noto Sans','HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'professional_title_font',array(
            'label' => __('Title','professional'),
            'settings' => 'professional_title_font',
            'section'  => 'professional_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'professional_body_font',
        array(	'default'=> 'Noto Sans',
            'sanitize_callback' => 'professional_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'professional_body_font',array(
            'label' => __('Body','professional'),
            'settings' => 'professional_body_font',
            'section'  => 'professional_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'professional_customize_register_googlefonts');