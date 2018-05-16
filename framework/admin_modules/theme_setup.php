<?php
/**
 * Professional functions and definitions
 *
 * @package Professional
 */



if ( ! function_exists( 'professional_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function professional_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'professional', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 640; /* pixels */
        }

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'professional' ),
            'footer' => __( 'Footer Menu', 'professional' ),
        ) );

        // Enable support for Post Formats.
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'professional_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Enable support for HTML5 markup.
        add_theme_support( 'html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
        ) );

        //Register custom thumbnail sizes
        add_image_size('grid',350,350,true); //For the Grid layout
        add_image_size('grid2',430,292,true); //For the Grid2 layout

    }
endif; // professional_setup
add_action( 'after_setup_theme', 'professional_setup' );

