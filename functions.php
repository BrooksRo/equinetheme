<?php

/*-----------------------------------------------------------------------------------*/
/*	Display Admin Notices
/*-----------------------------------------------------------------------------------
function my_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'post.php' ) {
         echo '<div class="updated">
             <p>This notice only appears on the plugins page.' .$pagenow .'</p>
         </div>';
    }
}
add_action('admin_notices', 'my_admin_notice');
*/

/*-----------------------------------------------------------------------------------*/
/*	Include ProPanel Admin Panel
/*-----------------------------------------------------------------------------------*/
require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');


/*-----------------------------------------------------------------------------------*/
/*	Custom Meta Boxes
/*-----------------------------------------------------------------------------------*/
/* add javascript and css to metaboxes */
function my_meta_init() {
	wp_enqueue_style('meta-css', get_template_directory_uri() . '/functions/meta-boxes/css/meta.css');
}
add_action('admin_init','my_meta_init');

/* include meta boxes */
global $pagenow;
if ( $pagenow == 'post.php' ) {
	include("functions/meta-boxes/meta-functions.php");
	include("functions/meta-boxes/meta-contact-info.php");
	include("functions/meta-boxes/meta-home-gallery.php");
	include("functions/meta-boxes/meta-home-info.php");
	include("functions/meta-boxes/meta-home-intro.php");
	include("functions/meta-boxes/meta-horse-info.php");
	include("functions/meta-boxes/meta-horse-pedigree.php");
	include("functions/meta-boxes/meta-horse-video.php");
	include("functions/meta-boxes/meta-horse-gallery.php");
}


/*-----------------------------------------------------------------------------------*/
/*	Get first image in post
/*-----------------------------------------------------------------------------------*/
function get_first_image_in_post() {
	global $post, $posts;
	$first_img = '';
	$post_content = $post->post_content;
	$post_content = do_shortcode($post_content);
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
	$output_height = preg_match_all('/<img.+height=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches_height);
	$output_width = preg_match_all('/<img.+width=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches_width);
	$first_img = $matches [1] [0];
	$first_img_height = $matches_height [1] [0];
	$first_img_width = $matches_width [1] [0];
	return array('source' => $first_img, 'height' => $first_img_height, 'width' => $first_img_width);
}


/*-----------------------------------------------------------------------------------*/
/*	Facebook comments counter
/*-----------------------------------------------------------------------------------*/
function getRemotePage ($url, $arr=false) {
	$query = "";
	if (is_array($arr)) {
		foreach ($arr as $key => $value) {
			$value = urlencode($value);
			$query .= $query=="" ? $key . "=" . $value : "&" . $key . "=" . $value ;
		}
	}
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	if ($query!="") {
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
	}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);
	return $result;
}
function jsonDecode($json) {
	$comment = false;
	$out = '$x=';
	for ($i=0; $i<strlen($json); $i++) {
		if (!$comment) {
			if (($json[$i] == '{') || ($json[$i] == '['))       $out .= ' array(';
			else if (($json[$i] == '}') || ($json[$i] == ']'))   $out .= ')';
			else if ($json[$i] == ':')    $out .= '=>';
			else                         $out .= $json[$i];
		} else $out .= $json[$i];
		if ($json[$i] == '"' && $json[($i-1)]!="\\")    $comment = !$comment;
	}
	eval($out . ';');
	return $x;
}
function fb_comment_count($url) {
	$fb_graph_data = getRemotePage('https://graph.facebook.com/?ids=' . $url);
	if ($fb_graph_data===false) return 0;
	$fb_json_result = jsonDecode($fb_graph_data);
	$fb_url_data = array_shift($fb_json_result);
	$fb_comment_count = isset($fb_url_data["comments"]) ? $fb_url_data["comments"] : 0;
	return $fb_comment_count;
}


/*-----------------------------------------------------------------------------------*/
/*	Screen Options Meta Box Order and Hide/Show - Post, Custom Posts, Pages, Nav
/*-----------------------------------------------------------------------------------*/
function set_user_metaboxes($user_id=NULL) {

	/* Set Meta Boxes & Order For Horse Posts */
	// These are the metakeys we will need to update
	$meta_key['order'] = 'meta-box-order_horse_post';
	$meta_key['hidden'] = 'metaboxhidden_horse_post';

	// So this can be used without hooking into user_register
	if ( ! $user_id) $user_id = get_current_user_id();

	// Set the default order if it has not been set yet
	if ( ! get_user_meta( $user_id, $meta_key['order'], true) ) {
		$meta_value = array(
		    'side' => 'submitdiv,formatdiv,categorydiv,postimagediv,tagsdiv-post_tag',
		    'normal' => '',
		    'advanced' => 'postexcerpt,postcustom,commentstatusdiv,commentsdiv,trackbacksdiv,slugdiv,authordiv,revisionsdiv',
		);
		update_user_meta( $user_id, $meta_key['order'], $meta_value );
	}

	// Set the default hiddens if it has not been set yet
	if ( ! get_user_meta( $user_id, $meta_key['hidden'], true) ) {
		$meta_value = array('postexcerpt','postcustom','trackbacksdiv','commentstatusdiv','commentsdiv','slugdiv','authordiv','revisionsdiv');
		update_user_meta( $user_id, $meta_key['hidden'], $meta_value );
	}

	/* Set Meta Boxes & Order For Posts */
	// These are the metakeys we will need to update
	$meta_key['order'] = 'meta-box-order_post';
	$meta_key['hidden'] = 'metaboxhidden_post';

	// So this can be used without hooking into user_register
	if ( ! $user_id) $user_id = get_current_user_id();

	// Set the default order if it has not been set yet
	if ( ! get_user_meta( $user_id, $meta_key['order'], true) ) {
		$meta_value = array(
		    'side' => 'submitdiv,formatdiv,categorydiv,postimagediv,tagsdiv-post_tag',
		    'normal' => 'postexcerpt,postcustom,commentstatusdiv,commentsdiv,trackbacksdiv,slugdiv,authordiv,revisionsdiv',
		    'advanced' => '',
		);
		update_user_meta( $user_id, $meta_key['order'], $meta_value );
	}

	// Set the default hiddens if it has not been set yet
	if ( ! get_user_meta( $user_id, $meta_key['hidden'], true) ) {
		$meta_value = array('postexcerpt,postcustom','trackbacksdiv','commentstatusdiv','commentsdiv','slugdiv','authordiv','revisionsdiv');
		update_user_meta( $user_id, $meta_key['hidden'], $meta_value );
	}

	/* Set Meta Boxes & Order For Nav Menus Page */
	// These are the metakeys we will need to update
	$meta_key['order'] = 'meta-box-order_nav-menus';
	$meta_key['hidden'] = 'metaboxhidden_nav-menus';

	// So this can be used without hooking into user_register
	if ( ! $user_id) $user_id = get_current_user_id();

	// Set the default order if it has not been set yet
	if ( ! get_user_meta( $user_id, $meta_key['order'], true) ) {
		$meta_value = array(
		    'side' => 'nav-menu-theme-locations,add-custom-links,add-page,add-horse_taxonomy,add-horse_post,add-category,add-post,add-post_tag'
		);
		update_user_meta( $user_id, $meta_key['order'], $meta_value );
	}

	// Set the default hiddens if it has not been set yet
	if ( ! get_user_meta( $user_id, $meta_key['hidden'], true) ) {
		$meta_value = array('add-post','add-post_tag');
		update_user_meta( $user_id, $meta_key['hidden'], $meta_value );
	}
}

add_action('admin_init', 'set_user_metaboxes');


/*-----------------------------------------------------------------------------------*/
/*	Set Default Permalink Structure
/*-----------------------------------------------------------------------------------*/
function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );


/*-----------------------------------------------------------------------------------*/
/*	Posts per page for CPT (Custom Post Types)
/*-----------------------------------------------------------------------------------*/
function custom_posts_per_page($query)
{
    switch ( $query->query_vars['post_type'] )
    {
        case 'horse_post':
            $query->query_vars['posts_per_page'] = 999;
            break;

        default:
            break;
    }
    return $query;
}

if( !is_admin() )
{
    add_filter( 'pre_get_posts', 'custom_posts_per_page' );
}


/*-----------------------------------------------------------------------------------*/
/*	Remove Menus From WordPress Dashboard
/*-----------------------------------------------------------------------------------*/
require_once('functions/wp-admin-menu-classes.php');
add_action('admin_menu','my_admin_menu');
function my_admin_menu() {
	swap_admin_menu_sections('Pages','Posts');              	// Swap location of Posts Section with Pages Section
	swap_admin_menu_sections('Pages','Horses');           	// Swap location of Posts Section with Pages Section
	rename_admin_menu_section('Posts','News Posts');    	// Rename Media Section to "Photos & Video"
	remove_admin_menu_section('Links');
	remove_admin_menu_section('Media');
//	remove_admin_menu_section('plugins.php');
	remove_admin_menu_section('Users');
	remove_admin_menu_section('Tools');
	if (get_option('admin_general_comments') == "none" || 'admin_general_comments' == "facebook") {
		remove_admin_menu_section('edit-comments.php');
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types
/*-----------------------------------------------------------------------------------*/
function register_taxonomy_horse_category() {
	// create a new taxonomy
	register_taxonomy(
		'horse_taxonomy',
		'horse_post',
		array(
			'label' => 'Horse Categories',
			'rewrite' => array( 'slug' => 'horses' ),
			'query_var' => true,
			'public' => true,
			'hierarchical' => true,
			'has_archive' => true,
			'show_ui' => true,
			'show_in_nav_menus' => true
		)
	);
}
add_action( 'init', 'register_taxonomy_horse_category' );

function register_cpt_horse() {
	$labels = array(
	    'name' => _x( 'Horses', 'horse' ),
	    'singular_name' => _x( 'Horse', 'horse' ),
	    'add_new' => _x( 'Add New Horse', 'horse' ),
	    'add_new_item' => _x( 'Add New Horse', 'horse' ),
	    'edit_item' => _x( 'Edit Horse', 'horse' ),
	    'new_item' => _x( 'New Horse', 'horse' ),
	    'view_item' => _x( 'View Horse', 'horse' ),
	    'search_items' => _x( 'Search Horses', 'horse' ),
	    'not_found' => _x( 'No horse found', 'horse' ),
	    'not_found_in_trash' => _x( 'No horse found in Trash', 'horse' ),
	    'parent_item_colon' => _x( 'Parent Horse:', 'horse' ),
	    'menu_name' => _x( 'Horses', 'horse' ),
	);
	$args = array(
		'labels' => $labels,
		'menu_icon' => get_bloginfo('template_url') . '/images/admin_icon_menu_horse.png',
		'hierarchical' => false,
		'description' => 'The different horse selectors.',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'horse'),
		'capability_type' => 'post'
	);
	register_post_type( 'horse_post', $args );
}
add_action( 'init', 'register_cpt_horse' );



/*-----------------------------------------------------------------------------------*/
/*	Add styles to WordPress Editor

add_action( 'after_setup_theme', 'wpse3882_after_setup_theme' );
function wpse3882_after_setup_theme()
{
    add_editor_style();
}

add_filter('mce_buttons_2', 'wpse3882_mce_buttons_2');
function wpse3882_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('tiny_mce_before_init', 'wpse3882_tiny_mce_before_init');
function wpse3882_tiny_mce_before_init($settings)
{
    $settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4,h5,h6';

    // From http://tinymce.moxiecode.com/examples/example_24.php
    $style_formats = array(
        array('title' => 'Paragraph Text Large', 'inline' => 'span', 'classes' => 'ParagraphLarge'),
        array('title' => 'Paragraph Text Blue', 'inline' => 'span', 'classes' => 'Blue'),
    );
    // Before 3.1 you needed a special trick to send this array to the configuration.
    // See this post history for previous versions.
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Custom functions
/*-----------------------------------------------------------------------------------*/
/* Current page url */
function current_page_url() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

/* Get current wp user id */
function wpcustom_get_current_user_id(){
	global $current_user;
	get_currentuserinfo();
	return $current_user->ID;
}


/*-----------------------------------------------------------------------------------*/
/*	Add posts and comments rss feed in head
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/*	Thumbnails
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );


/*-----------------------------------------------------------------------------------*/
/*	Sidebar
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar of the news/blog page.',
	));
	register_sidebar(array(
		'name' => 'Home Intro Box1',
		'id' => 'home-intro-box1',
		'description' => 'Widgets in this area will be shown in the left home intro box.',
	));
	register_sidebar(array(
		'name' => 'Home Intro Box2',
		'id' => 'home-intro-box2',
		'description' => 'Widgets in this area will be shown in the middle home intro box.',
	));
	register_sidebar(array(
		'name' => 'Home Intro Box3',
		'id' => 'home-intro-box3',
		'description' => 'Widgets in this area will be shown in the right home intro box.',
	));
}


/*-----------------------------------------------------------------------------------*/
/*	Disable admin bar
/*-----------------------------------------------------------------------------------*/
// Hide WordPress Admin Bar
add_filter( 'show_admin_bar', '__return_false' );

add_action( 'admin_print_scripts-profile.php', 'hide_admin_bar_prefs' );
function hide_admin_bar_prefs() {
?>
<style type="text/css">
	.show-admin-bar { display: none; }
</style>
<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Menu
/*-----------------------------------------------------------------------------------*/
if ( function_exists('add_theme_support') ) {
	function register_my_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' )
			)
		);
	}
	add_action( 'init', 'register_my_menus' );
}


/*-----------------------------------------------------------------------------------*/
/*	Excerpt length & ending
/*-----------------------------------------------------------------------------------*/
function new_excerpt_length($length) {
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_ending( $more ) {
	global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_ending');


/*-----------------------------------------------------------------------------------*/
/*	Comments
/*-----------------------------------------------------------------------------------*/
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="CommentContainer" id="comment-<?php comment_ID() ?>">
			<div class="CommentAuthor"><?php printf(__('%s'), get_comment_author_link()) ?></div>
			<div class="CommentReply"><?php comment_reply_link(array_merge( $args, array('reply_text' => "reply" ,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
			<?php if ($comment->comment_approved == '0') : ?> <div class="CommentModeration"> <?php _e('awaiting moderation') ?> </div> <?php endif; ?>
			<div class="CommentText"> <?php comment_text() ?></div>
			<div class="Clear"></div>
		</div>
<?php
}
?>
