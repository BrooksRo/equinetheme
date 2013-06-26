<?php
	/* Template Name: Horse List */
	get_header();
?>
	
	<div id="content-horses" class="Content">
		<div class="Page">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="Post" id="post-<?php the_ID(); ?>">
					<div class="Entry">
						<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<div class="Clear"></div>
					</div> <!-- Entry -->
				</div> <!-- Post -->
			<?php endwhile; endif; ?>
		
			<?php
			$args = array(
				'post_type' => 'horse_post',
				'showposts' => $itdr_number_of_recent_posts_columns_num,
				'posts_per_page' => -1
			);
			query_posts($args); 
			$x = 1; 
			if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); 
			?>
				
					<div class="PostHorse PostHorseIndex <?php if ($x % 4 == 0) {echo "NoMargin";} ?>" id="post-<?php the_ID(); ?>">
						<div class="PostHorseMiniThumb">
							<a href="<?php the_permalink() ?>">
								<?php  
								$args = array(
									'orderby'		=> 'menu_order',
									'order' 		=> 'ASC',
									'post_type'      	=> 'attachment',
									'post_parent'    	=> get_the_ID(),
									'post_mime_type' => 'image',
									'post_status'   	=> null,
									'numberposts'    	=> 1,
									'exclude'     	=> get_post_thumbnail_id()
								);
								$attachments = get_posts($args);    

								if ($attachments) :
									foreach ( $attachments as $attachment) :                
										$thumbnail = wp_get_attachment_image_src( $attachment->ID, 'full'); 
								?>
										<img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
								<?php 
									endforeach;
								else : 
									$thumbnail[0] = get_bloginfo('template_url') . "/images/archive_horse_soon.jpg";
								?>
									<img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
								<?php
								endif; 
								?>
							</a>
						</div>
						<a class="PostHorseMiniBody" href="<?php the_permalink() ?>">
							<div class="PostHorseTitle"><h3><?php the_title(); ?></h3></div>
							<?php 
							$meta_horse_pedigree = get_post_meta($post->ID,'meta_horse_pedigree',TRUE);
							if (!empty($meta_horse_pedigree)) {
							?>
								<div class="PostHorseParents">
									<?php
									$meta_horse_pedigree = get_post_meta($post->ID,'meta_horse_pedigree',TRUE); 
									if ($meta_horse_pedigree[1] || $meta_horse_pedigree[2]) {
										echo $meta_horse_pedigree[1] . " x " . $meta_horse_pedigree[2];
									}
									?>
								</div>
							<?php
							}
							?>
							<div class="Clear"></div>
						</a>
						<div class="Clear"></div>
					</div> <!-- post -->
			
			<?php		
					if ($x % 4 == 0) {echo '<div class="Clear"></div><div class="Spacer20"></div><div class="Border"></div><div class="Spacer20"></div>';}
					$x++;
				endwhile;
			endif; 
			wp_reset_query();
			?>
		
		<div class="Clear"></div>
		</div> <!-- Page -->
	</div> <!-- .Content -->

<?php get_footer(); ?>