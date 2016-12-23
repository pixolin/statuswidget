<?php
/**
 * Loader
 */

if ( ! class_exists( 'STW_Loader' ) ) {
	class STW_Loader {

		function __construct() {

			$this->load_classes();
			$this->stw_translate();
		}

		function load_classes() {

			include( plugin_dir_path( __FILE__ ) . 'admin/widget-class.php' );
			add_action( 'widgets_init', function(){
				register_widget( 'STW_Widget' );
			});

		} //function

		function stw_translate() {
			load_plugin_textdomain( 'stw', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

	} // class
} //if
