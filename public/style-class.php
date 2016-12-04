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

			$style = '<style type="text/css" name="dolly">
		.fes-color input  {
			display: none;
		}
		.fes-color label {
			display: inline-block;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			-webkit-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
			box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
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
