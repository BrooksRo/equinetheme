<?php

// inlcude the blog header + functions
require ("../../../../wp-load.php");

// pro panel admin panel options
$admin_general_banner_arrows = 			get_option('admin_general_banner_arrows');
$admin_general_banner_timeout = 			get_option('admin_general_banner_timeout');
$admin_general_banner_effect = 			get_option('admin_general_banner_effect');

// output the right mime type
header ("Content-type: text/javascript");

// include the theme js inline
readfile("./jquery-1.7.1.min.js");
print "\n\n";
readfile("./modernizr.custom.js");
print "\n\n";
readfile("./jquery.cycle.all.js");
print "\n\n";
readfile("./jquery.easing.1.3.js");
print "\n\n";
readfile("./jquery.autolink.js");
print "\n\n";
readfile("./jquery.timeago.js");
print "\n\n";
readfile("./jquery.tmpl.js");
print "\n\n";
readfile("./twitter-text.js");
print "\n\n";
readfile("./social.js");
print "\n\n";

?>

// HEADER
init_banner = function () {
	$('#banner').cycle({
	<?php if ( $admin_general_banner_arrows == "on" ) { ?>
		next: '#banner-arrow-right',
		prev: '#banner-arrow-left',
	<?php } ?>
		fx: '<?php echo $admin_general_banner_effect; ?>', 
		timeout: <?php echo $admin_general_banner_timeout * 1000; ?>, 
		pause:  1 
	});
};

// INPUT AND TEXTAREA ADD/REMOVE VALUE
$(document).ready(function() {
	$('input').not('.NoPlaceholderClear').focus(function() {
		placeholder_text = $(this).attr("rel");
		if ($(this).val() == placeholder_text) {
			$(this).val("");
		}
	});
	$('input').not('.NoPlaceholderClear').blur(function() {
		placeholder_text = $(this).attr("rel");
		if ($(this).val() == "" || $(this).val() == placeholder_text) {
			$(this).val(placeholder_text);
		}
	});
});
$(document).ready(function() {
	$('textarea').not('.NoPlaceholderClear').focus(function() {
		placeholder_text = $(this).attr("rel");
		if ($(this).val() == placeholder_text) {
			$(this).val("");
		}
	});
	$('textarea').not('.NoPlaceholderClear').blur(function() {
		placeholder_text = $(this).attr("rel");
		if ($(this).val() == "" || $(this).val() == placeholder_text) {
			$(this).val(placeholder_text);
		}
	});
});

function center_nav() {
	bodyInnerWidth = 960;
	ulWidth = 0;
	ulPadding = 0;
	$("#navigation ul.menu > li").each(function(){
		ulWidth += $(this).outerWidth(true);
	});					
	ulPadding = (bodyInnerWidth - ulWidth) / 2;
	$("#navigation").css("padding-left", ulPadding + "px");
}

function center_nav_after_fontface() {
	setTimeout(function(){
		center_nav();
	},450)
}

// SCROLL ANIMATION
function goToByScroll(id){
	$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}