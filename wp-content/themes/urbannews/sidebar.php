<?php global $data; ?>

<div id="section-five" class="grid4 col">

	<div class="section-inner">
	
		<?php if($data['check_search'] !='0') { ?>
	
			<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
	
			<input value="<?php _e('Search Here...', 'siiimple'); ?>" onfocus="if(this.value=='Search Here...'){this.value='';}" onblur="if(this.value=='')	{this.value='Search Here...';}" name="s" type="text" id="s" maxlength="99" />

		</form>
		
		<?php } ?>
		
		<?php if($data['check_social'] !='0') { ?>

			<ul class="social-media-sidebar">
		
		<?php if($data['check_facebook'] !='0') { ?>
		
		<li>
			
			<a href="<?php echo $data['facebook_link']; ?>/" title="Facebook Link" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/facebook.png" alt="Facebook"></a>
		
			<h2>
		
				<?php
    			$page_id = $data['facebook_id'];
    	
    			$xml = @simplexml_load_file("http://api.facebook.com/restserver.php?method=facebook.fql.query&query=SELECT%20fan_count%20FROM%20page%20WHERE%20page_id=".$page_id."") or die ("try disabling Facebook option in Theme Options or make sure your host server supports remote file access.");
    			$fans = $xml->page->fan_count;
    			echo $fans; 
    			?>
    	
    		</h2>
    	
    		<p><?php echo $data['facebook_text']; ?></p>
    	
    	</li>
    	
    	<?php } ?>
		
		<li><a href="<?php echo $data['twitter_link']; ?>/" title="Twitter Link" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/twitter.png" alt="Twitter"></a>
		<h2><?php echo rarst_twitter_user($data['twitter_id'], 'followers_count'); ?></h2><p><?php echo $data['twitter_text']; ?></p></li>
		
		<li><a href="<?php echo $data['rss_link']; ?>/" title="RSS Link" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/rss.png" alt="RSS"></a><h2><?php if(function_exists('sfs_display_subscriber_count')) sfs_display_subscriber_count(); ?></h2><p><?php echo $data['rss_text']; ?></p></li>
		
		</ul>
		
		<?php } ?>
			
		<div class="clear"></div>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 01') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 02') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 03') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 04') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 05') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 06') ) : ?><?php endif; ?>
			
	</div><!-- SECTION INNER -->
		
</div><!-- END FIVE -->