<?php
if ( get_theme_mod('professional_main_slider_enable' ) && is_front_page() ) : 

	$count_x = $count = get_theme_mod('professional_main_slider_count'); ?>
	
	    <div id="slider-wrapper">
	    <ul class="bxslider">
	    	<?php
                for ( $i = 1; $i <= $count; $i++ ) :
				  		
				  			$url = esc_url ( get_theme_mod('professional_slide_url'.$i) );
				  			$img = esc_url ( get_theme_mod('professional_slide_img'.$i) );
				  			$title = get_theme_mod('professional_slide_title'.$i);
				  			$desc = get_theme_mod('professional_slide_desc'.$i);
				  			
							?>
                        <li>
                            <a href="<?php echo $url; ?>">
                                <img src="<?php echo $img; ?>">

                                <?php if($title || $desc): ?>
                                <div class='slider-caption'>
                                    <div class='slider-caption-title'><?php echo $title; ?></div>
                                    <div class='slider-caption-desc'><?php echo $desc; ?></div>
                                </div>
                                <?php endif; ?>
							</a>
                        </li>
            <?php endfor; ?>
	     </ul>   
		</div>
	    
	<?php 
endif;?>