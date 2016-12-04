<?php
/**
 * Enqueue Scripts and Styles
 */
if(! class_exists( 'FES_Enqueue' ) ) {
class FES_Enqueue {

	const FESVERSION = '3.145';

	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	function enqueue_scripts() {
		wp_enqueue_script( 'fescookie', plugin_dir_url( __FILE__ ) . 'js/cookie.js', array( 'jquery' ), self::FESVERSION, false );
		wp_enqueue_script( 'fes', plugin_dir_url( __FILE__ ) . 'js/frontendselector.js', array( 'jquery' ), self::FESVERSION, false );

	}

}
} // if(! class_exists())
