<?php 	

/**
* 
*/
class SubmenuValidateSettingsMPF 
{
	
	public function __construct()
	{
		# code...
	}

	public static function submenuValidateOptions( $input ) {


		$uploadedfile = $_FILES['submenu_options_custom_image'];

		$upload_overrides = array( 'test_form' => false );

		$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

		// print_r($uploadedfile);
		// die();

		if ( $movefile && ! isset( $movefile['error'] ) ) {
		    // echo "File is valid, and was successfully uploaded.\n";
		    // var_dump( $movefile );


		    $input['custom_image'] = $movefile['url'];

		    // echo $input['custom_image'];
		    // die;

		    /**
		     *
		     * THIS BLOCK IS FOR MAKING UPLOADED IMAGE SHOW UP IN THE MEDIA LIB
		     *
		     */
		    

			$wp_upload_dir = wp_upload_dir();

			$attachment = array(
				"guid" => $movefile['file'], 
				"post_mime_type" => $movefile['type'],
				"post_title" => $uploadedfile['name'],
				"post_content" => "",
				"post_status" => "draft",
				"post_author" => 1
			);

			$id = wp_insert_attachment( $attachment, $movefile['file'],0);

			$attach_data = wp_generate_attachment_metadata( $id, $movefile['file'] );
			wp_update_attachment_metadata( $id, $attach_data );

		} else {
		    /**
		     * Error generated by _wp_handle_upload()
		     * @see _wp_handle_upload() in wp-admin/includes/file.php
		     */
		    $options = get_option( 'submenu_options' );
		    $input['custom_image'] = $options['custom_image'];


		}

		/**
		 *
		 * RETURNING THE INPUT 
		 *
		 */
		// print_r($input);

		return $input;
	}	
}




