<?php 

class MPFFirstWidget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'name' => 'MPF First Widget',
			'classname' => 'mpf_first_widget_css',
			'description' => 'MPF First Widget Following Tutsplus',
		);
		parent::__construct( 'mpf_first_widget', '', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		// echo "<h1>Messager Test</h1>";
		echo "<pre style='color: black;'>";
		// echo $instance->class; //non object
		// print_r($args);
		print_r($this);
		echo "</pre>";
		// $user_name = get_option( 'widget_mpf_first_widget', false );
		$user_name = get_option( $this->option_name, true );
		echo "<pre style='color: black;'>";
		print_r($user_name);
		echo "</pre>";
		// echo $user_name[4][ 'name' ] . "<br>";
		// echo $user_name[5][ 'name' ];
		 $your_checkbox_var = $instance[ 'mpf_check' ] ? 'true' : 'false';
		 echo "</h1>" . $your_checkbox_var . "</h1>";

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

		// extract( $instance );
		$instance = wp_parse_args( 
			(array) $instance, 
			array(
				'name' => '',
				'bio' => '',
				'position' => 'above',
				'mpf_check' => '',
				'mpf_radio' => ''
			) 
		);

		?>
		<style type="text/css">
			.mpf-label {
				padding-top: 1rem;
			}
			.mpf-input {
				padding-top: .5rem;
				padding-bottom: .5rem;
				margin-top: .5rem;
				margin-bottom: .5rem;
			}
			.mpf-checkbox {
				/* background-color: indigo; */
				margin-top: 1rem;
				margin-bottom: 1rem;
			}
		</style>
		<div class="front-to-back">
			<label class="mpf-label"><?php _e( 'Your Name:', 'front-to-back' ) ?></label>
			<input 
				type="text"
				class="widefat mpf-input" 
				id="<?php echo $this->get_field_id( 'name' ); ?>"
				name="<?php echo $this->get_field_name( 'name' ); ?>"
				value="<?php echo esc_attr( $instance[ 'name' ] ); ?>"
			/>

			<label class="mpf-label"><?php _e( 'Your Bio:', 'front-to-back' ) ?></label>
			<textarea
				type="text"
				class="widefat mpf-input" 
				id="<?php echo $this->get_field_id( 'bio' ); ?>"
				name="<?php echo $this->get_field_name( 'bio' ); ?>"
				rows="3" cols="30" maxlength="160"
			><?php echo esc_textarea( $instance[ 'bio' ] ); ?></textarea> 
			<p><small>You are limited to 160 Characters</small></p>

			<label class="mpf-label"><?php _e( 'Display Name:', 'front-to-back' ) ?></label>
			<select
				type="text"
				class="widefat mpf-input" 
				id="<?php echo $this->get_field_id( 'position' ); ?>"
				name="<?php echo $this->get_field_name( 'position' ); ?>"
			>
				<option value="above" <?php selected( 'above', $instance[ 'position' ], true ); ?>>
					<?php _e( ' above the bio.', 'front-to-back' ); ?>
				</option>
				<option value="bottom" <?php selected( 'bottom', $instance[ 'position' ], true ); ?>>
					<?php _e( ' below the bio.', 'front-to-back' ); ?>
				</option>
				
			</select> 
			<!-- <label class="mpf-label"><?php _e( 'Checkbox:', 'front-to-back' ) ?></label> -->
			<div class="mpf-checkbox">
				<input 
			    	class="" 
			    	type="checkbox" <?php checked( $instance[ 'mpf_check' ], 'on' ); ?> 
			    	id="<?php echo $this->get_field_id( 'mpf_check' ); ?>" 
			    	name="<?php echo $this->get_field_name( 'mpf_check' ); ?>" /> 
			    
			    <label for="<?php echo $this->get_field_id( 'mpf_check' ); ?>">Label of your checkbox variable</label>
			</div>
			    
		</div>

		<label class="mpf-label"><?php _e( 'Display Radio:', 'front-to-back' ) ?></label>
		
		<p> 
		<input  <?php checked( $instance[ 'mpf_radio' ], 'check_for_1' ); ?>
			type="radio" <?php checked( $instance[ 'mpf_radio' ], 'on' ); ?> 
			id="<?php echo $this->get_field_id( 'mpf_radio' ); ?>" 
			name="<?php echo $this->get_field_name( 'mpf_radio' ); ?>" 
			value="check_for_1"
		/>
	    <label for="<?php echo $this->get_field_id( 'mpf_radio' ); ?>">Check whether to display description or not</label> </p>

	    <p> 
	    <input  <?php checked( $instance[ 'mpf_radio' ], 'check_for_2' ); ?>
	    	type="radio" <?php checked( $instance[ 'mpf_radio' ], 'on' ); ?> 
	    	id="<?php echo $this->get_field_id( 'mpf_radio' ); ?>" 
	    	name="<?php echo $this->get_field_name( 'mpf_radio' ); ?>" 
			value="check_for_2"

	    />
	    <label for="<?php echo $this->get_field_id( 'mpf_radio' ); ?>">Select to Post with Thumbnails</label> 
		</p>		

		<?php

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$old_instance[ 'name' ] = strip_tags(stripcslashes( $new_instance[ 'name' ] ));
		$old_instance[ 'bio' ] = strip_tags(stripcslashes( $new_instance[ 'bio' ] ));
		$old_instance[ 'position' ] = strip_tags(stripcslashes( $new_instance[ 'position' ] ));
		$old_instance[ 'mpf_check' ] = strip_tags(stripcslashes( $new_instance[ 'mpf_check' ] ));
		$old_instance[ 'mpf_radio' ] = strip_tags(stripcslashes( $new_instance[ 'mpf_radio' ] ));

		return $old_instance;
	}
}





























































