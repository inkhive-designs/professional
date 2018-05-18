<?php
/**
 * @package Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 grid grid_2_column'); ?>>

    <div class="featured-thumb col-md-4">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail('grid2'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
        <?php endif; ?>
    </div><!--.featured-thumb-->

    <div class="out-thumb col-md-8">
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <div class="entry-excerpt"><?php the_excerpt(); ?></div>
            <div class="readmore"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e('Read More...','professional') ?></a></div>
        </header><!-- .entry-header -->
    </div><!--.out-thumb-->



</article><!-- #post-## -->