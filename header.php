<?php
	/* pro panel admin panel options */
	$admin_general_logo = 		get_option('admin_general_logo');
	$admin_general_favicon = 		get_option('admin_general_favicon');
	$admin_general_comments = 	get_option('admin_general_comments');
	$admin_general_google_analytics = 	get_option('admin_google_analytics');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<!-- Meta -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('', true, 'right'); ?></title>
	<link rel="icon" type="image/png" href="<?php echo $admin_general_favicon; ?>">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/style-options.php" type="text/css" media="all" />
	<!-- Javascript Files -->
	<script type='text/javascript' src='<?php echo bloginfo('template_url'); ?>/js/javascript.php'></script>
  <script type='text/javascript' src='<?php echo bloginfo('template_url'); ?>/js/jquery.colorbox-min.js'></script>
	<!-- WordPress Stuff -->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<!-- Google Analytics -->
	<?php echo $admin_general_google_analytics; ?>
</head>
<body <?php body_class(); ?>>

	<?php if ($admin_general_comments == "facebook") { ?>
		<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
	<?php } ?>

	<div id="header-background"></div>
	<div id="container">
		<div id="header-container">
			<div id="header">
				<div id="logo">
					<?php
            if (!empty($admin_general_logo)) {
          ?>

              <a href="<?php bloginfo('url') ?>"><img src="<?php echo $admin_general_logo ?>" alt="" /></a>

          <?php
            }
          ?>
				</div>  <!-- logo -->
				<div class="Clear"></div>
			</div>  <!-- header -->
		</div>  <!-- header-container -->

		<div id="wrapper3">
		<div id="wrapper2">
			<div id="wrapper">
				<div id="navigation-container">
					<div id="navigation">
						<?php
						if ( function_exists('register_nav_menus') ) {
							$nav_arg = array (
								"theme_location" => "header-menu",
								"echo" => false,
								"fallback_cb" => ""
							);
							$nav_markup = wp_nav_menu($nav_arg);
							$nav_markup = str_replace("<a>", '<a href="javascript:void(0);">', $nav_markup);
							print $nav_markup;
						}
						?>
						<div class="Clear"></div>
					</div>  <!-- navigation -->
				</div>  <!-- navigation-container -->
				<script type="text/javascript">
					// center the navigation
					center_nav();
					center_nav_after_fontface();
				</script>

				<div id="content-container">
