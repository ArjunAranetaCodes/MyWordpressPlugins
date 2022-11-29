<?php

function wpplugin_settings_page_markup2()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
  include( WPPLUGIN_DIR2 . 'templates/admin/settings-page.php');
}

function wpplugin_settings_pages2()
{
  add_menu_page(
    __( 'Hide/Show Admin Menu Items', 'wpplugin' ),
    __( 'Hide/Show Admin Menu Items', 'wpplugin' ),
    'manage_options',
    'wpplugin',
    'wpplugin_settings_page_markup2',
    'dashicons-screenoptions',
    100
  );

}
add_action( 'admin_menu', 'wpplugin_settings_pages2' );

// Add a link to your settings page in your plugin
function wpplugin_add_settings_link2( $links ) {
    $settings_link = '<a href="admin.php?page=wpplugin">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wpplugin_add_settings_link2' );
