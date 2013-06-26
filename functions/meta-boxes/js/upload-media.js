
// Show image in meta box after thickbox window closed

jQuery(document).ready(function() {
	
	if( "function" === typeof(jQuery.fn.on) ) // WP >= 3.3
		jQuery(document.body).on("tb_unload", "#TB_window",refreshGalleryMetabox);
	else  // WP < 3.3
		jQuery('#TB_window').live("unload", refreshGalleryMetabox);
		
	function refreshGalleryMetabox() {
			if(jQuery('#my_attachments').parents('.postbox').is(":visible")){
				var post_id = jQuery("#post_ID").val();
				
				jQuery.ajax({
						type: 'POST',
						url: ajaxurl,
						dataType:'html',
						data: {
							action: 'refresh_metabox',
							post_id: post_id
						},
						success:function(res) {
						jQuery('#my_attachments').html(res);
					}
				});
			}				
	}
	
});