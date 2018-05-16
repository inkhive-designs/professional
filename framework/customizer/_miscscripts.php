<?php
function professional_customize_register_miscscripts($wp_customize){
    $wp_customize->add_section(
        'professional_sec_pro',
        array(
            'title'     => __('Important Links','professional'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'professional_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Professional_WP_Customize_Upgrade_Control(
            $wp_customize,
            'professional_pro',
            array(
                'description'	=> '<a class="professional-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'professional').'</a>
                                    <a class="professional-important-links" href="https://inkhive.com/documentation/professional" target="_blank">'.__('Professional Documentation', 'professional').'</a>
                                    <a class="professional-important-links" href="https://demo.inkhive.com/professional-plus/" target="_blank">'.__('Professional Plus Live Demo', 'professional').'</a>
                                    <a class="professional-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'professional').'</a>
                                    <a class="professional-important-links" href="https://wordpress.org/support/theme/professional/reviews" target="_blank">'.__('Review Professional on WordPress', 'professional').'</a>',
                'section' => 'professional_sec_pro',
                'settings' => 'professional_pro',
            )
        )
    );
}
add_action('customize_register', 'professional_customize_register_miscscripts');