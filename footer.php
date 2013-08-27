<?php if (get_option('tb_footer_show_sponsors')) { ?>
	<div id="sponsors"><?php echo do_shortcode('[tb_sponsors]'); ?></div>
<?php } ?>
	</div><!-- #main -->
	<div id="footer-widgets" role="contentinfo" class="clearfix">
		<div id="colophon">
			<?php	get_sidebar( 'footer' ); ?>
		</div><!-- #colophon -->
	</div><!-- #footer-widgets -->
	
</div><!-- #wrapper -->
<footer class="clearfix">
	<div class="left">&copy; <?php echo get_the_date('Y') ?> <?php bloginfo('name'); ?></div>
	<div class="right"><?php _e('Designed by', 'themeboy') ?> <a href="http://themeboy.com" target="_blank">ThemeBoy</a></div>
	<ul id="social">
		<?php if ( get_option( 'tb_social_facebook' ) ) { ?><li class="facebook"><a href="<?php echo get_option( 'tb_social_facebook' ); ?>" title="<?php _e( 'Facebook', 'themeboy' ); ?>" target="_blank"><?php _e( 'Facebook', 'themeboy' ); ?></a></li><?php } ?>
		<?php if ( get_option( 'tb_social_twitter' ) ) { ?><li class="twitter"><a href="<?php echo get_option( 'tb_social_twitter' ); ?>" title="<?php _e( 'Twitter', 'themeboy' ); ?>" target="_blank"><?php _e( 'Twitter', 'themeboy' ); ?></a></li><?php } ?>
		<?php if ( get_option( 'tb_social_pinterest' ) ) { ?><li class="pinterest"><a href="<?php echo get_option( 'tb_social_pinterest' ); ?>" title="<?php _e( 'Pinterest', 'themeboy' ); ?>" target="_blank"><?php _e( 'Pinterest', 'themeboy' ); ?></a></li><?php } ?>
		<?php if ( get_option( 'tb_social_linkedin' ) ) { ?><li class="linkedin"><a href="<?php echo get_option( 'tb_social_linkedin' ); ?>" title="<?php _e( 'LinkedIn', 'themeboy' ); ?>" target="_blank"><?php _e( 'LinkedIn', 'themeboy' ); ?></a></li><?php } ?>
		<?php if ( get_option( 'tb_social_gplus' ) ) { ?><li class="gplus"><a href="<?php echo get_option( 'tb_social_gplus' ); ?>" title="<?php _e( 'Google+', 'themeboy' ); ?>" target="_blank"><?php _e( 'Google+', 'themeboy' ); ?></a></li><?php } ?>
		<?php if ( get_option( 'tb_social_youtube' ) ) { ?><li class="youtube"><a href="<?php echo get_option( 'tb_social_youtube' ); ?>" title="<?php _e( 'YouTube', 'themeboy' ); ?>" target="_blank"><?php _e( 'YouTube', 'themeboy' ); ?></a></li><?php } ?>
		<?php if ( get_option( 'tb_social_vimeo' ) ) { ?><li class="vimeo"><a href="<?php echo get_option( 'tb_social_vimeo' ); ?>" title="<?php _e( 'Vimeo', 'themeboy' ); ?>" target="_blank"><?php _e( 'Vimeo', 'themeboy' ); ?></a></li><?php } ?>
	</ul>
</footer>
	
<?php
	wp_footer();
?>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo get_locale(); ?>/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
(function($) {
	// drop nav
	$('#drop-nav').change(function() {
		window.location = $(this).val();
	});
	// fancybox all image links
	$('a').each(function() {
		var self = this;
		var file =  $(self).attr('href');
		if (file) {
			var extension = file.substr( (file.lastIndexOf('.') +1) );
			switch(extension) {
				case 'jpg':
				case 'png':
				case 'gif':
					$(self).fancybox({
						'overlayColor' : '#fff'
					});
			}
		}
	});
})(jQuery);
</script>
</body>
</html>