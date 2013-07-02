<?php

/*-----------------------------------------------------------------------------------------*/
/*	Add metabox
/*-----------------------------------------------------------------------------------------*/
function add_meta_box_horse_pedigree() {
	add_meta_box('meta_box_horse_pedigree', 'Horse Pedigree', 'meta_box_horse_pedigree', 'horse_post', 'normal', 'high');
}
add_action('admin_init', 'add_meta_box_horse_pedigree');



/*-----------------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------------*/
function meta_box_horse_pedigree() {
	global $post;

	// get variables
	$meta_horse_pedigree = get_post_meta($post->ID,'meta_horse_pedigree',TRUE);
	if (!$meta_horse_pedigree)$meta_horse_pedigree = array(); // otherwise it creates an error when trying to call the syntax value

	// instead of writing HTML here, lets do an include
?>

	<div class="MetaBox">
		<div id="meta-horse-pedigree">
			<?php
			for ( $x=1; $x<=30; $x++){
				if ($x == 1) {echo '<div class="MetaHorsePedigreeColumn" id="meta-horse-pedigree-column1"><label>Generation 1</label>';}
				if ($x == 3) {echo '<div class="MetaHorsePedigreeColumn" id="meta-horse-pedigree-column2"><label>Generation 2</label>';}
				if ($x == 7) {echo '<div class="MetaHorsePedigreeColumn" id="meta-horse-pedigree-column3"><label>Generation 3</label>';}
				if ($x == 15) {echo '<div class="MetaHorsePedigreeColumn" id="meta-horse-pedigree-column4"><label>Generation 4</label>';}
			?>
        <p> <input type="text" name='meta_horse_pedigree[<?php echo $x; ?>]' value="<?php if ($meta_horse_pedigree[$x]) {echo htmlentities($meta_horse_pedigree[$x], ENT_QUOTES);} ?>" /> </p>
			<?php
				if ($x == 2) {echo '<div class="Clear"></div></div>';}
				if ($x == 6) {echo '<div class="Clear"></div></div>';}
				if ($x == 14) {echo '<div class="Clear"></div></div>';}
				if ($x == 30) {echo '<div class="Clear"></div></div>';}
			}
			?>
			<div class="Clear"></div>
		</div>
		<div class="Clear"></div>
	</div>

<?php
	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="meta_horse_pedigree_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}



/*-----------------------------------------------------------------------------------------*/
/*	Meta Save
/*-----------------------------------------------------------------------------------------*/
function meta_save_horse_pedigree($post_id) {
	/* authentication checks */
	// make sure data came from our meta box
	if (!wp_verify_nonce($_POST['meta_horse_pedigree_noncename'],__FILE__)) return $post_id;

	// check user permissions
	if ($_POST['post_type'] == 'horses') {
		if (!current_user_can('edit_post', $post_id)) return $post_id;
	}
	else {
		if (!current_user_can('edit_post', $post_id)) return $post_id;
	}

	/* authentication passed, save data */
	// meta data
	$current_data14 = get_post_meta($post_id, 'meta_horse_pedigree', TRUE);
	$new_data14 = $_POST['meta_horse_pedigree'];

	if ($new_data14) {
		my_meta_clean($new_data14);
		if ($current_data14) { update_post_meta($post_id,'meta_horse_pedigree',$new_data14); }
		elseif (!is_null($new_data14)) { add_post_meta($post_id,'meta_horse_pedigree',$new_data14,TRUE); }
	}

	return $post_id;
}
add_action('save_post','meta_save_horse_pedigree');

?>
