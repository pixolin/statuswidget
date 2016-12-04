<?php
/**
 * Customizer Class
 */

class FES_Customizer {

	function __construct() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}


	function customize_register( $wp_customize ) {

		$colors = array();
		$colors[] = array(
			'slug'    => 'one',
			'default' => '#FFFAF0',
			'label'   => __( 'Color One', 'fes' ),
		);
		$colors[] = array(
			'slug'    => 'two',
			'default' => '#E6E6FA',
			'label'   => __( 'Color Two', 'fes' ),
		);
		$colors[] = array(
			'slug'    => 'three',
			'default' => '#DEB887',
			'label'   => __( 'Color Three', 'fes' ),
		);

		foreach ( $colors as $color ) {
			// SETTINGS
			$wp_customize->add_setting(
				'fes-color[' . $color['slug'] . ']',
				array(
					'default'     => $color['default'],
					'type'        => 'option',
					'capability'  => 'edit_theme_options',
				)
			);
			// CONTROLS
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize,
				'fes-color[' . $color['slug'] . ']',
				array(
					'label' => $color['label'],
					'section' => 'layout',
					'settings' => 'fes-color[' . $color['slug'] . ']',
					)
			));
		}

		$wp_customize->add_section('layout' , array(
		    'title' => __( 'Layout','fes' ),
		    'description' => __( 'Enter the colors users can select', 'fes' ),
		));

	}
}
