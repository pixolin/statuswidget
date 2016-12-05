<?php
/**
 * Dynamic styling
 */
if ( ! class_exists( 'FES_Style' ) ) {
	class FES_Style {

		function __construct() {
			add_action( 'wp_head', array( $this, 'frontend' ) );
		}

		function frontend() {
			//get colors as predefined in customizer
			$color = get_option( 'fes-color' );

			$shadow = '';
			$border = '';
			if ( $color['shadow'] ) {
				$shadow =
				'-webkit-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
				box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);';
			} else {
				$border = 'border: 1px solid #e0e0e0;';
			}

			$style = '<style type="text/css" name="dolly">
		.fes-color input  {
			display: none;
		}
		.fes-color label {
			display: inline-block;
			width: ' . $color['size'] . 'px;
			height: ' . $color['size'] . 'px;
			border-radius: 50%;'
			. $shadow . $border .
			'
 		}
		.fes-default {
			background: transparent;
		}
		.fes-color-one ' . $color['cssclass'] . ',
		.fes-one {
			background: ' . $color['one'] . ';
		}
		.fes-color-two ' . $color['cssclass'] . ',
		.fes-two {
			background: ' . $color['two'] . ';
		}
		.fes-color-three ' . $color['cssclass'] . ',
		.fes-three {
			background: ' . $color['three'] . ';
		}
		</style>';

			echo $style;
		}
	}
} // if(! class_exists())
