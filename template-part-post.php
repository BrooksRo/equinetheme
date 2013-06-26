<?php 
	/* pro panel admin panel options */
	$admin_general_comments = get_option('admin_general_comments');
?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="Post PostIndex" id="post-<?php the_ID(); ?>">
			<div class="PostMiniThumb">
				<?php
				$thumbnail = 					wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (!empty($thumbnail)) {  
					$thumbnail_url = 				$thumbnail[0]; 
					$thumbnail_width = 			$thumbnail[1]; 
					$thumbnail_height = 			$thumbnail[2]; 
				} 
				// find the first image actual url, height, width, etc
				else  {
					$thumbnail = 				get_first_image_in_post();
					$thumbnail_url = 				$thumbnail['source'];
					$thumbnail_width = 			$thumbnail['width'];
					$thumbnail_height = 			$thumbnail['height'];
				}
				?>
				<a href="<?php the_permalink() ?>">
					<img class="LatestPostImage" src="<?php echo $thumbnail_url; ?>" width="280" height="<?php echo round($thumbnail_height/$thumbnail_width * 228); ?>" />
				</a>
			</div>
			<div class="PostMiniBody">
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
					<?php the_excerpt(); ?> 
					<div class="Clear"></div>
				</div>
				<a class="Button" href="<?php the_permalink() ?>">Read More</a>
				<div class="Clear"></div>
			</div>
			<div class="Clear"></div>
			<div class="Spacer20"></div>
		</div> <!-- post -->
	<?php endwhile; ?>
	
	<div class="EntryNavigation">
		<div class="Right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		<div class="Left"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="Clear"></div>
	</div>

<?php else : ?>
	<h2>Not Found</h2>
	<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
<div class="Clear"></div>