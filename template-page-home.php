<?php
	/* Template Name: Home */
	get_header();
	
	// pro panel admin panel options
	$admin_general_banner_arrows = 			get_option('admin_general_banner_arrows');
	
	// custom meta box info
	$meta_home_info_welcome_title = 		get_post_meta($post->ID, 'meta_home_info_welcome_title', true);
	$meta_home_info_welcome_link = 			get_post_meta($post->ID, 'meta_home_info_welcome_link', true);
	$meta_home_info_welcome_link_text = 		get_post_meta($post->ID, 'meta_home_info_welcome_link_text', true);
	for ( $i=1; $i<=3; $i++) {
		$meta_home_intro_title[$i] = 		get_post_meta($post->ID, 'meta_home_intro_title'.$i, true);
		$meta_home_intro_link[$i] = 		get_post_meta($post->ID, 'meta_home_intro_link'.$i, true);
		$meta_home_intro_image[$i] = 		get_post_meta($post->ID, 'meta_home_intro_image'.$i, true);
			$meta_home_intro_image[$i] = 		wp_get_attachment_image($meta_home_intro_image[$i], 'full');
		$meta_home_intro_content[$i] = 		get_post_meta($post->ID, 'meta_home_intro_content'.$i, true);
	}
?>

	<div id="content-home" class="Content">

		<div id="banner-container">
			<?php if ($admin_general_banner_arrows == "on") { ?>
				<div id="banner-arrow-right"></div>
				<div id="banner-arrow-left"></div>
			<?php } ?>
			<div id="banner">
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

				if ($attachments) :
					foreach ( $attachments as $attachment) :                
						$src = 			wp_get_attachment_image_src( $attachment->ID, 'full'); 
						$attachmenttitle = 	apply_filters('the_title', $attachment->post_title); 
						$attachmentcaption =  $attachment->post_excerpt;
				?>
						<img src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" />
				<?php 
					endforeach;
				endif; 
				?>
			</div> <!-- banner -->
		</div>
		
		<script>init_banner();</script>
		
		<div id="welcome">
			<div id="welcome-title">
				<?php echo $meta_home_info_welcome_title; ?>
			</div>
			<div id="welcome-content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="" id="post-<?php the_ID(); ?>">
						<div class="Entry">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; endif; ?>
			</div>
			<div id="welcome-link">
				<a class="Button" href="<?php echo $meta_home_info_welcome_link; ?>"/><?php echo $meta_home_info_welcome_link_text; ?></a>
			</div>
		</div>
		
		<div class="Clear"></div>
		
		<div class="Spacer20"></div>
		
		<?php $meta_home_intro = get_post_meta($post->ID,'meta_home_intro',TRUE); ?>
		
		<div id="intro-boxes-container">
			<div id="intro-boxes">
				
				<?php for ( $i=1; $i<=3; $i++) { ?>
					<div id="intro-box<?php echo $i; ?>" class="IntroBox">
					<?php
					if (is_active_sidebar("home-intro-box$i")) {
						echo '<div class="IntroBoxSidebar">';
							echo 	'<ul>';
								dynamic_sidebar( "home-intro-box$i" ); 
							echo 	'</ul>';
						echo 	'</div>';
					} else {
					?> 
						<?php if ($meta_home_intro_title[$i]) { ?>
							<?php if ($meta_home_intro_link[$i]) { ?> <a href="<?php echo $meta_home_intro_link[$i]; ?>"> <?php } ?>
								<h2 class="IntroBoxTitle"> <?php echo $meta_home_intro_title[$i]; ?> </h2>
							<?php if ($meta_home_intro_link[$i]) { ?> </a>	<?php } ?>
						<?php } ?>
						<?php if ($meta_home_intro_image[$i]) { ?>
							<?php if ($meta_home_intro_link[$i]) { ?> <a href="<?php echo $meta_home_intro_link[$i]; ?>"> <?php } ?>
								<?php echo $meta_home_intro_image[$i]; ?>
							<?php if ($meta_home_intro_link[$i]) { ?> </a>	<?php } ?>
						<?php } ?>
						<?php if ($meta_home_intro_content[$i]) { ?>
							<div class="IntroBoxContent"><?php echo $meta_home_intro_content[$i]; ?></div>
						<?php } ?>
					<?php } ?>
					</div>
					<script type="text/javascript">
						$('#intro-box<?php echo $i; ?> .IntroBoxSidebar .widget:gt(0)').hide();
					</script>
				<?php } ?>
				<div class="Clear"></div>
			</div>
			
			
		 </div>
		 
	</div> <!-- .Content -->
		
<?php get_footer(); ?>