<?php
/**
* Plugin Name: Hide Admin Menu Items
* Plugin URI: https://www.your-site.com/
* Description: This Plugin will hide and show Admin Menu Items from the Admin dashboard side bar
* Version: 0.1
* Author: Arjun Araneta
* Author URI: https://www.your-site.com/
**/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// Define plugin paths and URLs
define( 'WPPLUGIN_URL2', plugin_dir_url( __FILE__ ) );
define( 'WPPLUGIN_DIR2', plugin_dir_path( __FILE__ ) );


// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-settings-fields.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-menus.php');

?>
