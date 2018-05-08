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

define( "PLUGIN_DIR", ABSPATH . 'wp-content/plugins/jeffway-option-mpf' );
//Scripts Enqueue
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );

//Custom Post Type 
require_once( plugin_dir_path( __FILE__ ) . '/inc/Cpt/class-custom-post.php' );

//Custom Metabox 
// require_once( plugin_dir_path( __FILE__ ) . '/inc/Metabox/class-custom-metabox.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Metabox/class-metabox-textarea.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Metabox/class-metabox-text-input.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Metabox/class-metabox-select.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Metabox/class-metabox-checkbox.php' );
require_once( plugin_dir_path( __FILE__ ) . '/inc/Metabox/class-checkbox-test.php' );


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

	//CUSTOM META BOX IN POST NOTICE
	// $make_metabox = new AddCustomMetaboxMPF();

	//MPF TEXTARAE META BOX 
	$make_textarea = new MPFAddCustomMetaboxTextArea();

	//MPF TEXT INPUT META BOX 
	$make_text_input = new MPFAddCustomMetaboxTextInput();

	//MPF SELECT META BOX 
	$make_select = new MPFAddCustomMetaboxSelect();

	//MPF CHECKBOX META BOX 
	$make_checkbox = new MPFAddCustomMetaboxCheckbox();
}

moose_post_notice_start();

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'MooseActivate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_activation_hook( __FILE__, array( 'MooseDeactivate', 'deactivate' ) );




























































































