<?php
function professional_customize_register_showcase($wp_customize) {
    //Showcase
    $wp_customize->add_panel( 'professional_showcase_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Showcases','professional'),
    ) );

    $wp_customize->add_section(
        'professional_sec_showcase_options',
        array(
            'title'     => __('Enable/Disable','professional'),
            'priority'  => 0,
            'panel'     => 'professional_showcase_panel'
        )
    );


    $wp_customize->add_setting(
        'professional_main_showcase_enable',
        array( 'sanitize_callback' => 'professional_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'professional_main_showcase_enable', array(
            'settings' => 'professional_main_showcase_enable',
            'label'    => __( 'Enable Showcase.', 'professional' ),
            'section'  => 'professional_sec_showcase_options',
            'type'     => 'checkbox',
        )
    );


    $showcases = 3;

    for ( $i = 1 ; $i <= $showcases ; $i++ ) :

        //Create the settings Once, and Loop through it.

        $wp_customize->add_setting(
            'professional_showcase_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'professional_showcase_img'.$i,
                array(
                    'label' => '',
                    'section' => 'professional_showcase_sec'.$i,
                    'settings' => 'professional_showcase_img'.$i,
                )
            )
        );


        $wp_customize->add_section(
            'professional_showcase_sec'.$i,
            array(
                'title'     => 'Showcase '.$i,
                'priority'  => $i,
                'panel'     => 'professional_showcase_panel'
            )
        );

        $wp_customize->add_setting(
            'professional_showcase_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'professional_showcase_title'.$i, array(
                'settings' => 'professional_showcase_title'.$i,
                'label'    => __( 'Showcase Title','professional' ),
                'section'  => 'professional_showcase_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'professional_showcase_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'professional_showcase_desc'.$i, array(
                'settings' => 'professional_showcase_desc'.$i,
                'label'    => __( 'Showcase Description','professional' ),
                'section'  => 'professional_showcase_sec'.$i,
                'type'     => 'text',
            )
        );


        $wp_customize->add_setting(
            'professional_showcase_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'professional_showcase_url'.$i, array(
                'settings' => 'professional_showcase_url'.$i,
                'label'    => __( 'Target URL','professional' ),
                'section'  => 'professional_showcase_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;
}
add_action('customize_register', 'professional_customize_register_showcase');