<?php
function professional_customize_register_social($wp_customize){
    // Social Icons
    $wp_customize->add_section('professional_social_section', array(
        'title' => __('Social Icons','professional'),
        'priority' => 44 ,
        'panel' => 'professional_header_panel'
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','professional'),
        'facebook' => __('Facebook','professional'),
        'twitter' => __('Twitter','professional'),
        'google' => __('Google Plus','professional'),
        'instagram' => __('Instagram','professional'),
        'rss' => __('RSS Feeds','professional'),
        'flickr' => __('Flickr','professional'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'professional_social_'.$x, array(
            'sanitize_callback' => 'professional_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'professional_social_'.$x, array(
            'settings' => 'professional_social_'.$x,
            'label' => __('Icon ','professional').$x,
            'section' => 'professional_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'professional_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'professional_social_url'.$x, array(
            'settings' => 'professional_social_url'.$x,
            'description' => __('Icon ','professional').$x.__(' Url','professional'),
            'section' => 'professional_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function professional_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google',
            'instagram',
            'rss',
            'flickr',
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }

}
add_action('customize_register', 'professional_customize_register_social');