<?php 
/**
 * WP DB Tesing
 */
class WPDBTesting
{
	
	function __construct()
	{
		add_action( 'wp_footer', array(  $this, 'displayWBDbResults' ) );
		// add_action( 'wp_head', array(  $this, 'displayWBDbResults' ) );
	}

	public function displayWBDbResults()
	{

		?>

		<section id="mpf-header-box">

			<h4>
				Moose Plugin Framework 1.0!
			</h4>
			<h3>
				USING WPDBTesting
			</h3>

			


		<?php

		global $wpdb;

		echo '<h5>Returns 1st row title:(SQL must be single quote not double)</h5> <br>';
		echo '<p>$wpdb->get_var( "SELECT post_title FROM wp_posts" )</p><br>';
		$result = $wpdb->get_var( 'SELECT post_title FROM wp_posts' );
		echo '<div class="result-box">' . $result . '</div><br>';

		echo '<p>$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users" )</p> <br>';
		$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users" );
		echo '<div class="result-box">User count is   ' . $user_count . '</div>' . '<br>';

		
		//Returns 5 column offset & 4 row offset
		echo '<h5>Shows 6th column & 5th row variable:</h5> <br>';
		echo '<p>$wpdb->get_var( "SELECT * FROM wp_posts", 5, 4 )</p> <br>';
		$result = $wpdb->get_var( 'SELECT * FROM wp_posts', 5, 4 );
		echo '<div class="result-box">User count is   ' . $result . '</div><br>';

		echo '<h5>Returns Post Object for the 1st Row:</h5> <br>';
		echo '<h5>$wpdb->get_row( "SELECT * FROM wp_posts" )</h5> <br>';
		$result = $wpdb->get_row( 'SELECT * FROM wp_posts' );
		echo '<pre>';
		print_r($result) . '<br>';
		echo '</pre>';

		echo '<h5>Returns Post Object for the 14TH Row:</h5> <br>';
		echo '<h5>$wpdb->get_row( "SELECT * FROM wp_posts", OBJECT, 14 )</h5> <br>';
		$result = $wpdb->get_row( 'SELECT * FROM wp_posts', OBJECT, 14 );
		echo '<pre>';
		// print_r($result) . '<br>';
		echo '</pre>';

		echo '<h5>Returns Post Array for the 6TH COLUMN by offsetting 5:</h5> <br>';
		echo '<h5>$wpdb->get_col( "SELECT * FROM wp_posts", 5 )</h5> <br>';
		$result = $wpdb->get_col( 'SELECT * FROM wp_posts', 5 );
		echo '<pre>';
		// print_r($result) . '<br>';
		echo '</pre>';

		echo '<h5>Returns Every Post As an OBJECT. Can be output like print_r( $result[ n ] ) * where n is the index</h5> <br>';
		echo '<h5>$wpdb->get_results( "SELECT * FROM wp_posts", OBJECT )</h5> <br>';
		$result = $wpdb->get_results( 'SELECT * FROM wp_posts', OBJECT );
		echo '<pre>';
		// print_r($result) . '<br>';
		// print_r($result[2]) . '<br>';
		echo '<h5>print_r($result[2]->post_title)</h5><br>';
		print_r($result[2]->post_title) . '<br>';
		echo '</pre>';

		echo '<h5>CREATE TABLE wp_MPF_First_Table</h5> <br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-create-table-code.php');
		echo '</pre>';

		echo '<h5>DELETE TABLE wp_MPF_First_Table</h5> <br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-drop-table-code.php');
		echo '</pre>';

		echo '<h5>INSERT INTO wp_MPF_First_Table</h5> <br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-insert-code.php');
		echo '</pre>';

		echo '<h5>INSERT INTO wp_MPF_First_Table</h5> <br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-update-code.php');
		echo '</pre>';

		echo '<h5>INSERT INTO wp_options Table</h5> <br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-options-table-code.php');
		echo '</pre>';

		echo '<h5>PREPARE QUERY INSERT INTO wp_options Table</h5> <br>';
		echo '<pre style="background-color: #e0e0e0;">';
		highlight_file('wpdb-prepare-insert-code.php');
		echo '</pre>';



		echo '<h5>From wp_MPF_First_Table</h5> <br>';
		echo '<h5>$wpdb->get_results( "SELECT * FROM wp_MPF_First_Table", OBJECT )</h5> <br>';
		$result = $wpdb->get_results( 'SELECT * FROM wp_MPF_First_Table', OBJECT );
		echo '<pre>';
		// print_r($result) . '<br>';
		// print_r($result[2]) . '<br>';
		echo '<h5>print_r($result[2]->id)</h5><br>';
		print_r($result[2]->id) . '<br>';
		echo '</pre>';	
		echo '</section>';
	}
}






























































