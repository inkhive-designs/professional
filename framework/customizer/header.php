<?php
function professional_customize_register_header($wp_customize) {
    $wp_customize->add_panel('professional_header_panel', array(
        'title' => __('Header Settings', 'professional'),
        'priority' => 20,
    ));

    //Logo Settings
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'professional' ),
        'priority'   => 30,
        'panel'      => 'professional_header_panel'
    ) );

    $wp_customize->add_setting( 'professional_logo' , array(
        'default'     => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'professional_logo',
            array(
                'label' => __('Upload Logo','professional'),
                'section' => 'title_tagline',
                'settings' => 'professional_logo',
                'priority' => 5,
            )
        )
    );

    //Settings For Logo Are
    function professional_title_visible( $control ) {
        $option = $control->manager->get_setting('professional_hide_title_tagline');
        return $option->value() == false ;
    }

}
add_action('customize_register', 'professional_customize_register_header');