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

include( plugin_dir_path( __FILE__ ) . 'loader-class.php' );
$run = new FES_Loader();

register_activation_hook( __FILE__, array( 'FES_Activation', 'activation' ) );
