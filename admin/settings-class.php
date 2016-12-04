<?php
/**
 * Settings
 */
if(! class_exists( 'FES_Settings' ) ) {
class FES_Settings {

	function __construct() {
		add_action( 'admin_menu', array( $this, 'register_menu_page' ) );
		add_action( 'admin_init', array( $this, 'settings_form' ) );
	}

	public function register_menu_page() {
		//add_menu_page( 'Settings Frontend Selector', 'Frontend Selector', 'manage_options', 'fes_settings', array( $this, 'settings_form' ), 'dashicons-art', null );
		add_submenu_page( 'themes.php', 'Frontend Selector', 'Selector', 'manage_options', 'fes_settings', array( $this, 'settings_form' ) );
	}

	function settings_form() {
		echo '<div class="wrap">';
		echo '<h1>Settings Frontend Selector</h1>';
		echo '<form method="post" action="options.php">';
			settings_fields( 'section' );
			do_settings_sections( 'fes_settings' );
		submit_button();
		echo '</form>';
		echo '</div>';
	}

	function settings() {
		register_setting( 'fes_settings', 'fes_colors', array( $this, 'sanitize_settings' ) );

		add_settings_section( 'fes_settings', 'All Settings', null, 'fes_settings' );

		add_settings_field( 'fes_colors', 'Colors', array( $this, 'fes_color_buttons' ), 'fes_settings', 'fes_settings', array() );
	}

	function fes_color_buttons() {
		echo '<input type="text"></input>';
	}


	function sanitize_settings( $setting ) {
		$sanitized = sanitize_text_field( $setting );
		return $sanitized;
	}
}
} // if(! class_exists())
