<?php
/**
 * Widget
 */
if ( ! class_exists( 'STW_Widget' ) ) {
	class STW_Widget extends WP_Widget {

		/**
	 	* Sets up the widgets name etc
	 	*/
		public function __construct() {
			$widget_ops = array(
			'classname'   => 'stw-widget',
			'description' => __( 'Display a current status for up to four items.', 'stw' ),
			'customize_selective_refresh' => true,
			);
			parent::__construct( 'stw-widget', 'Status Widget', $widget_ops );
		}

		/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
		public function widget( $args, $instance ) {
			// for better a11y, add aria-hidden="true" to widget
			echo  $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			// the widget content
			$stw_selector = new STW_Selector();
			echo $stw_selector->display();

			echo $args['after_widget'];
		}

		/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
		public function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
			$status_one = ! empty( $instance['status_one'] ) ? $instance['status_one'] : '';

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'status_one' ) ); ?>"><?php esc_attr_e( 'Status #1', 'text_domain' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'status_one' ) ); ?>" name="<?php echo esc_attr( $this->get_field_id( 'status_one' ) ); ?>" type="text" value="<?php echo esc_attr( $status_one ); ?>">
				<label for="<?php echo esc_attr( $this->get_field_id( 'mark_one' ) ); ?>"><?php esc_attr_e( 'Status OK?', 'text_domain' ); ?>
				</label>
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'mark_one' ) ); ?>" name="<?php echo esc_attr( $this->get_field_id( 'mark_one' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $mark_one ); ?>">
			</p>

			<?php }

		/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['status_one'] = ( ! empty( $new_instance['status_one'] ) ) ? strip_tags( $new_instance['status_one'] ) : '';

			return $instance;
		}

	}
} // if(! class_exists())
