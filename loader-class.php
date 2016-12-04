<?php
/**
 * Loader
 */

if ( ! class_exists( 'FES_Loader' ) ) {
	class FES_Loader {

		private $path;


		function __construct() {

			$path = plugin_dir_path( __FILE__ );

			include_once( $this->path . 'inc/activation-class.php' );

			include( $this->path . 'admin/customizer-class.php' );
			$fes_settings = new FES_Customizer();

			include( $this->path . 'admin/widget-class.php' );
			add_action( 'widgets_init', function(){
				register_widget( 'FES_Widget' );
			});

			include( $this->path . 'inc/enqueue-class.php' );
			$fes_enqueue = new FES_Enqueue();

			include( $this->path . 'inc/selector-class.php' );

			include( $this->path . 'public/style-class.php' );
			$fes_style = new FES_Style();
		} //function


	} // class
} //if

