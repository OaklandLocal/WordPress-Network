<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */
global $data;
get_header(); ?>

<div class="container main" id="no-section-one">

	<div id="full-section-left" class="grid12 col">

		<div id="section-four" class="grid8 col">

			<div class="section-inner-main">
			
				<!-- BEGIN SECTION 2 -->

				<?php include( trailingslashit( get_template_directory() ). '/section-featured-no-sidebar.php' ); ?>
			
				<?php if($data['check_section_photo'] !='0') { ?> 
				<?php include( trailingslashit( get_template_directory() ). '/section-photo-no-sidebar.php' ); ?>
				<?php } else if($data['check_section_photo'] !='1') {?>
				<div class="clear" style="height:80px;"></div>
				<?php } ?>
			
				<?php if($data['check_section_video'] !='0') { ?> 
				<?php include( trailingslashit( get_template_directory() ). '/section-video-no-sidebar.php' ); ?>
				<?php } ?>
		
				<?php if($data['check_section_quote'] !='0') { ?> 
				<?php include( trailingslashit( get_template_directory() ). '/section-quote.php' ); ?>
				<?php } ?>
			
			</div><!-- END SECTION INNER MAIN-->

		</div><!-- END SECTION4 GRID8 COL -->

		<div class="grid11 col bottom-left">
		
			<div class="section-inner-main-bottom">
			
				<?php if($data['check_section3'] !='0') { ?> 

					<?php include( trailingslashit( get_template_directory() ). '/section3.php' ); ?>
				
				<?php } ?>
			
				<?php if($data['check_section4'] !='0') { ?>
				
					<?php include( trailingslashit( get_template_directory() ). '/section4.php' ); ?>
				
				<?php } ?>
				
				<?php if($data['check_section5'] !='0') { ?>
				
					<?php include( trailingslashit( get_template_directory() ). '/section5.php' ); ?>
				
				<?php } ?>
			
			</div>
	
		</div><!-- END GRID11 BOTTOM LEFT -->

	</div><!-- END GRID 12 -->

	<?php get_sidebar(); ?>

	</div><!-- CONTAINER -->

</div><!-- END CONTAINER -->

<?php if($data['check_section6'] !='0') { ?>

<?php include( trailingslashit( get_template_directory() ). '/section6.php' ); ?>

<?php } ?>

<?php get_footer(); ?>