<?php
/*
 * @package professional, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/pagination.php';

/*
** Function to check if Sidebar is enabled on Current Page 
*/

function professional_load_sidebar() {
    $load_sidebar = true;
    if ( get_theme_mod('professional_disable_sidebar') ) :
        $load_sidebar = false;
    elseif( get_theme_mod('professional_disable_sidebar_home') && is_home() )	:
        $load_sidebar = false;
    elseif( get_theme_mod('professional_disable_sidebar_front') && is_front_page() ) :
        $load_sidebar = false;
    endif;

    return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function professional_primary_class() {
    $sw = get_theme_mod('professional_sidebar_width',4);
    $class = "col-md-".(12-$sw);

    if ( !professional_load_sidebar() )
        $class = "col-md-12";

    echo $class;
}
add_action('professional_primary-width', 'professional_primary_class');

function professional_secondary_class() {
    $sw = get_theme_mod('professional_sidebar_width',4);
    $class = "col-md-".$sw;

    echo $class;
}
add_action('professional_secondary-width', 'professional_secondary_class');

/*
** Function to Get Theme Layout 
*/
function professional_get_blog_layout(){
    $ldir = 'framework/layouts/content';
    if (get_theme_mod('professional_blog_layout') ) :
        get_template_part( $ldir , get_theme_mod('professional_blog_layout') );
    else :
        get_template_part( $ldir ,'grid');
    endif;
}
add_action('professional_blog_layout', 'professional_get_blog_layout');


