<?php

/*-----------------------------------------------------------------------------------------*/
/*	Metabox Attachments AJAX Update
/*-----------------------------------------------------------------------------------------*/
function meta_box_horse_gallery_ajax_update() {
	if ( !empty( $_POST['post_id'] ) )  {
			$args = array(
				'post_type' => 'attachment',
				'post_status' => 'inherit',
				'post_parent' => $_POST['post_id'],
				'post_mime_type' => 'image',
				'posts_per_page' => '-1',
				'order' => 'ASC',
				'orderby' => 'menu_order',
				'exclude'     => get_post_thumbnail_id($_POST['post_id'])
			);				
				
			$attachments = get_posts( $args );
			$return = '';						
			if( empty( $attachments ) )
				$return .= '<p>'. __('No images.','si_theme'). '</p>';	
			else {	
				foreach( $attachments as $image ):
					$thumbnail = wp_get_attachment_image_src( $image->ID, 'thumbnail');
					$return .= '<img style="margin-right:5px;" width="100" height="100" src="' . $thumbnail[0] . '" alt="' . apply_filters('the_title', $image->post_title). '"/>';
				endforeach;
			}			
			echo $return;
			exit();
	}
}
add_action( 'wp_ajax_refresh_metabox', 'meta_box_horse_gallery_ajax_update' );


/*-----------------------------------------------------------------------------------------*/
/*	Clear the variables
/*-----------------------------------------------------------------------------------------*/
function my_meta_clean(&$arr) {
	if (is_array($arr)) {
		foreach ($arr as $i => $v) {
			if (is_array($arr[$i])) {
				my_meta_clean($arr[$i]);
				if (!count($arr[$i])) {
					unset($arr[$i]);
				}
			}
			else {
				if (trim($arr[$i]) == '') {
					unset($arr[$i]);
				}
			}
		}

		if (!count($arr)) {
			$arr = NULL;
		}
	}
}

?>