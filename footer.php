<?php
	/* admin panel options */
	$admin_general_footer_logo = 	get_option('admin_general_footer_logo');
	$admin_general_footer_text = 	nl2br(get_option('admin_general_footer_text'));
	$admin_social_rss_link = 		get_option("admin_social_rss_link");
	$admin_social_facebook_link = 	get_option("admin_social_facebook_link");
	$admin_social_flickr_link = 		get_option("admin_social_flickr_link");
	$admin_social_google_plus_link = 	get_option("admin_social_google_plus_link");
	$admin_social_instagram_link = 	get_option("admin_social_instagram_link");
	$admin_social_linkedin_link = 		get_option("admin_social_linkedin_link");
	$admin_social_pinterest_link = 	get_option("admin_social_pinterest_link");
	$admin_social_twitter_link = 		get_option("admin_social_twitter_link");
	$admin_social_vimeo_link =	 	get_option("admin_social_vimeo_link");
	$admin_social_youtube_link =	get_option("admin_social_youtube_link");
?>

				<div class="Clear"></div>
				
				<div id="footer-container" class="<?php if ('horse_post' == get_post_type()) {echo "PaddingLeftRight";} ?>">
					<div id="footer-nav-container">
						<div id="footer-nav">
							<?php
							if ( function_exists('register_nav_menus') ) {
								$nav_arg = array (
									"theme_location" => "footer-menu",
									"echo" => false,
									"fallback_cb" => ""
								);
								$nav_markup = wp_nav_menu($nav_arg);
								$nav_markup = str_replace("<a>", '<a href="javascript:void(0);">', $nav_markup);
								print $nav_markup;
							}
							?>
							<div class="Clear"></div>
						</div>  <!-- footer-nav -->
					</div>  <!-- footer-nav-container -->
					
					<script type="text/javascript">
						// center the navigation
						bodyInnerWidth = 960;
						ulWidth = 0;
						ulPadding = 0;
						$("#footer-nav ul.menu > li").each(function(){
							ulWidth += $(this).outerWidth(true);
						});					
						ulPadding = (bodyInnerWidth - ulWidth) / 2;
						$("#footer-nav").css("padding-left", ulPadding + "px");
					</script>
					
					<div id="footer">
						<div id="social-icons">
							<!-- rss --> <?php if ($admin_social_rss_link) { ?> <a href="<?php bloginfo('rss2_url'); ?>" target="_blank" id="social-link-rss"></a> <?php } ?>
							<!-- facebook --> <?php if ($admin_social_facebook_link != "" && $admin_social_facebook_link != "http://") { ?> <a href="<?php echo $admin_social_facebook_link; ?>" target="_blank" id="social-link-facebook"></a> <?php } ?>
							<!-- flickr --> <?php if ($admin_social_flickr_link != "" && $admin_social_flickr_link != "http://") { ?> <a href="<?php echo $admin_social_flickr_link; ?>" target="_blank" id="social-link-flickr"></a> <?php } ?>
							<!-- google plus --> <?php if ($admin_social_google_plus_link != "" && $admin_social_google_plus_link != "http://") { ?> <a href="<?php echo $admin_social_google_plus_link; ?>" target="_blank" id="social-link-google-plus"></a> <?php } ?>
							<!-- instagram --> <?php if ($admin_social_instagram_link != "" && $admin_social_instagram_link != "http://") { ?> <a href="<?php echo $admin_social_instagram_link; ?>" target="_blank" id="social-link-instagram"></a> <?php } ?>
							<!-- linkedin --> <?php if ($admin_social_linkedin_link != "" && $admin_social_linkedin_link != "http://") { ?> <a href="<?php echo $admin_social_linkedin_link; ?>" target="_blank" id="social-link-linkedin"></a> <?php } ?>
							<!-- pinterest --> <?php if ($admin_social_pinterest_link != "" && $admin_social_pinterest_link != "http://") { ?> <a href="<?php echo $admin_social_pinterest_link; ?>" target="_blank" id="social-link-pinterest"></a> <?php } ?>
							<!-- twitter --> <?php if ($admin_social_twitter_link != "" && $admin_social_twitter_link != "http://") { ?> <a href="<?php echo $admin_social_twitter_link; ?>" target="_blank" id="social-link-twitter"></a> <?php } ?>
							<!-- vimeo --> <?php if ($admin_social_vimeo_link != "" && $admin_social_vimeo_link != "http://") { ?> <a href="<?php echo $admin_social_vimeo_link; ?>" target="_blank" id="social-link-vimeo"></a> <?php } ?>
							<!-- youtube --> <?php if ($admin_social_youtube_link != "" && $admin_social_youtube_link != "http://") { ?> <a href="<?php echo $admin_social_youtube_link; ?>" target="_blank" id="social-link-youtube"></a> <?php } ?>
							<div class="Clear"></div>
						</div>
						<div id="copyright">
							<?php echo $admin_general_footer_text; ?>
							<div class="Clear"></div>
							<a href="http://www.arabhorse.com/">Website by Knight Media Networks</a>
						</div>
						<div class="Clear"></div>
					</div>
				</div> <!-- footer-container -->
			
				</div> <!-- #content-container -->
			</div> <!-- wrapper -->
		</div> <!-- wrapper2 -->
		</div> <!-- wrapper3 -->
	</div> <!-- container -->

	<?php wp_footer(); ?>
</body>
</html>
