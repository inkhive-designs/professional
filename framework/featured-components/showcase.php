<?php 
if ( get_theme_mod('professional_main_showcase_enable' ) && is_front_page() ) :  ?>
	
	    <div id="showcase">
	    <div class="container">
	    	<?php
			for ( $i = 1; $i <= 3; $i++ ) :

					$url = esc_url ( get_theme_mod('professional_showcase_url'.$i) );
					$img = esc_url ( get_theme_mod('professional_showcase_img'.$i) );
					$title = get_theme_mod('professional_showcase_title'.$i);
					$desc = get_theme_mod('professional_showcase_desc'.$i);
					?>
					<div class='col-md-4 col-sm-4 showcase'>
                        <figure>
                            <div>
                                <?php if ( $url ) : ?>
                                <a href="<?php echo $url; ?>">
                                <?php endif; ?>
                                    <img src="<?php echo $img; ?>">
                                    <?php if ( $title || $desc ) : ?>
                                    <div class='showcase-caption'>
                                            <div class='showcase-caption-title'><?php echo $title; ?></div>
                                            <div class='showcase-caption-desc'><?php echo $desc; ?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( $url ) : ?>
                                    </a>
                                    <?php endif; ?>
                            </div>
                        </figure>
                    </div>
            <?php
			    endfor;
	        ?>
	     </div>   
		</div><!--.showcase-->
	    
<?php 
endif; ?>