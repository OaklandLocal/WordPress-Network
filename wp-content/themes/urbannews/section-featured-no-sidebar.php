<?php global $data; ?>

<div class="main-wrap">
		
	<div class="main_flexslider loading">
  	    
  	    <ul class="slides">
  	    	
  	    	<?php 
	  	    $args=array( 'showposts' => $data['featured_gallery_num'],'cat' => $data['featured_gallery_cat'] );  
	  	    $my_query = new WP_Query($args);
	  	    $count=0;
			if ( $my_query->have_posts()  ) { while ($my_query->have_posts()) : $my_query->the_post(); 
			$count++;
					
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'index-blog' );			
			$image = aq_resize( $img_url, 630, true );
	  	    ?>
	  	    	
			<li>
				
				<div class="main-wrap">
				
					<?php if ($image) { ?>
				
						<img src="<?php echo $image ?>" class="main-img" alt="<?php the_title(); ?>"/>
						
						<h2><span class="date-area"><<?php the_time('F jS, Y') ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
					<?php } else { ?>
				
					<h2 class="no-image"><span class="date-area"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'siiimple'); ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					
					<?php } ?>
				
				</div>
				
				<?php the_excerpt(); ?>
				
			</li>
					
		  	  <?php endwhile; } ?>
		  	  <?php wp_reset_query(); ?>	
			
		</ul><!-- END SLIDES -->
				
	</div><!-- END MAIN FLEXSLIDER -->
		
</div><!-- END MAIN WRAP -->