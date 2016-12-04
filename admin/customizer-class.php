<?php
/**
 * Customizer Class
 */

if(! class_exists( 'FES_Customizer' ) ) {
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
					'section' => 'fes-control',
					'settings' => 'fes-color[' . $color['slug'] . ']',
					)
			));

			// Setting: CSS class.
			$wp_customize->add_setting(
				'fes-color[cssclass]',
				array(
					'default'     => '.site-content',
					'type'        => 'option',
					'capability'  => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr'
				)
			);

			// Control: CSS class.
			$wp_customize->add_control(
				'fes-color[cssclass]',
				array(
					'label'       => __( 'CSS Class', 'TEXT_DOMAIN' ),
					'description' => __( 'Provide the CSS class of the background you want to change.', 'TEXT_DOMAIN' ),
					'section'     => 'fes-control',
					'type'        => 'text',
					'choices'  => array(
						'enable'  => 'Enable',
						'disable' => 'Disable',
					),
					'settings'    => 'fes-color[cssclass]',
			) );

		}

		$wp_customize->add_section('fes-control' , array(
		    'title' => __( 'Frontend Selector','fes' ),
		    'description' => __( 'Enter the colors users can select', 'fes' ),
		));

	}
}
} // if(! class_exists())
