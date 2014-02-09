<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */

get_header();
?>

<div class="container" id="single">

	<div class="grid11 col">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php 
		$thumb = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url( $thumb,'full' );
		$image = aq_resize( $img_url, 659, true ); 
		?>
		
		<!-- SUB TEXT -->
		<?php $subtext = get_post_meta($post->ID, 'siiimple_subtext', TRUE); ?>
		
		<!-- IMG CAPTION -->
		<?php $imgCaption = get_post_meta($post->ID, 'siiimple_img_caption', TRUE); ?>
		
		<!-- VIDEO -->
		<?php $video = get_post_meta($post->ID, 'siiimple_video', TRUE); ?>
		
		<!-- SET VIEWS -->
		<?php setPostViews(get_the_ID()); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<div class="img-wrap">
			
				<?php if ( has_post_format( 'gallery' )) { ?>
				
				<h2><span class="date-area"><?php the_time('F jS, Y') ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					
					<div class="flexslider_gallery loading">
  	    
  	    				<ul class="slides">
  	    	
  	    					<?php 
	  	    				$args = array(
	  	    				'orderby' => 'menu_order',
	  	    				'post_type' => 'attachment',
	  	    				'post_parent'    => get_the_ID(),
	  	    				'post_mime_type' => 'image',
	  	    				'post_status'    => null,
	  	    				'numberposts'    => -1,
	  	    				);
	  	    				$attachments = get_posts($args);
	  	    				?>
	  	    	
	  	   					<?php if ($attachments) : ?>
					 
	  	    				<?php foreach ($attachments as $attachment) : ?>
                        	
	  	    				<?php $attachment_url = wp_get_attachment_url($attachment->ID , 'full');  ?>
							<?php $image_gallery = aq_resize($attachment_url, 653, true); ?>
				
								<li><img src="<?php echo $image_gallery ?>"/></li>
					
		  	    			<?php endforeach; ?>
                        
		  	    			<?php endif; ?>
		  	    
		  				</ul>
  	    	
  	    			</div><!--FLEXSLIDER LOADING-->
					
				<?php } else if ( $video ) { ?>
				
				<h2 class="video"><span class="date-area"><?php the_time('F jS, Y') ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<iframe src="<?php echo $video; ?>" width="653" height="350" frameborder="0" class="vid"></iframe>
				
				<?php } else if ( $image ) { ?> 
				
				<h2><span class="date-area"><?php the_time('F jS, Y') ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<img src="<?php echo $image ?>" class="single-img" alt="image"/>
				
				<?php } ?>
			
			</div><!-- END IMG WRAP -->
			
			<!-- CLEAR -->
			<div class="clear"></div>
			
			<?php if ($subtext) { ?>
			
			<h3 class="subtext-area"><?php echo $subtext ?>&nbsp;<span class="end">&diams;</span></h3>
			
			<?php } ?>
			
			<div class="left-content">
			
				<ul>
				
				<li class="posted"><?php the_time('M j, Y') ?></li>
				
				<li class="written"><?php the_author_posts_link(); ?></li>
				
				<li class="comments"><span class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></span></li>
        			
        			<li class="category"><?php echo get_the_category_list( __( ', ', 'siiimple' ) ); ?></li>			
					
					<?php the_tags( '<span class="tags-star"></span><li class="tags">', ', ', '</li>'); ?>
					
					<li class="views"><?php echo getPostViews(get_the_ID()); ?></li>
					
				</ul><!-- END UL -->
				
				<?php 
					global $wpdb;
					$images = get_post_meta( get_the_ID(), 'siiimple_sidebar_img', false );
					$images = implode( ',' , $images );
					// Re-arrange images with 'menu_order'
					$images = $wpdb->get_col( "
    				SELECT ID FROM {$wpdb->posts}
    				WHERE post_type = 'attachment'
    				AND ID in ({$images})
    				ORDER BY menu_order ASC
					" );
				
					foreach ( $images as $att )
					{
    		
    				$src = wp_get_attachment_image_src( $att, 'thumbnail' );
    				$src = $src[0];
    				// Show image
   	 				echo "<img src='{$src}' class='sidebar-img'/>";
					} 
				?>

			<?php include( trailingslashit( get_template_directory() ). '/framework/includes/related.php' ); ?>
			
			<?php if($data['check_ratings'] !='0') { ?> 
			<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
			<?php } ?>
       			
       		</div><!-- END LEFT CONTENT -->
			
			<div class="right-content">
			
				<div class="content-wrap">
				
				<?php if ( !$image ) { ?> 
				
				<h2 class="no-image"><span class="date-area"><?php the_time('F jS, Y') ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<?php } ?>
			
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				
				<?php wp_link_pages( $args ); ?>
			
				</div>
			
			</div><!-- END RIGHT CONTENT -->
			
		</div><!-- END POST -->
		
		<!-- CLEAR -->
		<div class="clear"></div>
		
		<?php include( trailingslashit( get_template_directory() ). '/framework/includes/share.php' ); ?>
		
		<div class="clear"></div>
		
		<?php include( trailingslashit( get_template_directory() ). '/framework/includes/related-img.php' ); ?>
		
		<!-- CLEAR -->
		<div class="clear"></div>

		<?php comments_template( '', true ); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'siiimple'); ?></p>

	<?php endif; ?>
	
	</div><!-- END GRID11 COL -->
	
	<?php get_sidebar(); ?>
	
	</div><!-- Let the mystery begin. -->

</div><!-- END CONTAINER -->

<?php get_footer(); ?>