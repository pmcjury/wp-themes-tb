<?php
add_action('widgets_init', 'tb_twitter_widget_init' );
function tb_twitter_widget_init() {
	class TB_Twitter_Widget extends WP_Widget {
		public function __construct() {
			parent::__construct(
				'tb_twitter',
				__( 'Twitter', 'themeboy' ),
				array( 'description' => __( 'ThemeBoy widget', 'themeboy' ) )
			);
		}
		function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters('widget_title', $instance['title']);
			$id = $instance['id'];
			$limit = $instance['limit'];
			echo '<li id="'.$args['widget_id'].'" class="widget-container twitter-widget">
				<h3 class="widget-title">'.$title.'</h3>
				<a class="twitter-timeline" data-widget-id="'.$id.'" data-tweet-limit="'.$limit.'"><div class="loading"></div></a>
			</li>';
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['id'] = strip_tags( $new_instance['id'] );
			$instance['limit'] = strip_tags( $new_instance['limit'] );
			return $instance;
		}
		function form( $instance ) {
			$defaults = array( 'title' => __('Twitter', 'themeboy'), 'id' => '345224689221771264', 'limit' => '3' );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themeboy') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('Twitter Widget ID:', 'themeboy') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $instance['id']; ?>" type="text" />
			</p>
			<p>
				Get your Twitter Widget ID by <a href="https://twitter.com/settings/widgets/" target="_blank">creating a new widget</a>. Your Twitter Widget ID is the number in the URL (address bar) after /widgets/
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e('Number of tweets to show:', 'themeboy') ?></label>
				<input id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo $instance['limit']; ?>" type="text" size="2" />
			</p>
			<?php
		}
	}
	register_widget( 'tb_twitter_widget' );
};
?>