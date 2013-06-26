<?php
	/* Template Name: Facebook Stream */
	get_header(); 
	
	// custom meta box info
	$meta_contact_info_contact_info = 		get_post_meta($post->ID, 'meta_contact_info_contact_info', true);
	$meta_contact_info_map = 				get_post_meta($post->ID, 'meta_contact_info_map', true);
?>

	<div id="page-facebook-stream" class="Content ContentPage">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="Post" id="post-<?php the_ID(); ?>">
			
				<div class="PageTitle"><?php the_title(); ?></div>
		
				<div class="Entry">
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					<div class="Clear"></div>
				</div>
				
				<ul id="facebook">
					<ul id="facebook">
						<li>Loading…</li>
					</ul>
					
					<ul id="facebook_albums">
						<li>Loading…</li>
					</ul>
					
					<script id="facebook_template" type="text/x-jquery-tmpl">
						<li class="FacebookPost">
							<div class="FacebookHeader">
								<a href="http://www.facebook.com/profile.php?id=${from.id}" target="_blank"><img alt="picture" src="https://graph.facebook.com/${from.id}/picture"></a>
								<div class="Clear"></div>
								<a href="http://www.facebook.com/profile.php?id=${from.id}" target="_blank"><strong>${from.name}</strong></a>
								{{if type == "link"}}
									shared a <a href="http://www.facebook.com/profile.php?id=${from.id}" target="_blank">link</a>
								{{/if}}
								<div class="Clear"></div>
								<abbr class="timeago" title="${created_time}">${created_time}</abbr>
							</div>
							
							{{if type == "link"}}
								<div class="FacebookLink">
									<a href="${link}" target="_blank">
										{{if picture}}
											<img alt="picture" src="${Social.facebookPictureURL(picture)}">
										{{/if}}
										<div class="Clear"></div>
										<strong>${name}</strong>
									</a>
									<div class="Clear"></div>
									<i>${caption}</i>
									<div class="Clear"></div>
									{{if description}}
										<p>${description}</p>
									{{/if}}
								</div>
								
								<div class="FacebookMessage FacebookMessageSmall">
									<p>{{html message}}</p>
								</div>
							{{else}}
								{{if picture}}
									<div class="FacebookImage">
										<a href="${link}" target="_blank"><img alt="picture" src="${Social.facebookPictureURL(picture)}"></a>
									</div>
									
									<div class="FacebookMessage FacebookMessageSmall">
										<p>{{html message}}</p>
									</div>
								{{else}}
									<div class="FacebookMessage">
										<p>{{html message}}</p>
									</div>
								{{/if}}
							{{/if}}
							
							<div class="Clear"></div>
						</li>
					</script>
					
					<script id="facebook_album_template" type="text/x-jquery-tmpl">
						{{if type != "friends_walls"}}
							<li>
								<a href="${link}" target="_blank"><img src="https://graph.facebook.com/${id}/picture?type=album" alt="picture"></a>
								<a href="${link}" target="_blank">${name}</a>
								<span>
									{{if count}}
										{{if count == 1}}
											1 photo
										{{else}}
											${count} photos
										{{/if}}
									{{/if}}
								</span>
							</li>
						{{/if}}
					</script>
					
					<script>
						// "103882419703669" is Facebook page ID
						// "392120024178056|aqQUlwOblkyuLzKmxZm39SeBVck" is Facebook authentication token
						Social.facebook("arabhorse", "392120024178056|aqQUlwOblkyuLzKmxZm39SeBVck");
					</script>
					
					<div class="Clear"></div> 
				</ul> <!-- facebook -->
				
				<div class="Clear"></div>
			</div> <!-- Post -->
			<?php endwhile; endif; ?>
		<div class="Clear"></div>
		
	</div> <!-- .Content -->

<?php get_footer(); ?>
