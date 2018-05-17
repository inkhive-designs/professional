<?php
function professional_customize_register_slider($wp_customize){
    // SLIDER PANEL
    $wp_customize->add_panel( 'professional_slider_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Main Slider',
    ) );

    $wp_customize->add_section(
        'professional_sec_slider_options',
        array(
            'title'     => __('Enable/Disable','professional'),
            'priority'  => 0,
            'panel'     => 'professional_slider_panel'
        )
    );


    $wp_customize->add_setting(
        'professional_main_slider_enable',
        array(
            'default'  => false,
            'sanitize_callback' => 'professional_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'professional_main_slider_enable', array(
            'settings' => 'professional_main_slider_enable',
            'label'    => __( 'Enable Slider.', 'professional' ),
            'section'  => 'professional_sec_slider_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'professional_main_slider_count',
        array(
            'default' => '0',
            'sanitize_callback' => 'professional_sanitize_positive_number'
        )
    );

    // Select How Many Slides the User wants, and Reload the Page.
    $wp_customize->add_control(
        'professional_main_slider_count', array(
            'settings' => 'professional_main_slider_count',
            'label'    => __( 'No. of Slides(Min:0, Max: 5)' ,'professional'),
            'section'  => 'professional_sec_slider_options',
            'type'     => 'number',
            'description' => __('Save the Settings, and Reload this page to Configure the Slides.','professional'),
        )
    );

    /* Active Callback Function */
    function professional_show_slide_options($control) {

        $option = $control->manager->get_setting('professional_main_slider_enable');
        return $option->value() == false ;

    }

    if ( get_theme_mod('professional_main_slider_count') > 0 ) :
        $slides = get_theme_mod('professional_main_slider_count');

        for ( $i = 1 ; $i <= $slides ; $i++ ) :

            //Create the settings Once, and Loop through it.

            $wp_customize->add_setting(
                'professional_slide_img'.$i,
                array( 'sanitize_callback' => 'esc_url_raw' )
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                    $wp_customize,
                    'professional_slide_img'.$i,
                    array(
                        'label' => '',
                        'section' => 'professional_slide_sec'.$i,
                        'settings' => 'professional_slide_img'.$i,
                    )
                )
            );


            $wp_customize->add_section(
                'professional_slide_sec'.$i,
                array(
                    'title'     => 'Slide '.$i,
                    'priority'  => $i,
                    'panel'     => 'professional_slider_panel',
                    'active_callback' => 'professional_show_slide_options'.$i,
                    'default'  => false
                )
            );

            $wp_customize->add_setting(
                'professional_slide_title'.$i,
                array( 'sanitize_callback' => 'sanitize_text_field' )
            );

            $wp_customize->add_control(
                'professional_slide_title'.$i, array(
                    'settings' => 'professional_slide_title'.$i,
                    'label'    => __( 'Slide Title','professional' ),
                    'section'  => 'professional_slide_sec'.$i,
                    'type'     => 'text',
                )
            );

            $wp_customize->add_setting(
                'professional_slide_desc'.$i,
                array( 'sanitize_callback' => 'sanitize_text_field' )
            );

            $wp_customize->add_control(
                'professional_slide_desc'.$i, array(
                    'settings' => 'professional_slide_desc'.$i,
                    'label'    => __( 'Slide Description','professional' ),
                    'section'  => 'professional_slide_sec'.$i,
                    'type'     => 'text',
                )
            );


            $wp_customize->add_setting(
                'professional_slide_url'.$i,
                array( 'sanitize_callback' => 'esc_url_raw' )
            );

            $wp_customize->add_control(
                'professional_slide_url'.$i, array(
                    'settings' => 'professional_slide_url'.$i,
                    'label'    => __( 'Target URL','professional' ),
                    'section'  => 'professional_slide_sec'.$i,
                    'type'     => 'url',
                )
            );

        endfor;


    endif;

}
add_action('customize_register', 'professional_customize_register_slider');