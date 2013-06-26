<?php
	get_header(); 
	
	// custom variables
	if (is_active_sidebar('sidebar')) {$use_sidebar = true;}
	else {$use_sidebar = false;}
?>

	<div id="content-blog" class="Content">

	<?php if ($use_sidebar) {get_sidebar();} ?>
	
		<?php if ($use_sidebar) {echo '<div id="content-small">';} ?>
			<?php get_template_part('template-part-post'); ?>
			<div class="Clear"></div>
		<?php if ($use_sidebar) {echo '</div>';} ?>
		
	</div> <!-- .Content -->

<?php get_footer(); ?>
