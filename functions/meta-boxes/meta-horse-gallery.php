<?php
/*-----------------------------------------------------------------------------------------*/
/*	Define Metabox Fields 
/*-----------------------------------------------------------------------------------------*/
$meta_box_portfolio_images = array(
	'id' => 		'meta-box-horse-gallery',
	'title' =>  		__('Horse Gallery Images', 'my_theme'),
	'page' => 		'horse_post',
	'context' => 	'normal',
	'priority' => 	'high',
	'fields' => 		array(
					array(  
						"name" => __('Uploads/Manage Images','my_theme'),
						"desc" => __("Here's the list of the images",'my_theme'),
						"type" => "attachments",
						"std" => ""
					)		
				)	
);


/*-----------------------------------------------------------------------------------------*/
/*	Add metabox 
/*-----------------------------------------------------------------------------------------*/
function add_meta_box_horse_gallery() {
	global $meta_box_portfolio_images;
	add_meta_box($meta_box_portfolio_images['id'], $meta_box_portfolio_images['title'], 'meta_box_horse_gallery', $meta_box_portfolio_images['page'], $meta_box_portfolio_images['context'], $meta_box_portfolio_images['priority']);
}
add_action('admin_menu', 'add_meta_box_horse_gallery');


/*-----------------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------------*/
function meta_box_horse_gallery() {
	global $meta_box_portfolio_images, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to manage the images displayed in the portfolio. Upload your images and use "Manage Images" to edit, reorder and delete images.', 'my_theme').'</p>';

	echo '<table class="form-table my-custom-table">';
 
	foreach ($meta_box_portfolio_images['fields'] as $field) {
	
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], true);
			
		switch ($field['type']) { 
			
				//If Attachments
			case 'attachments':
				echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
				$args = array(
					'post_type' => 		'attachment',
					'post_status' => 		'inherit',
					'post_parent' => 		$post->ID,
					'post_mime_type' => 	'image',
					'posts_per_page' => 	'-1',
					'order' => 			'ASC',
					'orderby' => 		'menu_order',
					'exclude' => 		get_post_thumbnail_id()
				);
				
				$intro = '<p><a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=715" id="add_images" class="thickbox" title="' . __( 'Upload Images', 'my_theme' ) . '">' . __( 'Upload Images', 'my_theme' ) . '</a> | <a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;tab=gallery&amp;TB_iframe=1&amp;width=640&amp;height=715" id="manage_images" class="thickbox" title="' . __( 'Manage Images', 'my_theme' ) . '">' . __( 'Manage Images', 'my_theme' ) . '</a></p>';
				echo $intro;
				
				$return = '';
				$attachments = get_posts( $args );
				
					$return .= '<div id="meta-horse-gallery-attachments">';
						if( empty( $attachments ) )
							$return .= '<p>'. __('No images.','my_theme'). '</p>';
						else {
							foreach( $attachments as $image ):
								$thumbnail = wp_get_attachment_image_src( $image->ID, 'thumbnail');
								$return .= '<img style="margin-right:5px;" width="100" height="100" src="' . $thumbnail[0] . '" alt="' . apply_filters('the_title', $image->post_title). '"/>';
							endforeach;
						}
					$return .= '</div>';
				echo $return;
				
				echo 	'</td>',
				'</tr>';				
			break;
			
		}

	}
 
	echo '</table>';
	
	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="meta_horse_gallery_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}  



/*-----------------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------------*/
function meta_scripts_portfolio() {
	wp_register_script('my-upload', get_template_directory_uri() . '/meta-boxes/js/upload-media.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
add_action('admin_print_scripts', 'meta_scripts_portfolio');

?>