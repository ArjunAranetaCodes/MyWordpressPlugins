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


	$current_admin_menu = $GLOBALS[ 'menu' ];
	foreach ($current_admin_menu as $menu) {
		//echo '<pre>' . $menu[0] . '</pre>';
			// Dropdown
		if($menu[0] != ''){
			add_settings_field(
				'wpplugin_settings_select'.$menu[0],
				__( $menu[0], 'wpplugin'),
				'wpplugin_settings_select_callback2',
				'wpplugin',
				'wpplugin_settings_section',
				[
					'option_one' => 'Hide',
					'option_two' => 'Show'
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

function wpplugin_settings_select_callback2( $args ) {

  $options = get_option( 'wpplugin_settings2' );

  $select = '';
	if( isset( $options[ 'select' ] ) ) {
		$select = esc_html( $options['select'] );
	}

  $html = '<select id="wpplugin_settings_options" name="wpplugin_settings2[select]">';

	$html .= '<option value="option_one"' . selected( $select, 'option_one', false) . '>' . $args['option_one'] . '</option>';
	$html .= '<option value="option_two"' . selected( $select, 'option_two', false) . '>' . $args['option_two'] . '</option>';

	$html .= '</select>';

	echo $html;

}
