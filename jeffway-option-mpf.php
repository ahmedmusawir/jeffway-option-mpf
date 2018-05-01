<?php 

/**
 *
 * Plugin Name: MPF Jeff Way - WP Options API
 * Plugin URI:	https://htmlfivedev.com 
 * Description: Display a short notice above the post content.
 * Version: 	1.0
 * Author URI: 	https://www.linkedin.com/in/ahmedmusawir
 * License: 	GPL-2.0+ 
 *
 */

//If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die("Cannot Access Directly");
}

// echo plugin_dir_path( __FILE__ );
// echo plugins_url( '/assets/js/admin.js', __FILE__ );
// die;

require_once( plugin_dir_path( __FILE__ ) . 'class-jeffway-option-mpf.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );

function moose_post_notice_start() {

	$setup_styles = new MPFEnqueue();
	$setup_styles->initialize();

	$setup_options = new JeffwayOptionMPF();
}

moose_post_notice_start();

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'MooseActivate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_activation_hook( __FILE__, array( 'MooseDeactivate', 'deactivate' ) );