<?php
/**
 * Plugin Name: Front End Selector
 * Description: Lets users select the background color of your site
 * Author: Bego Mario Garde
 * Author URI: https://pixolin.de
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: fes
 * Domain Path: languages
 */

defined( 'ABSPATH' ) or exit;

/**
 * What happens in wp-admin?
 */
include( plugin_dir_path( __FILE__ ) . 'admin/customizer-class.php' );
$fes_settings = new FES_Customizer();

include( plugin_dir_path( __FILE__ ) . 'admin/widget-class.php' );
add_action( 'widgets_init', function(){
	register_widget( 'FES_Widget' );
});

/**
 * What happens in Frontend?
 */
include( plugin_dir_path( __FILE__ ) . 'inc/enqueue-class.php' );
$fes_enqueue = new FES_Enqueue();

include( plugin_dir_path( __FILE__ ) . 'inc/selector-class.php' );

include( plugin_dir_path( __FILE__ ) . 'inc/style-class.php' );
$fes_style = new FES_Style();
