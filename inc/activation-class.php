<?php
/**
 * Register setting upon activation
 */

if ( ! class_exists( 'FES_Activation' ) ) {
	class FES_Activation {
		function activation() {
			add_option( 'fes-color', array(
				'one'       => '#FFFAF0',
				'two'       => '#E6E6FA',
				'three'     => '#DEB887',
				'css-class' => '.site-content',
				'size'      => 20,
				'shadow'    => 1,
			) );
		}
	}
} // if(! class_exists())
