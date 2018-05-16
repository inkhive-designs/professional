<?php
/**
 * Enqueue scripts and styles.
 */
function professional_scripts() {

    //Load Default Stylesheet
    wp_enqueue_style( 'professional-style', get_stylesheet_uri() );
    
    //Load Google Fonts For Title
    wp_enqueue_style('professional-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('professional_title_font', 'Michroma')) ).':100,300,400,700' );

    //Load Google Fonts For Body
    wp_enqueue_style('professional-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('professional_body_font', 'Noto Sans') ) ).':100,300,400,700' );

    //Load Bootstrap CSS
    wp_enqueue_style('bootstrap-style',get_template_directory_uri()."/assets/frameworks/bootstrap/css/bootstrap.min.css");

    //Load FontAwesome 5
    wp_enqueue_style('font-awesome',get_template_directory_uri()."/assets/font-awesome/css/fontawesome-all.min.css");

    //Load BxSlider CSS
    wp_enqueue_style('bxslider-style',get_template_directory_uri()."/assets/ext-css/bxslider.css");

    //Load Theme Structure File. Contains Orientation of the Theme.
    wp_enqueue_style('professional-theme-structure', get_template_directory_uri().'/assets/theme-styles/css/'.get_theme_mod('professional_skin', 'default').'.css', array(), null);

    //Load Tooltipster Plugin Style
    wp_enqueue_style('tooltipster-style', get_template_directory_uri()."/assets/ext-css/tooltipster.css");

    //Load Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/frameworks/bootstrap/js/bootstrap.min.js", array('jquery'));

    //Load Bx Slider Js
    wp_enqueue_script('bxslider-js', get_template_directory_uri()."/assets/js/bxslider.min.js", array('jquery'));

    //Tooltipster JS
    wp_enqueue_script('tooltipster-js', get_template_directory_uri()."/assets/js/tooltipster.js", array('jquery'));

    //Tooltipster JS
    wp_enqueue_script('waypoint-js', get_template_directory_uri()."/assets/js/waypoints.js", array('jquery'));

    //Load Theme Specific JS
    wp_enqueue_script('custom-js', get_template_directory_uri()."/assets/js/custom.js");


    //Load Navigation js. This is Responsible for Converting the Main Menu into Responsive, when the browser width is switched.
    wp_enqueue_script( 'professional-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

    //Comes with _s Framework.
    wp_enqueue_script( 'professional-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

    //For the Default WordPress Comment's Reply System
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'professional_scripts' );
