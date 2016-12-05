<?php
/**
 * Widget
 */
if ( ! class_exists( 'FES_Widget' ) ) {
	class FES_Widget extends WP_Widget {

		/**
	 	* Sets up the widgets name etc
	 	*/
		public function __construct() {
			$widget_ops = array(
			'classname'   => 'fes-widget',
			'description' => __( 'Adds buttons to the sidebar to let user select background color.', 'fes' ),
			'customize_selective_refresh' => true,
			);
			parent::__construct( 'fes-widget', 'Frontend Selector Widget', $widget_ops );
		}

		/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
		public function widget( $args, $instance ) {
			// for better a11y, add aria-hidden="true" to widget
			$before_widget = $args['before_widget'];
			$before_widget = str_replace( '>', 'aria-hidden="true">', $before_widget );
			echo $before_widget;

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			// the widget content
			$fes_selector = new FES_Selector();
			echo $fes_selector->display();

			echo $args['after_widget'];
		}

		/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
		public function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
			?>
			<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		}

		/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			return $instance;
		}

	}
} // if(! class_exists())
