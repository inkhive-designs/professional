<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Professional
 */
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php get_template_part('sidebar', 'footer'); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="site-info col-md-4">
			<?php
            if( get_theme_mod('professional_footer_text')):
                $text = get_theme_mod('professional_footer_text');
            else:
                $text = __( 'Powered by %1$s Theme', 'professional' );
            endif;

            printf( $text, '<a href="http://inkhive.com" rel="nofollow">Professional</a>' );
            ?>
		</div><!-- .site-info -->
		<div class="footer-menu col-md-8">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		</div>	
	</div><!--.container-->	
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>