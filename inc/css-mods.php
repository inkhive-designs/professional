<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function professional_custom_css_mods() {

    //CSS Begins
    echo "<style>";

    if ( get_theme_mod('professional_site_titlecolor') ) :
        echo "#masthead .site-title a { color: ".get_theme_mod('professional_site_titlecolor', '#e10d0d')."; }";
    endif;

    if ( get_theme_mod('professional_title_font','Michroma') ) :
        echo "#masthead .title-font, h1, h2 { font-family: ".esc_html(get_theme_mod('professional_title_font'))." !important; }";
    endif;

    if ( get_theme_mod('professional_body_font','Noto Sans') ) :
        echo "body { font-family: ".esc_html(get_theme_mod('professional_body_font'))."; }";
    endif;

    echo "</style>";
    //CSS Ends
}

add_action('wp_head', 'professional_custom_css_mods');