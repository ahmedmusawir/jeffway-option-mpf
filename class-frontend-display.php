<?php 

/**
 *
 * A Class for Frontend Display of Options
 *
 */

/**
* MPF Options Display
*/
class FrontendDisplayMPF extends JeffwayOptionMPF
{
	
	function __construct()
	{
		# code...
		// add_action( 'wp_head', array( $this, 'mooseTesting1' ), 10 );
		// add_action( 'wp_head', array( $this, 'mooseTesting2' ), 11 );
		// add_action( 'wp_footer', array( $this, 'mooseTesting3' ), 12 );
		add_action( 'wp_head', array( $this, 'displayResults' ) );
		// add_filter( 'the_content', array( $this, 'displayResults' ) );
	}

	public function displayResults( $content ) {

		$options = get_option( 'jw_options', $this->jw_options_default() );

		// CUSTOM TEXT FIELD 1

		if ( isset( $options['custom_url'] ) && ! empty( $options['custom_url'] ) ) {

			$url = esc_url( $options['custom_url'] );
		}

		// CUSTOM TEXT FIELD 2

		if ( isset( $options['custom_title'] ) && ! empty( $options['custom_title'] ) ) {

			$title = esc_attr( $options['custom_title'] );
		}

		// CUTOM RADIO FIELD

		if ( isset( $options['custom_radio'] ) && ! empty( $options['custom_radio'] ) ) {

			$radio = sanitize_text_field( $options['custom_radio'] );
		}

		?>


		<?php if ( is_front_page() ) : ?>

		<section id="frontend-options-display">

			<pre>
				<?php var_dump($options); ?>
			</pre>

			<div class="options-content">
				<ul class="list-group">
					<li class="list-group-item"><?php echo "Custom URL:&nbsp; " . $url; ?></li>
					<li class="list-group-item"><?php echo "Custom Title:&nbsp; " . $title; ?></li>
					<li class="list-group-item"><?php echo "Custom Radio:&nbsp; " . $radio; ?></li>
				</ul>
			</div>
			
		</section>

		<?php endif; ?>

		<?php

		return $content;
	}

	public function mooseTesting1() {
		# code...
		?>
        
        <script>
            alert('Page is loading 1...');
        </script>
    	
    	<?php		
	}

	public function mooseTesting2() {
		# code...
		?>
        
        <script>
            alert('Page is loading 2...');
        </script>
    	
    	<?php		
	}

	public function mooseTesting3() {
		# code...
		?>
        
        <script>
            alert('Footer is loading 3...');
        </script>
    	
    	<?php		
	}

	
}









































