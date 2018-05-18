<?php
function professional_customize_register_layouts($wp_customize) {
    $wp_customize->get_section('background_image')->panel = 'professional_design_panel';

    $wp_customize->add_panel('professional_design_panel', array(
        'title' => __('Design & Layouts', 'professional'),
        'priority' => 40,
    ));

    $wp_customize->add_section(
        'professional_design_options',
        array(
            'title'     => __('Blog Layout','professional'),
            'priority'  => 0,
            'panel'     => 'professional_design_panel'
        )
    );


    $wp_customize->add_setting(
        'professional_blog_layout',
        array(
            'default' => 'grid',
            'sanitize_callback' => 'professional_sanitize_blog_layout' )
    );

    function professional_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','grid_3_column','professional') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'professional_blog_layout',array(
            'label' => __('Select Layout','professional'),
            'description' => __('Use 3 Column Layouts, only after disabling sidebar for the page.','professional'),
            'settings' => 'professional_blog_layout',
            'section'  => 'professional_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Standard Blog Layout','professional'),
                'grid_2_column' => __('Grid 2 Column Layout','professional'),
                'grid_3_column' => __('Grid 3 Column Layout','professional'),
                'professional' => __('Professional Layout','professional'),
            )
        )
    );

    $wp_customize->add_section(
        'professional_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','professional'),
            'priority'  => 0,
            'panel'     => 'professional_design_panel'
        )
    );

    $wp_customize->add_setting(
        'professional_disable_sidebar',
        array( 'sanitize_callback' => 'professional_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'professional_disable_sidebar', array(
            'settings' => 'professional_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','professional' ),
            'section'  => 'professional_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'professional_disable_sidebar_home',
        array(
            'default' => true,
            'sanitize_callback' => 'professional_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'professional_disable_sidebar_home', array(
            'settings' => 'professional_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','professional' ),
            'section'  => 'professional_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'professional_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'professional_disable_sidebar_front',
        array( 'sanitize_callback' => 'professional_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'professional_disable_sidebar_front', array(
            'settings' => 'professional_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','professional' ),
            'section'  => 'professional_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'professional_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'professional_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'professional_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'professional_sidebar_width', array(
            'settings' => 'professional_sidebar_width',
            'label'    => __( 'Sidebar Width','professional' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','professional'),
            'section'  => 'professional_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'professional_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function professional_show_sidebar_options($control) {

        $option = $control->manager->get_setting('professional_disable_sidebar');
        return $option->value() == false ;

    }

    $wp_customize-> add_section(
        'professional_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','professional'),
            'description'	=> __('Enter your Own Copyright Text.','professional'),
            'priority'		=> 11,
            'panel'			=> 'professional_design_panel'
        )
    );

    $wp_customize->add_setting(
        'professional_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'professional_footer_text',
        array(
            'section' => 'professional_custom_footer',
            'settings' => 'professional_footer_text',
            'type' => 'text'
        )
    );
}
add_action('customize_register', 'professional_customize_register_layouts');