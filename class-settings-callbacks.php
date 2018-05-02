<?php 

/**
 *
 * Settings Callbacks Class
 *
 */
class SettingsCallbacks {


	public function jwValidateOptions( $input ) {

		return $input;
	}

	public function jwCallbackSectionOne() {

		echo "<h3>This is Section One</h3>";
	}

	public function jwCallbackSectionTwo() {
		
		echo "<h3>This is Section Two</h3>";
	}

	// default plugin options
	public function jw_options_default() {

		return array(
			'custom_url'     => 'https://wordpress.org/',
			'custom_title'   => 'Powered by WordPress',
			'custom_style'   => 'disable',
			'custom_message' => '<p class="custom-message">My custom message</p>',
			'custom_footer'  => 'Special message for users',
			'custom_toolbar' => false,
			'custom_scheme'  => 'default',
		);

	}

	public function jwCallbackFieldText( $args ) {

		$options = get_option( 'jw_options', $this->jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		echo '<input id="jw_options_'. $id .'" name="jw_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
		echo '<label for="jw_options_'. $id .'">'. $label .'</label>';		

		// echo "<pre>the options:";
		// echo var_dump($options);
		// echo "</pre>";		
	}
}







































