<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Professional
 */

get_header(); ?>

<section id="primary" class="content-area <?php do_action('professional_primary-width') ?>">
    <header class="page-header">
        <?php
        the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
    </header><!-- .page-header -->
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

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
