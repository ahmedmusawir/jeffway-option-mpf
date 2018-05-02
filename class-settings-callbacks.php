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

		// echo "<pre>the ARGS:";
		// echo var_dump($args);
		// echo "</pre>";
	}

	// callback: radio field
	public function jwCallbackFieldRadio( $args ) {
		
		$options = get_option( 'jw_options', $this->jw_options_default() );
		
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		
		$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
		
		$radio_options = array(
			
			'enable'  => 'Enable custom styles',
			'disable' => 'Disable custom styles'
			
		);
		
		foreach ( $radio_options as $value => $label ) {
			
			$checked = checked( $selected_option === $value, true, false );
			
			echo '<label><input name="jw_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
			echo '<span>'. $label .'</span></label><br />';
			
		}

		// echo "<pre>the options:";
		// echo var_dump($options);
		// echo "</pre>";
		
	}

}






































