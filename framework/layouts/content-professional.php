<?php
/**
 * @package Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 professional'); ?>>

    <div class="featured-thumb">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail('grid2'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
        <?php endif; ?>

        <div class="out-thumb">
            <header class="entry-header">
                <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                <div class="postedon">
                    <?php professional_posted_on(); ?>
                </div>
                <div class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,200)."..."; ?></div>
            </header><!-- .entry-header -->
        </div><!--.out-thumb-->
        <div class="f-content">
            <div class="cat"><?php the_category(); ?></div>
            <div class="readmore"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e('Read More','professional') ?></a></div>
        </div>
    </div><!--.featured-thumb-->

</article><!-- #post-## -->