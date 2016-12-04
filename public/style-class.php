<?php

class FES_Style {

	function __construct() {
		add_action( 'wp_head', array( $this, 'frontend' ) );
	}

	function frontend() {
		//get colors as predefined in customizer
		$color = get_option( 'fes-color' );

		$style = '<style type="text/css" name="dolly">
		.fes-color input  { display: none; }
		.fes-color label { display: inline-block; width: 20px; height: 20px; border-radius: 50%; }
		.fes-default {
			background: transparent;
			border: 2px dotted black;
		}
		.fes-color-one .site-content,
		.fes-one {
			background: ' . $color['one'] . ';
		}
		.fes-color-two .site-content,
		.fes-two {
			background: ' . $color['two'] . ';
		}
		.fes-color-three .site-content,
		.fes-three {
			background: ' . $color['three'] . ';
		}
		</style>';

		echo $style;
	}
}
