<?php
	get_header(); 
	
	// custom variables
	if (is_active_sidebar('sidebar')) {$use_sidebar = true;}
	else {$use_sidebar = false;}
?>

	<div id="content-blog" class="Content">

		<?php if ($use_sidebar) {get_sidebar();} ?>
			
		<?php if ($use_sidebar) {echo '<div id="content-small">';} ?>
			<div class="ArchiveTitle">
				<h2>
					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					<?php /* If this is a category archive */ if (is_category()) { ?>
					&#8216;<?php single_cat_title(); ?>&#8217; Category
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<?php the_time('F jS, Y'); ?>
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<?php the_time('F, Y'); ?>
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<?php the_time('Y'); ?>
					<?php /* If this is an author archive */ } elseif (is_author()) { ?>
					Author Archive
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					Blog Archives
					<?php } ?>
				</h2>
			</div>
		
			<?php get_template_part('template-part-post'); ?>
			<div class="Clear"></div>
		<?php if ($use_sidebar) {echo '</div>';} ?>
		
	</div> <!-- .Content -->

<?php get_footer(); ?>
