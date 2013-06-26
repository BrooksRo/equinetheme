<?php $x = 1; ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
		<div class="PostHorseIndex <?php if ($x % 4 == 0) {echo "NoMargin";} ?>" id="post-<?php the_ID(); ?>">
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
		
		<?php $x++; ?>
	<?php endwhile; ?>
<?php endif; ?>