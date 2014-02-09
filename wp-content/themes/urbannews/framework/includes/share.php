<?php global $data; ?>

<?php if($data['check_share'] !='0') { ?>

<ul class="share-area">

	<li class="first"><?php echo $data['share_text'] ?></li>
			
	<?php if($data['check_share_facebook'] !='0') { ?>
	<!-- FACEBOOK -->
	<li><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=button_count&amp;width=80&amp;action=like&amp;colorscheme=light&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:20px;" allowTransparency="true"></iframe></li>
	<?php } ?>
		
	<?php if($data['check_share_linkedin'] !='0') { ?> 
	<!-- LINKEDIN -->		
	<li><script type="in/share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></li>
	<?php } ?>
			
	<?php if($data['check_share_twitter'] !='0') { ?> 
	<!-- TWITTER -->	
	<li><a href="http://twitter.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>&count=horizontal" class="twitter-share-button">Tweet</a></li>
	<?php } ?>
		
	<?php if($data['check_share_digg'] !='0') { ?> 		
	<!-- DIGG -->
	<li><a class="DiggThisButton DiggCompact" href="http://digg.com/submit?url=<?php the_permalink(); ?>"></a></li>
	<?php } ?>
	
	<?php if($data['check_share_comments'] !='0') { ?>
	<li class="comments" style="float:right;"><span class="comments"><?php comments_popup_link(__('0 Comments', 'siiimple'), __('1 Comment', 'siiimple'), __('% Comments', 'siiimple')); ?></span></li>
	<?php } ?>
				
</ul><!-- END SHARE AREA -->

<?php } ?>