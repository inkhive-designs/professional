<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Professional
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( professional_load_sidebar() ) : ?>
<div id="secondary" class="widget-area <?php do_action('professional_secondary-width') ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
<?php endif; ?>

