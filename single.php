<?php
	get_header(); 
	
	/* pro panel admin panel options */
	$admin_general_comments = get_option('admin_general_comments');
	
	/* custom variables */
	if (is_active_sidebar(1)) {$use_sidebar = true;}
	else {$use_sidebar = false;}
?>

	<div id="content-blog" class="Content">
	
		<?php if ($use_sidebar) {get_sidebar();} ?>
		
		<?php if ($use_sidebar) {echo '<div id="content-small">';} ?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="Post PostIndex" id="post-<?php the_ID(); ?>">
						<div class="PostTitle"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php $itdr_permanent_link_to . " " . the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
						<div class="PostDate">
							<?php the_time('F j, Y'); ?>
							<?php 
							if ($admin_general_comments != "none") :
								if ($admin_general_comments == "facebook") {
									$comment_total = fb_comment_count(get_permalink()); 
								} elseif ($admin_general_comments == "wordpress") {
									$comment_total = get_comments_number();
								}
								if ($comment_total > 0) :;
							?>
								&nbsp;&nbsp;|&nbsp;&nbsp;
								<a class="PostMetaComments" href="<?php the_permalink(); ?>/#comments">
									<?php echo $comment_total; ?>&nbsp;Comments
								</a>
							<?php 
								endif;
							endif;
							?>
						</div>
						<div class="Entry"> 
							<?php the_content(); ?> 
							<div class="Clear"></div>
						</div>
						<?php comments_template(); ?>
						<div class="Clear"></div>
					</div> <!-- post -->
				<?php endwhile; ?>
				
				<div class="EntryNavigation">
					<div class="Right"><?php next_post_link('%link', 'Next Entry &raquo;'); ?></div>
					<div class="Left"><?php previous_post_link('%link', '&laquo; Previous Entry'); ?></div>
					<div class="Clear"></div>
				</div>
				
			<?php else : ?>
				<h2>Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
			<?php endif; ?>
		
			<div class="Clear"></div>
		<?php if ($use_sidebar) {echo '</div>';} ?>
		
		<div class="Clear"></div>
	</div> <!-- .Content -->

<?php get_footer(); ?>
