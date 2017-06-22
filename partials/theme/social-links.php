<?php if( get_option('facebook') || get_option('twitter') || get_option('instagram') || get_option('youtube') ) { ?>
	<article class="socialWrap inner">
		<?php if( get_option('facebook')) { ?>
			<a class="facebook" href="<?php echo get_option('facebook'); ?>" target="_blank">
				<i class="fa fa-facebook"></i>
			</a>
		<?php } ?>
		<?php if( get_option('twitter')) { ?>
			<a class="twitter" href="<?php echo get_option('twitter'); ?>" target="_blank">
				<i class="fa fa-twitter"></i>
			</a>
		<?php } ?>
		<?php if( get_option('instagram')) { ?>
			<a class="instagram" href="<?php echo get_option('instagram'); ?>" target="_blank">
				<i class="fa fa-instagram"></i>
			</a>
		<?php } ?>
		<?php if( get_option('youtube')) { ?>
			<a class="youtube" href="<?php echo get_option('youtube'); ?>" target="_blank">
				<i class="fa fa-youtube"></i>
			</a>
		<?php } ?>
	</article>
<?php } ?>