<?php

function wpplugin_settings2() {

  // If plugin settings don't exist, then create them
  if( false == get_option( 'wpplugin_settings2' ) ) {
      add_option( 'wpplugin_settings2' );
  }
	
  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'wpplugin_settings_section',
    // Section Title
    __( 'Plugin Settings Section', 'wpplugin' ),
    // Callback for an optional description
    'wpplugin_settings_section_callback2',
    // Admin page to add section to
    'wpplugin'
  );


  
  //save all menu items first
	$current_admin_menu = $GLOBALS[ 'menu' ];
  if(!get_option('admin_show_hide_menu_all_menu')){
	add_option('admin_show_hide_menu_all_menu',$current_admin_menu);  
  }
  
	foreach ($current_admin_menu as $menu) {
		//echo '<pre>' . $menu[0] . '</pre>';
			// Dropdown
		if($menu[0] != ''){
			$menu_field_name = strtolower($menu[0]);
			$menu_field_name = str_replace(' ', '_', $menu_field_name);
			
			add_settings_field(
				'wpplugin_settings_select'.$menu[0],
				__( $menu[0], 'wpplugin'),
				'admin_show_hide_menu_items',
				'wpplugin',
				'wpplugin_settings_section',
				[
					'menu_name' => $menu_field_name,
					'option_hide' => 'Hide',
					'option_show' => 'Show'
				]
			);
		}

	}


  register_setting(
    'wpplugin_settings2',
    'wpplugin_settings2'
  );
}
add_action( 'admin_init', 'wpplugin_settings2' );

function wpplugin_settings_section_callback2() {

  esc_html_e( 'Plugin settings section description', 'wpplugin' );

}

function ft_remove_menus(){
 //remove_menu_page( 'index.php' ); //Dashboard
}
add_action( 'admin_menu', 'ft_remove_menus' );

function admin_show_hide_menu_items( $args ) {

  $options = get_option( 'wpplugin_settings2' );
	
  $select_name = 'select'.$args['menu_name'];
  $select = '';
	if( isset( $options[ $select_name ] ) ) {
		$select = esc_html( $options[$select_name] );
	}

  $html = '<select id="wpplugin_settings_options" name="wpplugin_settings2['.$select_name.']">';

	$html .= '<option value="option_hide"' . selected( $select, 'option_hide', false) . '>' . $args['option_hide'] . '</option>';
	$html .= '<option value="option_show"' . selected( $select, 'option_show', false) . '>' . $args['option_show'] . '</option>';

	$html .= '</select>';

	echo $html;

}
