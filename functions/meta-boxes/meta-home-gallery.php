<?php

/*-----------------------------------------------------------------------------------------*/
/*	If Certain Page Template
/*-----------------------------------------------------------------------------------------*/
$post_id = 		$_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
$template_file = 	get_post_meta($post_id,'_wp_page_template',TRUE);

if ($template_file == 'template-page-home.php') {


/*-----------------------------------------------------------------------------------------*/
/*	Define Metabox Fields 
/*-----------------------------------------------------------------------------------------*/
$meta_home_gallery = array(
	'id' => 		'meta_home_gallery',
	'title' =>  		__('Horse Gallery Images', 'my_theme'),
	'page' => 		'page',
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
function add_meta_home_gallery() {
	global $meta_home_gallery;
	add_meta_box($meta_home_gallery['id'], $meta_home_gallery['title'], 'meta_home_gallery', $meta_home_gallery['page'], $meta_home_gallery['context'], $meta_home_gallery['priority']);
}
add_action('admin_menu', 'add_meta_home_gallery');


/*-----------------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------------*/
function meta_home_gallery() {
	global $meta_home_gallery, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to manage the images displayed in home page slideshow gallery. Upload your images and use "Manage Images" to edit, reorder and delete images.', 'my_theme').'</p>';

	echo '<table class="form-table my-custom-table">';
 
	foreach ($meta_home_gallery['fields'] as $field) {
	
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
	echo '<input type="hidden" name="meta_home_gallery_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}  



/*-----------------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------------*/
function meta_home_gallery_scripts() {
	wp_enqueue_script('meta-upload-media', get_template_directory_uri() . '/functions/meta-boxes/js/upload-media.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('meta-gallery', get_template_directory_uri() . '/functions/meta-boxes/js/gallery.js');
}
add_action('admin_print_scripts', 'meta_home_gallery_scripts');

} // if certain page template

?>