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
			parent::__construct( 'stw_widget', 'Status Widget', $widget_ops );
		}

		/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
		public function widget( $args, $instance ) {

			$statusfields = array(
				'statusone' => 'markone',
				'statustwo' => 'marktwo',
				'statusthree' => 'markthree',
				'statusfour' => 'markfour',
				);

			echo  $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			foreach ( $statusfields as $key => $value ) {
				if ( ! empty( $instance[ $key ] ) ) {
					if ( 'on' == $instance[ $value ] ) {
						$symbol = '✅';
					} else {
						$symbol = '❌';
					}

					echo $instance[ $key ] . ':&nbsp;&nbsp;' . $symbol . '<br>';
				}
			}

			echo $args['after_widget'];
		}

		/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
		public function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'stw' );

			$statusone   = ! empty( $instance['statusone'] )   ? esc_attr( $instance['statusone'] ) : '';
			$statustwo   = ! empty( $instance['statustwo'] )   ? esc_attr( $instance['statustwo'] ) : '';
			$statusthree = ! empty( $instance['statusthree'] ) ? esc_attr( $instance['statusthree'] ) : '';
			$statusfour  = ! empty( $instance['statusfour'] )  ? esc_attr( $instance['statusfour'] ) : '';

			$markone     = ! empty( $instance['markone'] )   ? esc_attr( $instance['markone'] ) : '';
			$marktwo     = ! empty( $instance['marktwo'] )   ? esc_attr( $instance['marktwo'] ) : '';
			$markthree   = ! empty( $instance['markthree'] ) ? esc_attr( $instance['markthree'] ) : '';
			$markfour    = ! empty( $instance['markfour'] )  ? esc_attr( $instance['markfour'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'stw' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'statusone' ) ); ?>"><?php esc_attr_e( 'Status #1', 'stw' ); ?>
				</label><br>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'statusone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'statusone' ) ); ?>" type="text" value="<?php echo esc_attr( $statusone ); ?>">

				<label for="<?php echo esc_attr( $this->get_field_id( 'markone' ) ); ?>"><?php esc_attr_e( 'Status OK?', 'stw' ); ?>
				</label>
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'markone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'markone' ) ); ?>" type="checkbox" <?php checked( $markone, 'on' ); ?>>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'statustwo' ) ); ?>"><?php esc_attr_e( 'Status #2', 'stw' ); ?>
				</label><br>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'statustwo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'statustwo' ) ); ?>" type="text" value="<?php echo esc_attr( $statustwo ); ?>">

				<label for="<?php echo esc_attr( $this->get_field_id( 'marktwo' ) ); ?>"><?php esc_attr_e( 'Status OK?', 'stw' ); ?>
				</label>
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'marktwo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'marktwo' ) ); ?>" type="checkbox" <?php checked( $marktwo, 'on' ); ?>>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'statusthree' ) ); ?>"><?php esc_attr_e( 'Status #3', 'stw' ); ?>
				</label><br>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'statusthree' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'statusthree' ) ); ?>" type="text" value="<?php echo esc_attr( $statusthree ); ?>">

				<label for="<?php echo esc_attr( $this->get_field_id( 'markthree' ) ); ?>"><?php esc_attr_e( 'Status OK?', 'stw' ); ?>
				</label>
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'markthree' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'markthree' ) ); ?>" type="checkbox" <?php checked( $markthree, 'on' ); ?>>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'statusfour' ) ); ?>"><?php esc_attr_e( 'Status #4', 'stw' ); ?>
				</label><br>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'statusfour' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'statusfour' ) ); ?>" type="text" value="<?php echo esc_attr( $statusfour ); ?>">

				<label for="<?php echo esc_attr( $this->get_field_id( 'markfour' ) ); ?>"><?php esc_attr_e( 'Status OK?', 'stw' ); ?>
				</label>
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'markfour' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'markfour' ) ); ?>" type="checkbox" <?php checked( $markfour, 'on' ); ?>>
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
			$instance['statusone'] = ( ! empty( $new_instance['statusone'] ) ) ? strip_tags( $new_instance['statusone'] ) : '';
			$instance['statustwo'] = ( ! empty( $new_instance['statustwo'] ) ) ? strip_tags( $new_instance['statustwo'] ) : '';
			$instance['statusthree'] = ( ! empty( $new_instance['statusthree'] ) ) ? strip_tags( $new_instance['statusthree'] ) : '';
			$instance['statusfour'] = ( ! empty( $new_instance['statusfour'] ) ) ? strip_tags( $new_instance['statusfour'] ) : '';
			$instance['markone'] = strip_tags( $new_instance['markone'] );
			$instance['marktwo'] = strip_tags( $new_instance['marktwo'] );
			$instance['markthree'] = strip_tags( $new_instance['markthree'] );
			$instance['markfour'] = strip_tags( $new_instance['markfour'] );

			return $instance;
		}

	}
} // if(! class_exists())
