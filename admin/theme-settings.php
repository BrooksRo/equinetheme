<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

//Theme Shortname
$shortname = "admin";


//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tt_pages_obj as $tt_page) {
$tt_pages[$tt_page->ID] = $tt_page->post_name; }
$tt_pages_tmp = array_unshift($tt_pages, "Select a page:"); 


//Access the WordPress Categories via an Array
$tt_categories = array();  
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;}
$categories_tmp = array_unshift($tt_categories, "Select a category:");


//Sample Array for demo purposes
$sample_array = array("1","2","3","4","5");


//Sample Advanced Array - The actual value differs from what the user sees
$sample_advanced_array = array("image" => "The Image","post" => "The Post"); 


//Folder Paths for "type" => "images"
$sampleurl =  get_template_directory_uri() . '/admin/images/sample-layouts/';










/*-----------------------------------------------------------------------------------*/
/* Create The Custom Site Options Panel
/*-----------------------------------------------------------------------------------*/
$options = array(); // do not delete this line - sky will fall


/* Settings - General */	
$options[] = array( "name" => __('Settings - General','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('Footer Copyright Text','framework_localize'),
			"desc" => "Put your copyright text here.",
			"id" => $shortname."_general_footer_text",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Google Analytics Code','framework_localize'),
			"desc" => "Put your entire google analytics tracking code here.",
			"id" => $shortname."_general_google_analytics",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Upload a Favicon','framework_localize'),
			"desc" => __('Upload a custom favicon for you website. (It should be 16x16 pixels.)','framework_localize'),
			"id" => $shortname."_general_favicon",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('News Posts - Comments','framework_localize'),
			"desc" => __('Select what type of commenting system you want your viewers to use on your news posts.','framework_localize'),
			"id" => $shortname."_general_comments",
			"std" => "none",
			"type" => "radio",
			"options" => array(
				'facebook' => 'Use Facebook Comments',
				'wordpress' => 'Use WordPress Comments',
				'none' => 'None'
			));	

/* Settings - Social Media */	
$options[] = array( "name" => __('Settings - Social Media','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('Social Media Link - RSS','framework_localize'),
			"desc" => __('Whether or not to use the icon to your RSS feed.','framework_localize'),
			"id" => $shortname."_social_rss_link",
			"std" => "true",
			"type" => "radio",
			"options" => array(
				'true' => 'Use RSS Link',
				'false' => 'Do Not Use RSS Link'
			));
			
$options[] = array( "name" => __('Social Media Link - Facebook','framework_localize'),
			"desc" => __('The link to your Facebook page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_facebook_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - Flickr','framework_localize'),
			"desc" => __('The link to your Twitter page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_flickr_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - Google Plus','framework_localize'),
			"desc" => __('The link to your Twitter page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_google_plus_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - Instagram','framework_localize'),
			"desc" => __('The link to your Instagram page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_instagram_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - LinkedIn','framework_localize'),
			"desc" => __('The link to your LinkedIn page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_linkedin_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - Pinterest','framework_localize'),
			"desc" => __('The link to your Pinterest page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_pinterest_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - Twitter','framework_localize'),
			"desc" => __('The link to your Twitter page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_twitter_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - Vimeo','framework_localize'),
			"desc" => __('The link to your Vimeo page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_vimeo_link",
			"std" => "http://",
			"type" => "text");
			
$options[] = array( "name" => __('Social Media Link - Youtube','framework_localize'),
			"desc" => __('The link to your Youtube page.  (Must start with http://)','framework_localize'),
			"id" => $shortname."_social_youtube_link",
			"std" => "http://",
			"type" => "text");
			
			
/* Design - General */	
$options[] = array( "name" => __('Design - General','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('Website Logo','framework_localize'),
			"desc" => __('Upload a custom logo for your Website.','framework_localize'),
			"id" => $shortname."_general_logo",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Website Logo Position','framework_localize'),
			"desc" => __('Use the arrows on the home page slideshow.','framework_localize'),
			"id" => $shortname."_general_logo_position",
			"std" => "center",
			"type" => "radio",
			"options" => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right',
			));
			
$options[] = array( "name" => __('Website Footer Logo','framework_localize'),
			"desc" => __('Upload a custom logo in your footer.','framework_localize'),
			"id" => $shortname."_general_footer_logo",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Sidebar Position','framework_localize'),
			"desc" => __('Select where you want the sidebar to be on the right or left.','framework_localize'),
			"id" => $shortname."_general_sidebar_position",
			"std" => "right",
			"type" => "radio",
			"options" => array(
				'right' => 'Right',
				'left' => 'Left'
			));
			
$options[] = array( "name" => __('Sidebar Width','framework_localize'),
			"desc" => __('The width of your home page slideshow.','framework_localize'),
			"id" => $shortname."_general_sidebar_width",
			"std" => "225",
			"type" => "text");
			
$options[] = array( "name" => __('Navigation Spacing','framework_localize'),
			"desc" => __('The amount of space between your navigation buttons.','framework_localize'),
			"id" => $shortname."_general_navigation_spacing",
			"std" => "100",
			"type" => "text");
			
$options[] = array( "name" => __('Home Page Slideshow Width','framework_localize'),
			"desc" => __('The width of your home page slideshow.','framework_localize'),
			"id" => $shortname."_general_banner_width",
			"std" => "535",
			"type" => "text");
			
$options[] = array( "name" => __('Home Page Slideshow Height','framework_localize'),
			"desc" => __('The height of your home page slideshow.','framework_localize'),
			"id" => $shortname."_general_banner_height",
			"std" => "375",
			"type" => "text");
			
$options[] = array( "name" => __('Home Page Slideshow Arrows','framework_localize'),
			"desc" => __('Use the arrows on the home page slideshow.','framework_localize'),
			"id" => $shortname."_general_banner_arrows",
			"std" => "on",
			"type" => "radio",
			"options" => array(
				'on' => 'On',
				'off' => 'Off',
			));
			
$options[] = array( "name" => __('Home Page Slideshow Speed (in seconds)','framework_localize'),
			"desc" => __('The amount of seconds each image shows in the slideshow.','framework_localize'),
			"id" => $shortname."_general_banner_timeout",
			"std" => "4",
			"type" => "text");

$options[] = array( "name" => __('Home Page Slideshow Transition Effect','framework_localize'),
			"desc" => __('This is the effect that happens inbetween images.','framework_localize'),
			"id" => $shortname."_general_banner_effect",
			"std" => "fade",
			"type" => "radio",
			"options" => array(
				'fade' => 'Fade',
				'scrollUp' => 'Scroll Up',
				'scrollDown' => 'Scroll Down',
				'scrollLeft' => 'Scroll Left',
				'scrollRight' => 'Scroll Right',
				'turnUp' => 'Turn Up',
				'turnDown' => 'Turn Down',
				'wipe' => 'Wipe'
				));
			
$options[] = array( "name" => __('Border Color','framework_localize'),
			"desc" => __('The color of the borders.','framework_localize'),
			"id" => $shortname."_general_border_color",
			"std" => "#d6d6d6",
			"type" => "color");
			
$options[] = array( "name" => __('Horse Page - Border Color','framework_localize'),
			"desc" => __('The color of the borders.','framework_localize'),
			"id" => $shortname."_general_border_color_horse_page",
			"std" => "#262626",
			"type" => "color");
			
			
/* Design - Backgrounds */	
$options[] = array( "name" => __('Design - Backgrounds','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('Header Background','framework_localize'),
			"desc" => __('Upload a custom header background.  This will override the default header background.','framework_localize'),
			"id" => $shortname."_bg_image_header",
			"std" => get_bloginfo('template_url')."/images/admin_default_header_bg.png",
			"type" => "upload");
			
$options[] = array( "name" => __('Body Background','framework_localize'),
			"desc" => __('Upload a custom body background.  This will override the default body background.','framework_localize'),
			"id" => $shortname."_bg_image_body",
			"std" => get_bloginfo('template_url')."/images/admin_default_bg.png",
			"type" => "upload");
			
$options[] = array( "name" => __('Navigation Gradient Top Color','framework_localize'),
			"desc" => __('Upload a custom header background.  This will override the default header background.','framework_localize'),
			"id" => $shortname."_bg_color_nav_top",
			"std" => "#313131",
			"type" => "color");
			
$options[] = array( "name" => __('Navigation Gradient Bottom Color','framework_localize'),
			"desc" => __('Upload a custom header background.  This will override the default header background.','framework_localize'),
			"id" => $shortname."_bg_color_nav_bottom",
			"std" => "#050505",
			"type" => "color");
			
$options[] = array( "name" => __('Content Background Color','framework_localize'),
			"desc" => __('The background color behind the content.','framework_localize'),
			"id" => $shortname."_bg_color_content",
			"std" => "#ffffff",
			"type" => "color");
			
$options[] = array( "name" => __('Contact Page - Form Background Color','framework_localize'),
			"desc" => __('The background color behind the contact form navigation.','framework_localize'),
			"id" => $shortname."_bg_color_contact_form",
			"std" => "#ebeadf",
			"type" => "color");
			
$options[] = array( "name" => __('Horse List Page - Horse Name Background Color','framework_localize'),
			"desc" => __('The background color behind the contact form navigation.','framework_localize'),
			"id" => $shortname."_bg_color_horse_list_title",
			"std" => "#ededed",
			"type" => "color");
			
$options[] = array( "name" => __('Horse Page - Photo Gallery Background Color','framework_localize'),
			"desc" => __('The background color behind the contact form navigation.','framework_localize'),
			"id" => $shortname."_bg_color_horse_gallery",
			"std" => "#0c0c0c",
			"type" => "color");
		
$options[] = array( "name" => __('Horse Page - Video Background Color','framework_localize'),
			"desc" => __('The background color behind the contact form navigation.','framework_localize'),
			"id" => $shortname."_bg_color_horse_video",
			"std" => "#121212",
			"type" => "color");
			
$options[] = array( "name" => __('Horse Page - Pedigree Background Color','framework_localize'),
			"desc" => __('The background color behind the contact form navigation.','framework_localize'),
			"id" => $shortname."_bg_color_horse_pedigree",
			"std" => "#ffffff",
			"type" => "color");
			
$options[] = array( "name" => __('Horse Page - Pedigree Block1 Background Color','framework_localize'),
			"desc" => __('The background color behind the contact form navigation.','framework_localize'),
			"id" => $shortname."_bg_color_horse_pedigree_block1",
			"std" => "#d1d3d4",
			"type" => "color");
			
$options[] = array( "name" => __('Horse Page - Pedigree Block2 Background Color','framework_localize'),
			"desc" => __('The background color behind the contact form navigation.','framework_localize'),
			"id" => $shortname."_bg_color_horse_pedigree_block2",
			"std" => "#e6e7e8",
			"type" => "color");
			
$options[] = array( "name" => __('Footer Navigation Background Color','framework_localize'),
			"desc" => __('The background color behind the footer navigation.','framework_localize'),
			"id" => $shortname."_bg_color_footer_nav",
			"std" => "#ebeadf",
			"type" => "color");
			
			
/* Design - Fonts */	
$options[] = array( "name" => __('Design - Fonts','framework_localize'),
			"type" => "heading");

$options[] = array( "name" => __('Navigation Font Color','framework_localize'),
			"desc" => __('The color of your navigation text.','framework_localize'),
			"id" => $shortname."_font_navigation_color",
			"std" => "#f8f8f8",
			"type" => "color");
			
$options[] = array( "name" => __('Navigation Hover Font Color','framework_localize'),
			"desc" => __('The color of your navigation text when hovering over it.','framework_localize'),
			"id" => $shortname."_font_navigation_color_hover",
			"std" => "#a7a273",
			"type" => "color");
			
$options[] = array( "name" => __('Navigation Font Size','framework_localize'),
			"desc" => __('The size of your navigation text.','framework_localize'),
			"id" => $shortname."_font_navigation_size",
			"std" => "14",
			"type" => "text");
			
$options[] = array( "name" => __('Heading Font Color','framework_localize'),
			"desc" => __('The color of your heading text.','framework_localize'),
			"id" => $shortname."_font_heading_color",
			"std" => "#a7a273",
			"type" => "color");
			
$options[] = array( "name" => __('Heading Font Size','framework_localize'),
			"desc" => __('The size of your heading text.','framework_localize'),
			"id" => $shortname."_font_heading_size",
			"std" => "27",
			"type" => "text");
			
$options[] = array( "name" => __('Date Font Color','framework_localize'),
			"desc" => __('The color of your heading text.','framework_localize'),
			"id" => $shortname."_font_date_color",
			"std" => "#7c7a7c",
			"type" => "color");
			
$options[] = array( "name" => __('Content Font Color','framework_localize'),
			"desc" => __('The color of your content text.','framework_localize'),
			"id" => $shortname."_font_content_color",
			"std" => "#333333",
			"type" => "color");
			
$options[] = array( "name" => __('Content Font Size','framework_localize'),
			"desc" => __('The size of your content text.','framework_localize'),
			"id" => $shortname."_font_content_size",
			"std" => "13",
			"type" => "text");
			
$options[] = array( "name" => __('Content Font Line Height','framework_localize'),
			"desc" => __('The space between lines of text.  Measured in "em".','framework_localize'),
			"id" => $shortname."_font_content_line_height",
			"std" => "1.35",
			"type" => "text");
			
$options[] = array( "name" => __('Font Link Color','framework_localize'),
			"desc" => __('The color of your links.','framework_localize'),
			"id" => $shortname."_font_link_color",
			"std" => "#a7a273",
			"type" => "color");
			
$options[] = array( "name" => __('Font Hover Color','framework_localize'),
			"desc" => __('The color of your links when you hover over them.','framework_localize'),
			"id" => $shortname."_font_hover_color",
			"std" => "#938e5a",
			"type" => "color");
			
$options[] = array( "name" => __('Horse Page - Pedigree Font Color','framework_localize'),
			"desc" => __('The color of your content text.','framework_localize'),
			"id" => $shortname."_font_horse_pedigree_color",
			"std" => "#222222",
			"type" => "color");
			
$options[] = array( "name" => __('Footer Navigation Font Color','framework_localize'),
			"desc" => __('The color of your footer navigation text.','framework_localize'),
			"id" => $shortname."_font_footer_nav_color",
			"std" => "#0b0b0b",
			"type" => "color");
			
			
/* Home Page - Header 
$options[] = array( "name" => __('Home Page - Header','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('Header Image 1 (958px by 385px)','framework_localize'),
			"desc" => __('Upload your header image here. (958px by 385px)','framework_localize'),
			"id" => $shortname."_header_image1",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Header Video 1','framework_localize'),
			"desc" => "Enter the embed URL of the video (click embed and copy the embed url, NOT the entire embed code).  It should look like: http://www.youtube.com/embed/78WkQPPSenc?wmode=transparent",
			"id" => $shortname."_header_video1",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Accordion Content 1','framework_localize'),
			"desc" => "Header content. (you can use html in here).  Images should be made 235px wide.",
			"id" => $shortname."_header_content1",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Header Image 2 (958px by 385px)','framework_localize'),
			"desc" => __('Upload your header image here. (958px by 385px)','framework_localize'),
			"id" => $shortname."_header_image2",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Header Video 2','framework_localize'),
			"desc" => "Enter the embed URL of the video (click embed and copy the embed url, NOT the entire embed code).  It should look like: http://www.youtube.com/embed/78WkQPPSenc?wmode=transparent",
			"id" => $shortname."_header_video2",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Accordion Content 2','framework_localize'),
			"desc" => "Header content. (you can use html in here) Images should be made 235px wide.",
			"id" => $shortname."_header_content2",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Header Image 3 (958px by 385px)','framework_localize'),
			"desc" => __('Upload your header image here. (958px by 385px)','framework_localize'),
			"id" => $shortname."_header_image3",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Header Video 3','framework_localize'),
			"desc" => "Enter the embed URL of the video (click embed and copy the embed url, NOT the entire embed code).  It should look like: http://www.youtube.com/embed/78WkQPPSenc?wmode=transparent",
			"id" => $shortname."_header_video3",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Accordion Content 3','framework_localize'),
			"desc" => "Header content. (you can use html in here). Images should be made 235px wide.",
			"id" => $shortname."_header_content3",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Header Image 4 (958px by 385px)','framework_localize'),
			"desc" => __('Upload your header image here. (958px by 385px)','framework_localize'),
			"id" => $shortname."_header_image4",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Header Video 4','framework_localize'),
			"desc" => "Enter the embed URL of the video (click embed and copy the embed url, NOT the entire embed code).  It should look like: http://www.youtube.com/embed/78WkQPPSenc?wmode=transparent",
			"id" => $shortname."_header_video4",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Accordion Content 4','framework_localize'),
			"desc" => "Header content. (you can use html in here).  Images should be made 235px wide.",
			"id" => $shortname."_header_content4",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Header Image 5 (958px by 385px)','framework_localize'),
			"desc" => __('Upload your header image here. (958px by 385px)','framework_localize'),
			"id" => $shortname."_header_image5",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Header Video 5','framework_localize'),
			"desc" => "Enter the embed URL of the video (click embed and copy the embed url, NOT the entire embed code).  It should look like: http://www.youtube.com/embed/78WkQPPSenc?wmode=transparent",
			"id" => $shortname."_header_video5",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Accordion Content 5','framework_localize'),
			"desc" => "Header content. (you can use html in here).  Images should be made 235px wide.",
			"id" => $shortname."_header_content5",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Header Image 6 (958px by 385px)','framework_localize'),
			"desc" => __('Upload your header image here. (958px by 385px)','framework_localize'),
			"id" => $shortname."_header_image6",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Header Video 6','framework_localize'),
			"desc" => "Enter the embed URL of the video (click embed and copy the embed url, NOT the entire embed code).  It should look like: http://www.youtube.com/embed/78WkQPPSenc?wmode=transparent",
			"id" => $shortname."_header_video6",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Accordion Content 6','framework_localize'),
			"desc" => "Header content. (you can use html in here). Images should be made 235px wide.",
			"id" => $shortname."_header_content6",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Header Image 7','framework_localize'),
			"desc" => __('Upload your header image here. (958px by 385px)','framework_localize'),
			"id" => $shortname."_header_image5",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Header Video 7','framework_localize'),
			"desc" => "Enter the embed URL of the video (click embed and copy the embed url, NOT the entire embed code).  It should look like: http://www.youtube.com/embed/78WkQPPSenc?wmode=transparent",
			"id" => $shortname."_header_video7",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Accordion Content 7','framework_localize'),
			"desc" => "Header content. (you can use html in here)",
			"id" => $shortname."_header_content5",
			"std" => "",
			"type" => "textarea");
			
			
		
/* Contact 
$options[] = array( "name" => __('Contact Options','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('Contact Image','framework_localize'),
			"desc" => __('This is the image that will show on your contact page.  Make it no wider than 473 pixels.','framework_localize'),
			"id" => $shortname."_contact_image",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Contact Block 1','framework_localize'),
			"desc" => "This is the text that will show next to the image on your contact page. (you can use html)",
			"id" => $shortname."_contact_block_1",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Contact Block 2','framework_localize'),
			"desc" => "This is the text that will show next to the image on your contact page. (you can use html)",
			"id" => $shortname."_contact_block_2",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Contact Block 3','framework_localize'),
			"desc" => "This is the text that will show next to the image on your contact page. (you can use html)",
			"id" => $shortname."_contact_block_3",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Contact Block 4','framework_localize'),
			"desc" => "This is the text that will show next to the image on your contact page. (you can use html)",
			"id" => $shortname."_contact_block_4",
			"std" => "",
			"type" => "textarea");


/* Option Page 2 - Sample Page 
$options[] = array( "name" => __('Sample Page','framework_localize'),
			"type" => "heading");
			

$options[] = array( "name" => __('Website Logo','framework_localize'),
			"desc" => __('Upload a custom logo for your Website.','framework_localize'),
			"id" => $shortname."_sitelogo",
			"std" => "",
			"type" => "upload");
			
			
$options[] = array( "name" => __('Favicon','framework_localize'),
			"desc" => __('Upload a 16px x 16px image that will represent your website\'s favicon.<br /><br /><em>To ensure cross-browser compatibility, we recommend converting the favicon into .ico format before uploading. (<a href="http://www.favicon.cc/">www.favicon.cc</a>)</em>','framework_localize'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "upload");
			
									   
$options[] = array( "name" => __('Tracking Code','framework_localize'),
			"desc" => __('Paste Google Analytics (or other) tracking code here.','framework_localize'),
			"id" => $shortname."_google_analytics",
			"std" => "",
			"type" => "textarea");

$options[] = array( "name" => __('Textarea','framework_localize'),
			"desc" => "This is a textarea.",
			"id" => $shortname."_sample_text_area",
			"std" => "",
			"type" => "textarea");
			

$options[] = array( "name" => __('Image Upload','framework_localize'),
			"desc" => __('This is an image upload field.','framework_localize'),
			"id" => $shortname."_sample_image_upload",
			"std" => "",
			"type" => "upload");
					
			
$options[] = array( "name" => __('Checkbox','framework_localize'),
			"desc" => __('This is a checkbox.','framework_localize'),
			"id" => $shortname."_sample_checkbox",
			"std" => "true",
			"type" => "checkbox");
			
			
$options[] = array( "name" => __('Dropdown List','framework_localize'),
			"desc" => __('This is a dropdown list.','framework_localize'),
			"id" => $shortname."_sample_dropdown",
			"std" => "1",
			"type" => "select",
			"options" => $sample_array);
			
			
$options[] = array( "name" => __('Radio Buttons','framework_localize'),
			"desc" => __('These are radio buttons.','framework_localize'),
			"id" => $shortname."_sample_radio",
			"std" => "1",
			"type" => "radio",
			"options" => array(
				'Red Radio' => 'Red',
				'Green Radio' => 'Green',
				'Blue Radio' => 'Blue'
				));
		
			
$options[] = array( "name" => __('Image Radio Buttons','framework_localize'),
			"desc" => __('Spice up your radio buttons by using custom images.','framework_localize'),
			"id" => $shortname."_sample_image_radio",
			"std" => "option1",
			"type" => "images",
			"options" => array(
				'option1' => $sampleurl . 'sample-layout-1.png',
				'option2' => $sampleurl . 'sample-layout-2.png',
				'option3' => $sampleurl . 'sample-layout-3.png'
				));
						
				
$options[] = array( "name" => __('Color Picker','framework_localize'),
			"desc" => __('This is a color picker.','framework_localize'),
			"id" => $shortname."_sample_color_picker",
			"std" => "",
			"type" => "color");	
					

$options[] = array( "name" => __('Wordpress Page','framework_localize'),
			"desc" => __('This displays a list of every page on your website.','framework_localize'),
			"id" => $shortname."_sample_wp_pages",
			"std" => "1",
			"type" => "select",
			"options" => $tt_pages);
			
			
$options[] = array( "name" => __('Wordpress Category','framework_localize'),
			"desc" => __('This displays a list of every category on your website.','framework_localize'),
			"id" => $shortname."_sample_wp_category",
			"std" => "1",
			"type" => "select",
			"options" => $tt_categories);
*/										
					


update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>