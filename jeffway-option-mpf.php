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

//Scripts Enqueue
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );

//Custom Post Type 
require_once( plugin_dir_path( __FILE__ ) . '/inc/Cpt/class-custom-post.php' );


//Admin Main Page
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminMenu/class-settings-validation.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminMenu/class-settings-callbacks.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminMenu/class-jeffway-option-mpf.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminMenu/class-frontend-display.php' );

//Admin Sub Menu Page
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminSubMenu/class-submenu-settings-validation.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminSubMenu/class-submenu-settings-callbacks.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminSubMenu/class-submenu-option-mpf.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Pages/AdminSubMenu/class-submenu-frontend-display.php' );

function moose_post_notice_start() {

	//SCRIPTS ENQUEUE
	$setup_styles = new MPFEnqueue();
	$setup_styles->initialize();

	//MAIN MENU INSTANCES
	$setup_options = new JeffwayOptionMPF();

	$frontend_display = new FrontendDisplayMPF();

	//SUBMENU INSTANCES
	$submenu_options = new SubmenuOptionMPF();

	$submenu_frontend_display = new SubmenuFrontendDisplayMPF();

	//MAKE PORTFOLIO CUSTOM POST TYPE 
	$make_cpt = new CustomPostType();
}

moose_post_notice_start();

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'MooseActivate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_activation_hook( __FILE__, array( 'MooseDeactivate', 'deactivate' ) );