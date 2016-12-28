<?php
/**
 * Plugin Name: Status Widget
 * Description: Adds widget to display a current status for up to four items in a widget area.
 * Author: Bego Mario Garde
 * Author URI: https://pixolin.de
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: stw
 * Domain Path: languages
 */

defined( 'ABSPATH' ) or exit;

include( plugin_dir_path( __FILE__ ) . 'loader-class.php' );
$run = new STW_Loader();
