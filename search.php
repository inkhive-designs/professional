<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Professional
 */

get_header(); ?>

	<section id="primary" class="content-area <?php do_action('professional_primary-width') ?>">
		<main id="main" class="site-main" role="main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
				    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'professional' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			    </header><!-- .page-header -->

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     */
                    do_action('professional_blog_layout');

                    ?>

                <?php endwhile; ?>

                <?php professional_pagination(); ?>

            <?php else : ?>

                <?php get_template_part( 'modules/content/content', 'none' ); ?>

            <?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
