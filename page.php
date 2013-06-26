<?php
	get_header(); 
?>

	<div id="content-page" class="Content ContentPage">
	
		<div class="Page">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="Post" id="post-<?php the_ID(); ?>">
					<div class="PageTitle"><?php the_title(); ?></div>
					<div class="Entry">
						<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<div class="Clear"></div>
					</div> <!-- Entry -->
				</div> <!-- Post -->
			<?php endwhile; endif; ?>
		</div> <!-- Page -->
		
	</div> <!-- .Content -->

<?php get_footer(); ?>
