<?php
	get_header(); 
	
	// custom meta box info
	$meta_horse_info_year_foaled = 			get_post_meta($post->ID, 'meta_horse_info_year_foaled', true);
	$meta_horse_info_color = 				get_post_meta($post->ID, 'meta_horse_info_color', true);
	$meta_horse_video_embed_code =		get_post_meta($post->ID, 'meta_horse_video_embed_code', true);
?>
				
	<div id="content-horse" class="Content ContentNoMargin">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="PostHorseSingle" id="post-<?php the_ID(); ?>">
				
					<!-- HORSE INFO -->
					<div class="PaddingLeftRight">
						<?php  
						// need this to determine class of post right for width
						$args = array(
							'orderby'		=> 'menu_order',
							'order' 		=> 'ASC',
							'post_type'      	=> 'attachment',
							'post_parent'    	=> get_the_ID(),
							'post_mime_type' => 'image',
							'post_status'   	=> null,
							'numberposts'    	=> -1,
							'exclude'     	=> get_post_thumbnail_id()
						);
						$attachments = get_posts($args);    
						?>
						<div id="post-horse-right" class="<?php if (!$attachments) {echo "PostHorseRightFull";} ?>">
							<div id="post-horse-title-parents">
								<div id="post-horse-parents">
									<?php
									$meta_horse_pedigree = get_post_meta($post->ID,'meta_horse_pedigree',TRUE); 
									if ($meta_horse_pedigree[1] || $meta_horse_pedigree[2]) {
										echo $meta_horse_pedigree[1] . " x " . $meta_horse_pedigree[2];
									}
									?>
								</div>
								<div id="post-horse-title"><h2><?php the_title(); ?></h2></div>
								<div class="Clear"></div>
							</div>
							<div id="post-horse-info">
								<?php
								if ($meta_horse_info_year_foaled) {echo "<b>Year Foaled:</b> " . $meta_horse_info_year_foaled . "<br />";}
								if ($meta_horse_info_color) {echo "<b>Color:</b> " . $meta_horse_info_color;}
								?>
							</div>
							<div class="Entry">
								<?php the_content('Read more...'); ?>
								<div class="Clear"></div>
							</div> <!-- Entry -->
						</div>
						
						<div id="post-horse-left">
							<div id="post-horse-gallery-image-main">
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
										$src = wp_get_attachment_image_src( $attachment->ID, 'full'); 
								?>
										<img id="horse-gallery-image<?php echo $x; ?>" src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" />
								<?php 
									endforeach;
								endif; 
								?>
							</div>
						</div>
						
						<div class="Clear"></div>
						
						<div class="Spacer20"></div>
					</div>
					
					<!-- GALLERY IMAGES -->
					<?php  
					$args = array(
						'orderby'		=> 'menu_order',
						'order' 		=> 'ASC',
						'post_type'      	=> 'attachment',
						'post_parent'    	=> get_the_ID(),
						'post_mime_type' => 'image',
						'post_status'   	=> null,
						'numberposts'    	=> -1,
						'exclude'     	=> get_post_thumbnail_id()
					);
					$attachments = get_posts($args);    
					if ($attachments) {
					?>
					<div id="post-horse-gallery-images">
						<div id="post-horse-gallery-images-title"><h3>Photo Gallery</h3></div>
						<div class="PaddingLeftRight">
							<div id="post-horse-gallery-images-inner">
								<?php
									$x = 1;
									foreach ( $attachments as $attachment) {             
										$src = wp_get_attachment_image_src( $attachment->ID, 'full'); 
								?>
										<img id="horse-gallery-image<?php echo $x; ?>" src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" />
								<?php 
										$images_total_width = $images_total_width + 144;
										$x++;
									}
								?>
								<div class="Clear"></div>
							</div>
							
							<script>
								// center the photo gallery images if its on one line, otherwise dont center
								gallery_width = $('#post-horse-gallery-images-inner').width();
								if (<?php echo $images_total_width; ?> < gallery_width) {
									padding_left = (gallery_width - <?php echo $images_total_width; ?>) / 2;
									$('#post-horse-gallery-images-inner').css('padding-left', padding_left + 'px');
								}
								
								// replace the main image when a gallery image is clicked
								$('#post-horse-gallery-images-inner img').click(function() {
									clicked_img_src = $(this).attr('src');
									$('#post-horse-gallery-image-main img').attr('src', clicked_img_src);
								});
							</script>
							
						</div>
					</div>
					<?php 
					} 
					?>
					
					<!-- VIDEO -->
					<?php if ($meta_horse_video_embed_code) { ?>
						<div id="post-horse-video">
							<div class="PaddingLeftRight">
								<?php echo $meta_horse_video_embed_code; ?>
							</div>
							<div class="Clear"></div>
						</div>
					<?php } ?>
					
					<!-- PEDIGREE -->
					<?php 
					$meta_horse_pedigree = get_post_meta($post->ID,'meta_horse_pedigree',TRUE);
					if (!empty($meta_horse_pedigree)) {
					?>
						<div id="post-horse-pedigree">
							<div class="PaddingLeftRight">
								<h3>Pedigree</h3>
								<?php 
								if ($meta_horse_pedigree[1] || $meta_horse_pedigree[2]) {
									$pedigree_class = "Pedigree1Columns";
								}
								if ($meta_horse_pedigree[3] || $meta_horse_pedigree[4] || $meta_horse_pedigree[5] || $meta_horse_pedigree[6]) {
									$pedigree_class = "Pedigree2Columns";
								}
								if ($meta_horse_pedigree[7] || $meta_horse_pedigree[8] || $meta_horse_pedigree[9] || $meta_horse_pedigree[10]
								|| $meta_horse_pedigree[11] || $meta_horse_pedigree[12] || $meta_horse_pedigree[13] || $meta_horse_pedigree[14]) {
									$pedigree_class = "Pedigree3Columns";
								}
								if ($meta_horse_pedigree[15] || $meta_horse_pedigree[16] || $meta_horse_pedigree[17] || $meta_horse_pedigree[18]
								|| $meta_horse_pedigree[19] || $meta_horse_pedigree[20] || $meta_horse_pedigree[21] || $meta_horse_pedigree[22]
								|| $meta_horse_pedigree[23] || $meta_horse_pedigree[24] || $meta_horse_pedigree[25] || $meta_horse_pedigree[26]
								|| $meta_horse_pedigree[27] || $meta_horse_pedigree[28] || $meta_horse_pedigree[29] || $meta_horse_pedigree[30]) {
									$pedigree_class = "Pedigree4Columns";
								}
								?>
								<div id="post-horse-pedigree-graph" class="<?php echo $pedigree_class; ?>">
									<?php
									for ( $x=1; $x<=30; $x++){
										if ($x&1) {$OddOrEven = "HorsePedigreeOdd";} 
										else {$OddOrEven = "HorsePedigreeEven";}
										if ($meta_horse_pedigree[$x]) {
									?>
											<div id='horse-pedigree<?php echo $x; ?>' class="<?php echo $OddOrEven; ?>" title="<?php echo $meta_horse_pedigree[$x]; ?>">
												<h4><?php echo $meta_horse_pedigree[$x]; ?></h4>
											</div>
									<?php
										}
									} 
									?>
								</div>
								<div class="Clear"></div>
							</div>
						</div>
					<?php
					}
					?>
					
					<script>
						// verically center the pedigree names 
						<?php 
						$meta_horse_pedigree = get_post_meta($post->ID,'meta_horse_pedigree',TRUE);
						for ( $x=1; $x<=30; $x++){
						?>
							horse_pedigree_height = $('#horse-pedigree<?php echo $x; ?>').height();
							horse_pedigree_h4_height = $('#horse-pedigree<?php echo $x; ?> h4').height();
							horse_pedigree_h4_padding_top = (horse_pedigree_height - horse_pedigree_h4_height) / 2;
							$('#horse-pedigree<?php echo $x; ?> h4').css('padding-top', horse_pedigree_h4_padding_top + 'px');
						<?php 
						}
						?>
					</script>
					
					<div class="Clear"></div>
				</div> <!-- Post -->
			<?php endwhile; ?>
		<?php else : ?>
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that isn't here.</p>
		<?php endif; ?>
		<div class="Clear"></div>
		
	</div> <!-- .Content -->

<?php get_footer(); ?>
