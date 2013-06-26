<?php

// inlcude the blog header + functions
require ("../../../wp-load.php");

// pro panel admin panel options
$admin_general_body_width =			930;
$admin_general_logo_position =			get_option('admin_general_logo_position');
  if (empty($admin_general_logo_position)) $admin_general_logo_position = 'center';
$admin_general_sidebar_position = 		get_option('admin_general_sidebar_position');
  if (empty($admin_general_sidebar_position)) $admin_general_sidebar_position = 'right';
$admin_general_sidebar_width = 			get_option('admin_general_sidebar_width');
  if (empty($admin_general_sidebar_width)) $admin_general_sidebar_width = '225';
$admin_general_navigation_spacing = 		get_option('admin_general_navigation_spacing');
  if (empty($admin_general_navigation_spacing)) $admin_general_navigation_spacing = '100';
$admin_general_banner_width = 			get_option('admin_general_banner_width');
  if (empty($admin_general_banner_width)) $admin_general_banner_width = '535';
$admin_general_banner_height = 			get_option('admin_general_banner_height');
  if (empty($admin_general_banner_height)) $admin_general_banner_height = '375';
$admin_general_border_color = 			get_option('admin_general_border_color');
  if (empty($admin_general_border_color)) $admin_general_border_color = '#d6d6d6';
$admin_general_border_color_horse_page = 	get_option('admin_general_border_color_horse_page');
  if (empty($admin_general_border_color_horse_page)) $admin_general_border_color_horse_page = '#262626';
$admin_bg_image_header = 				get_option('admin_bg_image_header');
  if (empty($admin_bg_image_header)) $admin_bg_image_header = 'images/admin_default_header_bg.png';
$admin_bg_image_body = 				get_option('admin_bg_image_body');
  if (empty($admin_bg_image_body)) $admin_bg_image_body = 'images/admin_default_bg.png';
$admin_bg_color_nav_top = 				get_option('admin_bg_color_nav_top');
  if (empty($admin_bg_color_nav_top)) $admin_bg_color_nav_top = '#313131';
$admin_bg_color_nav_bottom = 			get_option('admin_bg_color_nav_bottom');
  if (empty($admin_bg_color_nav_bottom)) $admin_bg_color_nav_bottom = '#050505';
$admin_bg_color_content = 				get_option('admin_bg_color_content');
  if (empty($admin_bg_color_content)) $admin_bg_color_content = '#fff';
$admin_bg_color_contact_form = 			get_option('admin_bg_color_contact_form');
  if (empty($admin_bg_color_contact_form)) $admin_bg_color_contact_form = '#ebeadf';
$admin_bg_color_horse_list_title = 		get_option('admin_bg_color_horse_list_title');
  if (empty($admin_bg_color_horse_list_title)) $admin_bg_color_horse_list_title = '#ededed';
$admin_bg_color_horse_gallery = 			get_option('admin_bg_color_horse_gallery');
  if (empty($admin_bg_color_horse_gallery)) $admin_bg_color_horse_gallery = '#0c0c0c';
$admin_bg_color_horse_video = 			get_option('admin_bg_color_horse_video');
  if (empty($admin_bg_color_horse_video)) $admin_bg_color_horse_video = '#121212';
$admin_bg_color_horse_pedigree = 		get_option('admin_bg_color_horse_pedigree');
  if (empty($admin_bg_color_horse_pedigree)) $admin_bg_color_horse_pedigree = '#fff';
$admin_bg_color_horse_pedigree_block1 = 	get_option('admin_bg_color_horse_pedigree_block1');
  if (empty($admin_bg_color_horse_pedigree_block1)) $admin_bg_color_horse_pedigree_block1 = '#d1d3d4';
$admin_bg_color_horse_pedigree_block2 = 	get_option('admin_bg_color_horse_pedigree_block2');
  if (empty($admin_bg_color_horse_pedigree_block2)) $admin_bg_color_horse_pedigree_block2 = '#e6e7e8';
$admin_bg_color_footer_nav = 			get_option('admin_bg_color_footer_nav');
  if (empty($admin_bg_color_footer_nav)) $admin_bg_color_footer_nav = '#ebeadf';
$admin_font_navigation_color = 			get_option('admin_font_navigation_color');
  if (empty($admin_font_navigation_color)) $admin_font_navigation_color = '#f8f8f8';
$admin_font_navigation_color_hover = 		get_option('admin_font_navigation_color_hover');
  if (empty($admin_font_navigation_color_hover)) $admin_font_navigation_color_hover = '#a7a273';
$admin_font_navigation_size = 			get_option('admin_font_navigation_size');
  if (empty($admin_font_navigation_size)) $admin_font_navigation_size = '14';
$admin_font_heading_color = 			get_option('admin_font_heading_color');
  if (empty($admin_font_heading_color)) $admin_font_heading_color = '#a7a273';
$admin_font_heading_size = 				get_option('admin_font_heading_size');
  if (empty($admin_font_heading_size)) $admin_font_heading_size = '27';
$admin_font_date_color = 				get_option('admin_font_date_color');
  if (empty($admin_font_date_color)) $admin_font_date_color = '#7c7a7c';
$admin_font_content_color = 			get_option('admin_font_content_color');
  if (empty($admin_font_content_color)) $admin_font_content_color = '#333';
$admin_font_content_size = 				get_option('admin_font_content_size');
  if (empty($admin_font_content_size)) $admin_font_content_size = '13';
$admin_font_content_line_height = 		get_option('admin_font_content_line_height');
  if (empty($admin_font_content_line_height)) $admin_font_content_line_height = '1.35';
$admin_font_link_color = 				get_option('admin_font_link_color');
  if (empty($admin_font_link_color)) $admin_font_link_color = '#a7a273';
$admin_font_hover_color = 				get_option('admin_font_hover_color');
  if (empty($admin_font_hover_color)) $admin_font_hover_color = '#938e5a';
$admin_font_horse_pedigree_color= 		get_option('admin_font_horse_pedigree_color');
  if (empty($admin_font_horse_pedigree_color)) $admin_font_horse_pedigree_color = '#222';
$admin_font_footer_nav_color = 			get_option('admin_font_footer_nav_color');
  if (empty($admin_font_footer_nav_color)) $admin_font_footer_nav_color = '#0b0b0b';
// custom variables
if (is_active_sidebar(1)) {$use_sidebar = true;}
else {$use_sidebar = false;}

// output the right mime type
header ("Content-type: text/css");

?>

/************************************************************************
#  FONTFACE
*************************************************************************/
@font-face {
    font-family: 'source_sans_regular_italic';
    src: url('fontface/sourcesanspro-italic-webfont.eot');
    src: url('fontface/sourcesanspro-italic-webfont.eot?#iefix') format('embedded-opentype'),
         url('fontface/sourcesanspro-italic-webfont.woff') format('woff'),
         url('fontface/sourcesanspro-italic-webfont.ttf') format('truetype'),
         url('fontface/sourcesanspro-italic-webfont.svg#source_sans_proitalic') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'source_sans_regular';
    src: url('fontface/sourcesanspro-regular-webfont.eot');
    src: url('fontface/sourcesanspro-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('fontface/sourcesanspro-regular-webfont.woff') format('woff'),
         url('fontface/sourcesanspro-regular-webfont.ttf') format('truetype'),
         url('fontface/sourcesanspro-regular-webfont.svg#source_sans_proregular') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'source_sans_semibold';
    src: url('fontface/sourcesanspro-semibold-webfont.eot');
    src: url('fontface/sourcesanspro-semibold-webfont.eot?#iefix') format('embedded-opentype'),
	 url('fontface/sourcesanspro-semibold-webfont.woff') format('woff'),
	 url('fontface/sourcesanspro-semibold-webfont.ttf') format('truetype'),
	 url('fontface/sourcesanspro-semibold-webfont.svg#source_sans_pro_semiboldRg') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'lustria_regular';
    src: url('fontface/lustria-regular-webfont.eot');
    src: url('fontface/lustria-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('fontface/lustria-regular-webfont.woff') format('woff'),
         url('fontface/lustria-regular-webfont.ttf') format('truetype'),
         url('fontface/lustria-regular-webfont.svg#lustriaregular') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'fanwood_textitalic';
    src: url('fontface/fanwood_text_italic-webfont.eot');
    src: url('fontface/fanwood_text_italic-webfont.eot?#iefix') format('embedded-opentype'),
         url('fontface/fanwood_text_italic-webfont.woff') format('woff'),
         url('fontface/fanwood_text_italic-webfont.ttf') format('truetype'),
         url('fontface/fanwood_text_italic-webfont.svg#fanwood_textitalic') format('svg');
    font-weight: normal;
    font-style: normal;
}
/************************************************************************
#  FONTFACE END
*************************************************************************/


/************************************************************************
#  GENERAL
*************************************************************************/
body, p, input, textarea, select, h1, h2, h3, h4, h5, h6{
	color: <?php echo $admin_font_content_color; ?>;
	font-size: <?php echo $admin_font_content_size; ?>px;
	font-family: arial, sans-serif;
	line-height: 1.35em;
}

body, p{
	line-height: <?php echo $admin_font_content_line_height; ?>;
}

h1{
	font-family: "lustria_regular";
	color: <?php echo $admin_font_heading_color; ?>;
	font-size: <?php echo $admin_font_heading_size + 1.1; ?>px;
}

h2{
	font-family: "lustria_regular";
	color: <?php echo $admin_font_heading_color; ?>;
	font-size: <?php echo $admin_font_heading_size; ?>px;
}

h3{
	font-family: "lustria_regular";
	color: <?php echo $admin_font_heading_color; ?>;
	font-size: <?php echo $admin_font_heading_size * .9; ?>px;
}

h4{
	font-family: "lustria_regular";
	color: <?php echo $admin_font_heading_color; ?>;
	font-size: <?php echo $admin_font_heading_size * .8; ?>px;
}

h5{
	font-family: "lustria_regular";
	color: <?php echo $admin_font_heading_color; ?>;
	font-size: <?php echo $admin_font_heading_size *.7; ?>px;
}

h6{
	font-family: "lustria_regular";
	color: <?php echo $admin_font_heading_color; ?>;
	font-size: <?php echo $admin_font_heading_size *.6; ?>px;
}

input,
textarea,
select{
	border:1px solid <?php echo $admin_general_border_color; ?>;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	padding:7px 14px;
	margin: 0 0 15px 0;
	background: #fff;
}

select{
	padding:14px 20px;
}

input:focus,
textareat:focus,
select:focus{
}

input.Submit{
	width: 150px !important;
}

input.Submit:hover{
	cursor: pointer;
}

a:link,
a:hover,
a:visited{
	color: <?php echo $admin_font_link_color; ?>;
	text-decoration:none;
}

a:hover{
	color: <?php echo $admin_font_hover_color; ?>;
}

ul, ol{
	margin:0 0 0 30px;
}

table{
	width:100%;
	border-spacing: 0;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	border-top:1px solid #cccfd1;
	border-bottom:1px solid #cccfd1;
	border-left:1px solid #cccfd1;
	color:#555;
	font-size:12px;
	font-family: arial;
	margin-bottom: 20px;
}
td, th{
	border-top:1px solid #cccfd1;
	border-right:1px solid #cccfd1;
}
	table tr th{
		font-family: "museo_sans_500regular", arial;
		color:#111;
		padding: 3px;
		border-top:1px solid #f1f1f1;
		border-bottom:1px solid #f1f1f1;
		background: #e8eaea;
	}
	table tr td {
		background:#fff;
	}
	table tr td{
		padding:3px;
	}
	table textarea{
		border: none;
		-webkit-border-radius: 0px;
		-moz-border-radius: 0px;
		border-radius: 0px;
		color:#555;
		padding: 0;
		margin: 0;
		font-size:12px;
		font-family: arial, sans-serif;
		background: transparent;
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;
		width:100%;
		height:300px;
	}
	table textarea:focus{
		background: transparent;
		border:none;
	}
	table span{
		background: #8EB691;
		color:#fff;
	}

/* Begin Images */
.Entry p img {
	padding: 0;
	max-width: 100%;
}

.Entry img.centered {
	display: block;
	margin-left: auto;
	margin-right: auto;
}

.Entry img.alignright {
	margin: 10px 0 2px 15px;
	display: inline;
}

.Entry img.alignleft {
	margin: 10px 15px 2px 0;
	display: inline;
}

.alignright {
	float: right;
}

.alignleft {
	float: left;
}

.aligncenter{
	display:block;
	margin:0 auto;
}
/* End Images */

.Spacer10{
	height: 10px;
}
.Spacer20{
	height: 20px;
}
.Spacer30{
	height: 30px;
}
.Spacer40{
	height: 40px;
}
.Spacer50{
	height: 50px;
}
.Spacer60{
	height: 50px;
}

.Button,
input.Submit{
	background-image: -ms-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* IE10 Consumer Preview */
	background-image: -moz-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* Mozilla Firefox */
	background-image: -o-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* Opera */
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php echo $admin_bg_color_nav_top; ?>), color-stop(1, <?php echo $admin_bg_color_nav_bottom; ?>));  /* Webkit (Safari/Chrome 10) */
	background-image: -webkit-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* Webkit (Chrome 11+) */
	background-image: linear-gradient(to bottom, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* W3C Markup, IE10 Release Preview */
	border: 1px solid <?php echo $admin_bg_color_nav_bottom; ?>;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	padding: 5px 18px;
	color: <?php echo $admin_font_navigation_color; ?> !important;
}
.Button:hover,
input.Submit:hover{
	color: <?php echo $admin_font_navigation_color_hover; ?> !important;
}

.Border{
	border-bottom:1px solid <?php echo $admin_general_border_color; ?>;
}

.PaddingLeftRight{
	padding:0 15px;
}
/************************************************************************
#  GENERAL END
*************************************************************************/



/************************************************************************
#  STRUCTURE
*************************************************************************/
html{
	background: url(<?php echo $admin_bg_image_body; ?>);
}

body{
}

#header-background{
	background: url(<?php echo $admin_bg_image_header; ?>);
	height:374px;
	width:100%;
	position:absolute;
	z-index:0;
}

#container{
	position:relative;
	z-index:1;
}

	#header-container{
    height: 285px;
	}
		#header{
			width: <?php echo $admin_general_body_width; ?>px;
			margin:0 auto;
		}
			#logo{
				padding-top: 20px;
				<?php if ($admin_general_logo_position == "left") { ?>
					text-align:left;
				<?php } elseif ($admin_general_logo_position == "center") { ?>
					text-align:center;
					margin:0 auto;
				<?php } elseif ($admin_general_logo_position == "right") { ?>
					text-align:right;
        <?php } ?>
			}

	#wrapper3{
		width:1040px;
		margin:0 auto;
		background: url(images/global_nav_shadow_left.png) no-repeat left top;
	}
		#wrapper2{
			background: url(images/global_nav_shadow_right.png) no-repeat right top;
		}
			#wrapper{
				width: <?php echo $admin_general_body_width + 30; ?>px;
				margin:0 auto;
			}

			#content-container{
				background: <?php echo $admin_bg_color_content; ?>;
				padding:30px 0 0 0;
				margin:0 auto;
			}

			.Content{
				padding: 0 15px 0 15px;
			}
			.ContentNoMargin{
				padding: 0 0 30px 0;
			}
			.ContentSmall,
			#content-small{
				width: <?php echo $admin_general_body_width - $admin_general_sidebar_width - 56; ?>px;
				float:left;
			}

	#footer-container{
		padding:30px 15px 0 15px;
	}
		#footer-nav-container{
			position:relative;
			border-bottom: 1px solid <?php echo $admin_bg_color_footer_nav; ?>;
		}
			#footer-nav{
				position:relative;
				margin:0 auto;
				background: <?php echo $admin_bg_color_footer_nav; ?>;
			}
				#footer-nav ul{
					margin:0;
					padding:0;
					list-style-type:none;
					list-style-position:outside;
					position:relative;
					z-index:98;
				}
					/* 1st TIER (main) */
					#footer-nav ul li{
						float:left;
						padding:13px 0 12px 0;
						margin:0;
						position: relative;
					}
					#footer-nav ul li:first-child{
						margin-left:0px;
					}
					#footer-nav ul li:last-child{
						margin-right:0px;
					}
						#footer-nav ul li a{
							font-family: "source_sans_semibold", arial;
							display:block;
							padding:0 10px;
							margin:0;
							text-decoration:none;
							white-space:nowrap;
							color: <?php echo $admin_font_footer_nav_color; ?>;
							border-right: 1px solid <?php echo $admin_font_footer_nav_color; ?>;
							line-height:1em;
							cursor:pointer;
							text-transform: uppercase;
						}
						#footer-nav ul li:last-child a{
							border-right: none;
						}
						#footer-nav ul li a:hover{
						}
							#footer-nav ul li.current_page_ancestor a,
							#footer-nav ul li.current-menu-ancestor a,
							#footer-nav ul li.current-menu-item a{
							}
								#footer-nav ul li.current-menu-item ul li a{
								}
									#footer-nav ul li.current-menu-item ul li a:hover{
									}

							/* 2nd TIER */
							#footer-nav ul li ul {
								display: none !important;
							}
								/* 3rd TIER */
								#footer-nav ul li ul li ul {
									display: none;
								}

				#footer-nav ul li:hover ul ul, #footer-nav ul li:hover ul ul ul, #footer-nav ul li:hover ul ul ul ul{
					display: none;
				}
				#footer-nav ul li:hover ul, #footer-nav ul li li:hover ul, #footer-nav ul li li li:hover ul, #footer-nav ul li li li li:hover ul{
					display: block;
				}

				#footer-nav ul li:hover ul ul, #footer-nav ul li:hover ul ul ul, #footer-nav ul li:hover ul ul ul ul{
					display:none;
				}
				#footer-nav ul li:hover ul, #footer-nav ul li li:hover ul, #footer-nav ul li li li:hover ul, #footer-nav ul li li li li:hover ul{
					display:block;
				}

		#footer{
			padding: 15px 0 20px 0;
			font-size: <?php echo $admin_font_content_size * .9; ?>px;
		}
			#social-icons{
				float:right;
			}
				#social-icons a {
					min-width: 22px;
					min-height: 22px;
					margin: 0 0 0 5px;
					float: left;
					text-indent: -5000px;
				}
				#social-icons a#social-link-rss { background: url(images/global_icon_social_rss.png) no-repeat center center; }
				#social-icons a#social-link-facebook { background: url(images/global_icon_social_facebook.png) no-repeat center center; }
				#social-icons a#social-link-flickr { background: url(images/global_icon_social_flickr.png) no-repeat center center; }
				#social-icons a#social-link-google-plus { background: url(images/global_icon_social_google_plus.png) no-repeat center center; }
				#social-icons a#social-link-instagram { background: url(images/global_icon_social_instagram.png) no-repeat center center; }
				#social-icons a#social-link-linkedin { background: url(images/global_icon_social_linkedin.png) no-repeat center center; }
				#social-icons a#social-link-pinterest { background: url(images/global_icon_social_pinterest.png) no-repeat center center; }
				#social-icons a#social-link-twitter { background: url(images/global_icon_social_twitter.png) no-repeat center center; }
				#social-icons a#social-link-vimeo { background: url(images/global_icon_social_vimeo.png) no-repeat center center; }
				#social-icons a#social-link-youtube { background: url(images/global_icon_social_youtube.png) no-repeat center center; }
			#copyright{
				float:left;
			}
/************************************************************************
#  STRUCTURE END
*************************************************************************/


/************************************************************************
#  NAVIGATION
*************************************************************************/
#navigation-container{
	position:relative;
	z-index: 98;
}

	#navigation{
		position:relative;
		z-index: 98;
		margin:0 auto;
		padding-top:2px;
		background-image: -ms-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* IE10 Consumer Preview */
		background-image: -moz-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* Mozilla Firefox */
		background-image: -o-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* Opera */
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php echo $admin_bg_color_nav_top; ?>), color-stop(1, <?php echo $admin_bg_color_nav_bottom; ?>));  /* Webkit (Safari/Chrome 10) */
		background-image: -webkit-linear-gradient(top, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* Webkit (Chrome 11+) */
		background-image: linear-gradient(to bottom, <?php echo $admin_bg_color_nav_top; ?> 0%, <?php echo $admin_bg_color_nav_bottom; ?> 100%);  /* W3C Markup, IE10 Release Preview */
		border: 1px solid <?php echo $admin_bg_color_nav_bottom; ?>;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
	}
		#navigation ul{
			margin:0;
			padding:0;
			list-style-type:none;
			list-style-position:outside;
			position:relative;
			z-index:98;
		}
			/* 1st TIER (main) */
			#navigation ul li{
				float:left;
				padding:0;
				margin:0 <?php echo $admin_general_navigation_spacing/2; ?>px 0 <?php echo $admin_general_navigation_spacing/2; ?>px;
				position: relative;
			}
			#navigation ul li:first-child{
				margin-left:0px;
			}
			#navigation ul li:last-child{
				margin-right:0px;
			}
				#navigation ul li a{
					font-family: "source_sans_semibold", arial;
					display:block;
					padding:8px 0;
					margin:0;
					text-decoration:none;
					white-space:nowrap;
					font-size: <?php echo $admin_font_navigation_size; ?>px;
					color: <?php echo $admin_font_navigation_color; ?>;
					cursor:pointer;
					text-transform: uppercase;
				}
				#navigation ul li a:hover{
					color: <?php echo $admin_font_navigation_color_hover; ?>;
				}
					#navigation ul li.current_page_ancestor a,
					#navigation ul li.current-menu-ancestor a,
					#navigation ul li.current-menu-item a{
					}
						#navigation ul li.current-menu-item ul li a{
						}
							#navigation ul li.current-menu-item ul li a:hover{
							}

					/* 2nd TIER */
					#navigation ul li ul {
						position:absolute;
						display: none;
						width:auto;
						height:auto;
						list-style-type:none;
						list-style-position:outside;
						z-index:99;
						margin: 0;
						margin-left: -15px;
						padding: 0;
						background: <?php echo $admin_bg_color_nav_bottom; ?>;
						border-top: none !important;
						-webkit-border-radius: 4px;
						-moz-border-radius: 4px;
						border-radius: 4px;
					}
						#navigation ul li ul li{
							float: left;
							clear: left;
							margin: 0px;
							padding: 0px;
							border:none;
							width:100%;
						}
						#navigation ul li ul li:first-child{
							-webkit-border-top-left-radius: 4px;
							-webkit-border-top-right-radius: 4px;
							-moz-border-radius-topleft: 4px;
							-moz-border-radius-topright: 4px;
							border-top-left-radius: 4px;
							border-top-right-radius: 4px;
						}
						#navigation ul li ul li:last-child{
							-webkit-border-bottom-right-radius: 4px;
							-webkit-border-bottom-left-radius: 4px;
							-moz-border-radius-bottomright: 4px;
							-moz-border-radius-bottomleft: 4px;
							border-bottom-right-radius: 4px;
							border-bottom-left-radius: 4px;
						}
						#navigation ul li ul li:hover{
							background: <?php echo $admin_bg_color_nav_top; ?>;
						}
						#navigation ul li ul li a{
							float:left;
							margin: 0px;
							padding: 0px;
							color: <?php echo $admin_font_navigation_color; ?>;
							display:block;
							padding: 5px 15px;
						}

							/* 3rd TIER */
							#navigation ul li ul li ul {
								display: none;
							}

		#navigation ul li:hover ul ul, #navigation ul li:hover ul ul ul, #navigation ul li:hover ul ul ul ul{
			display: none;
		}
		#navigation ul li:hover ul, #navigation ul li li:hover ul, #navigation ul li li li:hover ul, #navigation ul li li li li:hover ul{
			display: block;
		}

		#navigation ul li:hover ul ul, #navigation ul li:hover ul ul ul, #navigation ul li:hover ul ul ul ul{
			display:none;
		}
		#navigation ul li:hover ul, #navigation ul li li:hover ul, #navigation ul li li li:hover ul, #navigation ul li li li li:hover ul{
			display:block;
		}
/************************************************************************
#  NAVIGATION END
*************************************************************************/



/************************************************************************
#  PAGE - HOME
*************************************************************************/
#welcome{
	float:left;
	width: <?php echo $admin_general_body_width - 15 - $admin_general_banner_width; ?>px;
	padding-top:30px;
}

	#welcome-title{
		color: <?php echo $admin_font_heading_color; ?>;
		font-size: <?php echo $admin_font_heading_size * 1.1; ?>px;
		font-family: lustria_regular;
		padding-bottom: 30px;
	}

	#welcome-content{
		padding-bottom: 15px;
	}
		#welcome-content p{
			font-size: <?php echo $admin_font_content_size * 1.2; ?>px;
		}

	#welcome-link{
	}

#banner-container{
	float:right;
	padding: 0 0 17px 0;
	background: url(images/home_banner_shadow.png) bottom center no-repeat;
	position:relative;
	overflow:hidden;
}

	#banner{
		width: <?php echo $admin_general_banner_width;?>px;
		height: <?php echo $admin_general_banner_height;?>px;
		overflow:hidden;
	}

	#banner-arrow-left{
		width: 31px;
		height: 109px;
		margin: -60px 0 0;
		display: block;
		position: absolute;
		z-index:8888;
		top: 50%;
		cursor: pointer;
		text-indent: -999em;
		left: 0px;
		background: url(images/home_banner_arrow_left.png) no-repeat left center;
	}

	#banner-arrow-right{
		width: 31px;
		height: 109px;
		margin: -60px 0 0;
		display: block;
		position: absolute;
		z-index:9999;
		top: 50%;
		cursor: pointer;
		text-indent: -999em;
		right: 0px;
		background: url(images/home_banner_arrow_right.png) no-repeat left center;
	}

#intro-boxes-container{
	border-top: 1px solid <?php echo $admin_general_border_color; ?>;
	padding-top:3px;
}

	#intro-boxes{
		padding: 30px 0 0 0;
		border-top: 1px solid <?php echo $admin_general_border_color; ?>;
	}
		#intro-boxes .IntroBox{
			width: <?php echo ($admin_general_body_width - 30) / 3; ?>px;
			float:left;
		}
		#intro-boxes #intro-box1{
			margin-right: 15px;
		}
		#intro-boxes #intro-box2{
			margin-right: 15px;
		}
		#intro-boxes #intro-box3{
		}
			#intro-boxes .IntroBox img{
				max-width:100%;
				height: auto;
				padding-bottom: 17px;
				background: url(images/home_intro_image_shadow.png) bottom center no-repeat;
			}
				#intro-boxes .IntroBox a img:hover{
					opacity: .9;
				}
			#intro-boxes .IntroBox h2{
				font-family: "lustria_regular";
				font-size: <?php echo $admin_font_heading_size; ?>;
				color: <?php echo $admin_font_heading_color; ?>;
				padding-bottom:15px;
			}
			#intro-boxes .IntroBox .IntroBoxContent{
				font-size: <?php echo $admin_font_content_size * 1.1; ?>px;
			}

		.IntroBoxSidebar{
		}
			.IntroBoxSidebar *{
				color: <?php echo $admin_font_date_color; ?>;
			}
			.IntroBoxSidebar .widget{
			}
			.IntroBoxSidebar h2{
			}

			.IntroBoxSidebar,
			.IntroBoxSidebar p,
			.IntroBoxSidebar li,
			.IntroBoxSidebar ul,
			.IntroBoxSidebar ol{
				font-size: <?php echo $admin_font_content_size * 1.1; ?>px;
			}

			.IntroBoxSidebar a{
			}
			.IntroBoxSidebar a:hover{
			}

			.IntroBoxSidebar ul{
				list-style:none;
				padding:0;
				margin:0;
			}

			.IntroBoxSidebar ul li{
			}

			.IntroBoxSidebar ul li ul{
			}

			.IntroBoxSidebar ul li ul li{
				padding: 5px 0;
			}

			.IntroBoxSidebar .widget_recent_entries ul li{
			}

			.IntroBoxSidebar .widget_text h2{
			}

			.IntroBoxSidebar .textwidget{
			}

			.IntroBoxSidebar .widget_tag_cloud div{
				padding-top:3px;
			}

			.IntroBoxSidebar .widget_tag_cloud div a{
				padding:0 10px 0 0;
			}

			.IntroBoxSidebar #calendar_wrap{
				padding-top:3px;
			}

			.IntroBoxSidebar #wp-calendar{
				width:100%;
			}

			.IntroBoxSidebar #wp-calendar tr td a{
				text-decoration: underline;
			}

			.IntroBoxSidebar #wp-calendar tr td#next{
				text-align:right;
			}

			.IntroBoxSidebar #searchform{
			}
/************************************************************************
#  PAGE - HOME END
*************************************************************************/



/************************************************************************
#  PAGE
*************************************************************************/
.ContentPage .Post{
	border-bottom:none;
}

	.PageTitle{
		color: <?php echo $admin_font_heading_color; ?>;
		font-size: <?php echo $admin_font_heading_size * 1.3; ?>px;
		font-family: lustria_regular;
		padding-bottom: 25px;
	}
/************************************************************************
#  PAGE END
*************************************************************************/


/************************************************************************
#  PAGE - ARCHIVE
*************************************************************************/
.ArchiveTitle h2{
	color: <?php echo $admin_font_heading_color; ?>;
	font-size: <?php echo $admin_font_heading_size * .7; ?>px;
	font-style: italic;
	font-family: lustria_regular;
	padding-bottom: 30px;
}

.ArchiveDescription{
	padding-bottom: 30px;
}
/************************************************************************
#  PAGE - ARCHIVE END
*************************************************************************/


/************************************************************************
#  PAGE - CONTACT
*************************************************************************/
#page-contact{
	width: <?php echo $admin_general_body_width - 130; ?>px;
	margin: 0 auto;
}

#contact-area{
	background: <?php echo $admin_bg_color_contact_form; ?>;
	padding: 25px 75px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
}

	#contact-info{
		width: <?php echo ($admin_general_body_width - 260) / 2 - 45; ?>px;
		float:right;
		overflow:hidden;
	}
		#contact-info a{
			color: <?php echo $admin_font_link_color; ?> !important;
			font-size: <?php echo $admin_font_content_size - 1; ?>px !important;
		}

		#contact-info a:hover{
			color: <?php echo $admin_font_hover_color; ?> !important;
		}

		.ContactInfoItem{
			padding: 10px 0;
			width:257px;
		}

	#contact-form{
		width: <?php echo ($admin_general_body_width - 260) / 2 - 45; ?>px;
		float:left;
	}

		#contact-failed,
		#contact-success{
			padding:12px 20px;
			margin:0 0 15px 0;
			border:1px solid <?php echo $border_color; ?>;
			font-style:italic;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
		}

		form#form-contact{
		}
			form#form-contact input{
				width: <?php echo ($admin_general_body_width - 260) / 2 - 45 - 22; ?>px;
				padding: 6px 10px;
			}
			form#form-contact textarea{
				width: <?php echo ($admin_general_body_width - 260) / 2 - 45 - 22; ?>px;
				padding: 6px 10px;
				height: 150px;
				clear:both;
			}
			form#form-contact input#contactsubmit{
			}
				form#form-contact input#contactsubmit:hover{
				}
/************************************************************************
#  PAGE - CONTACT END
*************************************************************************/


/************************************************************************
#  PAGE - FACEBOOK STREAM
*************************************************************************/
#page-facebook-stream{
}

	#page-facebook-stream .Entry{
		border-bottom:1px solid <?php echo $admin_general_border_color; ?>;
	}

	#facebook-container{
	}

		#facebook{
			padding:0;
			margin:0;
		}
			#facebook li {
				border-bottom: 1px solid <?php echo $admin_general_border_color; ?>;
				list-style: none outside none;
				min-height: 110px;
				padding: 25px 0;
				margin:0 !important;
			}
				#facebook .FacebookHeader {
					float: left;
					width: 15%;
					padding-right:3%;
				}
				#facebook .FacebookLink,
				#facebook .FacebookImage{
					width: 20%;
					float:left;
					padding-right:3%;
				}
				#facebook .FacebookMessage {
					float: left;
					width: 82%;

				}
				#facebook .FacebookMessage.FacebookMessageSmall {
					float: left;
					width: 59%;
				}


		#facebook_albums{
			display:none;
		}
			#facebook_albums li {
				float: left;
				height: 300px;
				list-style: none outside none;
				padding: 0 15px;
				width: 180px;
			}
			#facebook_albums img {
				display: block;
			}
			#facebook_albums .header {
				display: none;
			}
			#facebook_albums {
				clear: both;
				padding-left: 50px;
			}
			#facebook_albums a {
				font-weight: bold;
			}
/************************************************************************
#  PAGE - FACEBOOK STREAM END
*************************************************************************/


/************************************************************************
#  BLOG
*************************************************************************/
.Post{
	border-bottom: 1px solid <?php echo $admin_general_border_color; ?>;
	margin-bottom: 20px;
	padding-bottom:7px;
}

	.PostMiniThumb{
		float:left;
	}
		.PostMiniThumb img{
			margin-right:15px;
		}

	.PostMiniBody{
		float:left;
		<?php if ($use_sidebar) { ?>
			width: <?php echo $admin_general_body_width - $admin_general_sidebar_width - 81 - 280 - 15; ?>px;
		<?php } else { ?>
			width: <?php echo $admin_general_body_width - 280 - 15; ?>px;
		<?php } ?>
	}

	.Post .PostTitle{
		color: <?php echo $admin_font_heading_color; ?>;
		font-size: <?php echo $admin_font_heading_size * .85; ?>px;
		line-height: <?php echo $admin_font_heading_size * .85; ?>px;
		font-family: lustria_regular;
		padding-bottom: 8px;
	}
		.Post .PostTitle h2 a{
			color: <?php echo $admin_font_heading_color; ?>;
			font-size: <?php echo $admin_font_heading_size * .85; ?>px;
			line-height: <?php echo $admin_font_heading_size * .85; ?>px;
			font-family: lustria_regular;
		}

	.Post .PostDate{
		font-style:italic;
		font-family: georgia, times new roman;
		padding-bottom: 13px;
		color: <?php echo $admin_font_date_color; ?>;
	}

	.Post a.PostMetaComments{
		color: <?php echo $admin_font_date_color; ?>;
	}

	.Entry{
		font-size:12px;
		padding-bottom: 8px;
	}
		.Entry h1{
			font-size:<?php echo $admin_font_heading_size; ?>px;
			padding:25px 0 0 0;
			margin: 0 0 25px 0;
			font-family: "source_sans_semibold";
		}
		.Entry h2{
			font-size:<?php echo $admin_font_heading_size * .95; ?>px;
			padding:25px 0 0 0;
			margin: 0 0 25px 0;
			font-family: "source_sans_semibold";
		}
		.Entry h3{
			font-size:<?php echo $admin_font_heading_size * .90; ?>px;
			padding:25px 0 0 0;
			margin: 0 0 25px 0;
			font-family: "source_sans_semibold";
		}
		.Entry h4{
			font-size:<?php echo $admin_font_heading_size * .85; ?>px;
			padding:25px 0 0 0;
			margin: 0 0 25px 0;
			font-family: "source_sans_semibold";
		}
		.Entry h5{
			font-size:<?php echo $admin_font_heading_size * .80; ?>px;
			padding:25px 0 0 0;
			margin: 0 0 25px 0;
			font-family: "source_sans_semibold";
		}
		.Entry h6{
			font-size:<?php echo $admin_font_heading_size * .75; ?>px;
			padding:25px 0 0 0;
			margin: 0 0 25px 0;
			font-family: "source_sans_semibold";
		}

		.Entry p{
			padding:0 0 15px 0;
		}
		.Entry ul,
		.Entry ol{
			padding:0 0 15px 0;
		}
		.Entry ul{
			margin:0px;
			padding:0px;
		}
		.Entry ul li{
			margin:0 0 0 75px;
			padding:0 0 0 0;
		}
			.Entry ul ul,
			.Entry ol ol{
			padding:0;
			margin-left:15px;
			}
		.Entry a:link,
		.Entry a:visited{
		}
		.Entry a:hover{
			text-decoration:underline;
		}
		.Entry img{
			margin-bottom:15px;
		}
		.Entry p img{
			margin-bottom:0px;
		}

.EntryNavigation{
	padding-bottom: 20px;
}
/************************************************************************
#  BLOG END
*************************************************************************/


/************************************************************************
#  CUSTOM POST - HORSE
*************************************************************************/
/* Archives */
/* Taxonomy */
.PostHorseIndex{
	float:left;
	width: 220px;
	margin-right:15px;
}
.PostHorseIndex.NoMargin{
	margin-right: 0px;
}

	.PostHorseIndex .PostHorseMiniThumb{
		margin-bottom: 10px;
	}
		.PostHorseIndex .PostHorseMiniThumb img{
			width: 210px;
			border: 6px solid <?php echo $admin_general_border_color; ?>;
		}
		.PostHorseIndex .PostHorseMiniThumb img:hover{
			opacity: .9;
		}

	.PostHorseIndex a.PostHorseMiniBody{
		background: <?php echo $admin_bg_color_horse_list_title; ?>;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		padding: 7px 15px;
		text-align:center;
		display:block;
	}
		.PostHorseIndex a.PostHorseMiniBody .PostHorseTitle{
		}
			.PostHorseIndex a.PostHorseMiniBody .PostHorseTitle h3{
				color: <?php echo $admin_font_content_color; ?>;
				font-size: <?php echo $admin_font_content_size + 4; ?>px;
				line-height: <?php echo $admin_font_content_size + 4; ?>px;
				text-transform: uppercase;
				font-family: "source_sans_regular", arial;
			}
			.PostHorseIndex a.PostHorseMiniBody:hover .PostHorseTitle h3{
				color: <?php echo $admin_font_hover_color; ?>;
			}
		.PostHorseIndex a.PostHorseMiniBody .PostHorseParents{
			padding-top: 4px;
			color: <?php echo $admin_font_date_color; ?>;
			font-size: <?php echo $admin_font_content_size -1; ?>px;
			font-family: "fanwood_textitalic", georgia, times new roman, serif;
		}

/* Single */
.PostHorseSingle{
}
	.PostHorseSingle #post-horse-right{
		float:right;
		width: <?php echo ($admin_general_body_width - 15) / 2; ?>px;
	}
	.PostHorseSingle #post-horse-right.PostHorseRightFull{
		float:right;
		width: auto;
	}
		.PostHorseSingle #post-horse-right #post-horse-title-parents{
			padding-bottom:8px;
			border-bottom: 1px solid <?php echo $admin_general_border_color; ?>;
			margin-bottom: 10px;
		}
			.PostHorseSingle #post-horse-right #post-horse-title-parents #post-horse-parents{
				float:right;
				font-family: "source_sans_regular_italic";
				font-size: <?php echo $admin_font_content_size + 1; ?>px;
				line-height: <?php echo $admin_font_content_size + 1; ?>px;
				padding-top: <?php echo $admin_font_heading_size - ($admin_font_content_size + 1); ?>px;
			}
			.PostHorseSingle #post-horse-right #post-horse-title-parents #post-horse-title{
				float:left;
			}
				.PostHorseSingle #post-horse-right #post-horse-title-parents #post-horse-title h2{
					font-family: "lustria_regular";
					font-size: <?php echo $admin_font_heading_size; ?>px;
					line-height: <?php echo $admin_font_heading_size; ?>px;
					color: <?php echo $admin_font_heading_color; ?>;
				}
		.PostHorseSingle #post-horse-right #post-horse-info{
			padding-bottom: 13px;
		}
		.PostHorseSingle #post-horse-right .Entry{
			height: <?php echo 343 - $admin_font_heading_size - 8 - 10 - ($admin_font_content_size * 2 * 1.35) - 13; ?>px;
			overflow: auto;
		}
		.PostHorseSingle #post-horse-right.PostHorseRightFull .Entry{
			height: auto;
			overflow: auto;
		}

	.PostHorseSingle #post-horse-left{
		float:left;
		width: <?php echo ($admin_general_body_width - 15) / 2; ?>px;
	}
		.PostHorseSingle #post-horse-left img{
			background: url(images/post_horse_shadow.png) bottom center no-repeat;
			padding-bottom: 18px;
			max-width: 100%;
			height: auto;
		}

	.PostHorseSingle #post-horse-gallery-images{
		background: <?php echo $admin_bg_color_horse_gallery; ?>;
		border-bottom: 1px ridge <?php echo $admin_general_border_color_horse_page; ?>;
	}
		.PostHorseSingle #post-horse-gallery-images #post-horse-gallery-images-title{
			background: <?php echo $admin_bg_color_content; ?>;
			padding-left:15px;
		}
			.PostHorseSingle #post-horse-gallery-images #post-horse-gallery-images-title h3{
				background: <?php echo $admin_bg_color_horse_gallery; ?>;
				line-height:1em;
				padding: 10px 40px;
				font-size: <?php echo $admin_font_heading_size *.7; ?>px;
				height: <?php echo $admin_font_heading_size *.7; ?>px;
				display:inline;
				-webkit-border-top-left-radius: 4px;
				-webkit-border-top-right-radius: 4px;
				-moz-border-radius-topleft: 4px;
				-moz-border-radius-topright: 4px;
				border-top-left-radius: 4px;
				border-top-right-radius: 4px;
			}
		.PostHorseSingle #post-horse-gallery-images #post-horse-gallery-images-inner{
			padding: 30px 0;
		}
			.PostHorseSingle #post-horse-gallery-images #post-horse-gallery-images-inner img{
				border: 3px solid <?php echo $admin_bg_color_content; ?>;
				max-width: 110px;
				height: auto;
				margin: 0 14px;
				cursor:pointer;
				float:left;
			}

	.PostHorseSingle #post-horse-video{
		background: <?php echo $admin_bg_color_horse_video; ?>;
		padding: 50px 0;
		text-align:center;
	}
		.PostHorseSingle #post-horse-video iframe,
		.PostHorseSingle #post-horse-video object{
			display: block;
			margin: 0 auto !important;
			text-align:center !important;
		}

	.PostHorseSingle #post-horse-pedigree{
		padding: 25px 0;
		background: <?php echo $admin_bg_color_horse_pedigree; ?>;
	}
		.PostHorseSingle #post-horse-pedigree h3{
			padding-bottom:8px;
			border-bottom: 1px solid <?php echo $admin_general_border_color; ?>;
			margin-bottom: 70px;
		}
		.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph{
			background: url(images/post_horse_pedigree_bg.png) no-repeat left top;
			background: url(http://equuleus.bradhassett.com/wp-content/themes/equuleus/images/post_horse_pedigree_bg.png) no-repeat left top;
			height: 432px;
			width:863px;
			position:relative;
			margin:0 auto;
		}
		.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph.Pedigree1Columns{
			width:212px;
		}
		.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph.Pedigree2Columns{
			width:417px;
		}
		.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph.Pedigree3Columns{
			width:654px;
		}
		.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph.Pedigree4Columns{
		}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph .HorsePedigreeOdd{
				background: <?php echo $admin_bg_color_horse_pedigree_block1; ?>;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph .HorsePedigreeEven{
				background: <?php echo $admin_bg_color_horse_pedigree_block2; ?>;
			}

			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div{
				position:absolute;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				border-radius: 4px;
			}
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div h4{
					font-family: 'source_sans_regular';
					color: <?php echo $admin_font_horse_pedigree_color; ?>;
					text-align:center;
					overflow:hidden;
				}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree1,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree2{
				width: 190px;
				height:130px;
				padding: 10px;
			}
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree1 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree2 h4{
					font-size:19px;
					line-height:21px;
				}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree3,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree4,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree5,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree6{
				width: 135px;
				height:28px;
				padding: 8px 10px;
			}
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree3 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree4 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree5 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree6 h4{
					font-size:14px;
					line-height:16px;
				}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree7,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree8,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree9,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree10,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree11,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree12,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree13,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree14{
				width: 135px;
				height:24px;
				padding:5px 10px 5px;
			}

				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree7 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree8 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree9 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree10 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree11 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree12 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree13 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree14 h4{
					font-size:14px;
					line-height:16px;
					white-space:nowrap;
				}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree15,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree16,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree17,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree18,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree19,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree20,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree21,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree22,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree23,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree24,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree25,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree26,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree27,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree28,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree29,
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree30{
				width: 105px;
				height:12px;
				padding:5px 5px 5px 5px;
			}
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree15 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree16 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree17 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree18 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree19 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree20 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree21 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree22 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree23 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree24 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree25 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree26 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree27 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree28 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree29 h4,
				.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree30 h4{
					font-size:12px;
					line-height:16px;
					white-space:nowrap;
				}

			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree1{
				top:25px;
				left:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree2{
				top:250px;
				left:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree3{
				top:23px;
				left:260px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree4{
				top:130px;
				left:260px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree5{
				top:250px;
				left:260px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree6{
				top:358px;
				left:260px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree7{
				top:6px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree8{
				top:50px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree9{
				top:121px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree10{
				top:166px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree11{
				top:233px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree12{
				top:277px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree13{
				top:347px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree14{
				top:391px;
				left:485px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree15{
				top:0px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree16{
				top:23px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree17{
				top:46px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree18{
				top:69px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree19{
				top:115px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree20{
				top:138px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree21{
				top:161px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree22{
				top:184px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree23{
				top:225px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree24{
				top:248px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree25{
				top:271px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree26{
				top:294px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree27{
				top:342px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree28{
				top:365px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree29{
				top:388px;
				right:0px;
			}
			.PostHorseSingle #post-horse-pedigree #post-horse-pedigree-graph div#horse-pedigree30{
				top:411px;
				right:0px;
			}
/************************************************************************
#  CUSTOM POST - HORSE END
*************************************************************************/


/************************************************************************
#  SIDEBAR
*************************************************************************/
.Sidebar{
	<?php if ($admin_general_sidebar_position == "left") { ?>
		float:left;
		padding-right:26px;
		margin-right:24px;
		border-right: 1px solid <?php echo $admin_general_border_color; ?>;
	<?php } else { ?>
		float:right;
		padding-left:26px;
		border-left: 1px solid <?php echo $admin_general_border_color; ?>;
	<?php } ?>
	width: <?php echo $admin_general_sidebar_width; ?>px;
	font-family: georgia, times new roman;
	font-style:italic;
}

.Sidebar *{
	color: <?php echo $admin_font_date_color; ?>;
}

.Sidebar .widget{
	padding:0 0 20px 0;
	margin-bottom: 26px;
	border-bottom: 1px solid <?php echo $admin_general_border_color; ?>;
}

.Sidebar h2{
	font-size:<?php echo $admin_font_content_size; ?>px;
	font-weight: bold;
	text-transform: uppercase;
	padding:0 0 15px 0;
	font-style:normal;
	color: <?php echo $admin_font_content_color; ?>;
}

.Sidebar,
.Sidebar p,
.Sidebar li,
.Sidebar ul,
.Sidebar ol{
	font-size:12px;
}

.Sidebar a{
}
.Sidebar a:hover{
	color: <?php echo $admin_font_hover_color; ?>;
}

.Sidebar ul{
	list-style:none;
	padding:0;
	margin:0;
}

.Sidebar ul li{
}

.Sidebarul li ul{
}

.Sidebar ul li ul li{
	padding: 5px 0;
}

.Sidebar .widget_recent_entries ul li{
}

.Sidebar .widget_text h2{
}

.Sidebar .textwidget{
}

.Sidebar .widget_tag_cloud div{
	padding-top:3px;
}

.Sidebar .widget_tag_cloud div a{
	padding:0 10px 0 0;
}

.Sidebar #calendar_wrap{
	padding-top:3px;
}

.Sidebar #wp-calendar{
	width:100%;
}

.Sidebar #wp-calendar tr td a{
	text-decoration: underline;
}

.Sidebar #wp-calendar tr td#next{
	text-align:right;
}

.Sidebar #searchform{
}
/************************************************************************
#  SIDEBAR END
*************************************************************************/


/************************************************************************
#  SEARCH
*************************************************************************/
#searchform{
	position:relative;
	width:224px;
}
	#searchform .Search{
		border: 1px solid #c1c1c1;
		background:#fff;
		width:208px;
		padding:10px;
		position:relative;
		z-index:4;
	}
	#searchform .SearchSubmit{
		display: none;
	}
/************************************************************************
#  SEARCH END
*************************************************************************/



/************************************************************************
#  COMMENTS
*************************************************************************/
#comments{
	position:relative;
}

	#comments h3{
		color: <?php echo $admin_font_heading_color; ?>;
		font-size: <?php echo $admin_font_heading_size * .85; ?>px;
		line-height: <?php echo $admin_font_heading_size * .85; ?>px;
		font-family: lustria_regular;
		padding-bottom:20px;
		margin-bottom:25px;
		border-bottom: 1px solid <?php echo $admin_general_border_color; ?>;
	}

	ul.CommentList{
		list-style:none;
		position:relative;
		margin:0px !important;
		padding:0px !important;
	}
		.CommentContainer{
			position:relative;
		}
			.CommentContainer .CommentAuthor{
				padding: 4px 0 8px 0;
				font-family: "source_sans_semibold";
				font-size: <?php echo $admin_font_content_size + 1; ?>px;
				line-height: <?php echo $admin_font_content_size + 1; ?>px;
			}
				.CommentContainer .CommentAuthor a{
					text-decoration: none;
					font-family: "source_sans_semibold";
					font-size: <?php echo $admin_font_content_size + 1; ?>px;
					line-height: <?php echo $admin_font_content_size + 1; ?>px;
				}
			.CommentContainer .CommentReply{
				position:absolute;
				right:0px;
				top:0px;
			}
				.CommentContainer .CommentReply a{
					text-decoration: none;
					color: <?php echo $admin_font_content_color; ?>;
					background: <?php echo $admin_bg_color_horse_list_title; ?>;
					padding:3px 7px;
				}
				.CommentContainer .CommentReply a:hover{
					text-decoration: none;
					color: <?php echo $admin_font_hover_color; ?>;
				}
			.CommentContainer .CommentModeration{
				font-style: italic;
			}
			.CommentContainer .CommentText{
			}
				.CommentContainer .CommentText p{
					margin-bottom:13px;
				}

		/* override the indenting from the .post section */
		.Post ul.CommentList li{
			list-style:none;
			padding:25px 0;
			border-top: 1px solid <?php echo $admin_general_border_color; ?>;
			margin:0 0 0 0;
			position:relative;
		}
			.Post ul.CommentList li p:last-child{
				padding-bottom:0px !important;
			}
		.Post ul.CommentList > li:first-child{
			border-top:none;
			padding-top:0px;
		}
		.Post ul.CommentList > li:last-child{
			border-bottom: 1px solid <?php echo $admin_general_border_color; ?>;
		}
			.Post ul.CommentList li ul{
				margin-left: 0px;
				padding-top: 25px;
				position:relative;
			}
				.Post ul.CommentList li ul li{
					padding-left: 25px;
				}
				.Post ul.CommentList li ul li:last-child{
						padding-bottom:0;
				}


	#respond{
		position:relative;
		padding-top:20px;
		margin-bottom:11px;
	}
		#respond-inner{
			position:relative;
			padding:13px 25px;
			background: <?php echo $admin_bg_color_contact_form; ?>;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
		}
			ul.CommentList #respond{
			}
			#respond input{
				clear:both;
				width:43%;
				margin-bottom:20px !important;
			}
			#respond textarea{
				width:90%;
			}
				#respond textarea:focus{
				}
			#respond #comment-submit{
				cursor: pointer;
				width: 130px;
			}
				#respond #comment-submit:hover{
				}
		#respond .CancelCommentReply{
			padding-bottom: 12px;
			font-style:italic;
		}
/************************************************************************
#  COMMENTS END
*************************************************************************/
