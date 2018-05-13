		<?php

		CUSTOM TABLE UPDATE CODE 
		* The data format %s %d %f etc. are optional

		//WPDB RELATED WORKS 
		global $wpdb;

		$table_name = $wpdb->prefix . "MPF_First_Table";
		$wpdb->update (
			$table_name,
			array(
				'time' =>  current_time('mysql', 1),
				'name' => 'mpf insert 7',
				'text' => 'Description has been changed to 7', 
				'url'  => 'http://apple.com/iphone'	
			),
			array(
				'id' => 3
			),
			array(
				'%s',
				'%s',
				'%s',
				'%s', 
			),
			array(
				'%d'
			)
		);

		?>
