<?php
/* pro panel admin panel options */
$admin_general_comments = get_option('admin_general_comments');

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p>This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

if ($admin_general_comments != "none" && comments_open()) :
?>
	<div id="comments">
<?php
		if ($admin_general_comments == "facebook") :
?>
			<!-- facebook comments -->
			<div id="fbcomment"></div>
			<script>
			// generate the width of facebook comments
			$(document).ready(function(){
				width = $('#comments').width();
				fbxml = '<fb:comments href="<?php the_permalink() ?>" num_posts="5" width="' + width + 'px"></fb:comments>';
				$('#fbcomment').append(fbxml);
			});
			</script>
<?php
		elseif ($admin_general_comments == "wordpress") :
?>
			<!-- wordpress comments -->
			<h3 class="UnderlinePink">Comments</h3>
			<?php if ( have_comments() ) : ?>	
				<ul class="commentlist CommentList">
					<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
				</ul>	
			<?php else : ?>
				<p>There aren't any comments yet.&nbsp;&nbsp;Be the first one!</p>
			<?php endif; ?>

			<?php if ( comments_open() ) : ?>
				<!-- COMMENT FORM BEGIN -->
				<div class="commentlist-container">
					<div id="respond">
						<div id="respond-inner">
						
							<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
								<p>You must be logged in to post a comment.&nbsp;&nbsp;Not registered?&nbsp;&nbsp;It's easy - <a class="FacebookConnectLinkSmall" href="<?php echo $fb_login_url; ?>"><img src="<?php bloginfo('template_url'); ?>/images/button_facebook_small.png" alt="connect using facebook" /></a></p>
							<?php else : ?>
									
								<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
										
									<div class="CommentContainerBorder" id="comment-<?php comment_ID() ?>">
										<div class="CommentContainer">
											<div class="CancelCommentReply"><?php cancel_comment_reply_link('(cancel reply)'); ?></div>
											<?php if ( is_user_logged_in() ) { ?>
												<div class="CommentAuthor">Logged in as <a href="<?php echo get_option('siteurl'); ?>/settings/"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></div>
											<?php } else { ?>
												<input type="text" name="author" id="author" value="Your Name" rel="Your Name" size="22" tabindex="1" />
												<div class="Clear"></div>
												<input type="text" name="email" id="email" value="Your Email" rel="Your Email" size="22" tabindex="2" />
												<div class="Clear"></div>
												
											<?php } ?>
											<textarea name="comment" id="comment" cols="50" rows="10" tabindex="3" rel="Your Message">Your Message</textarea>
											<input name="submit" type="submit" id="comment-submit" class="Sumit Button" tabindex="4" value="Submit" />
											<div class="Clear"></div>
										</div>
									</div>
								
									<?php comment_id_fields(); ?>
									<?php do_action('comment_form', $post->ID); ?>
									<div class="Clear"></div>
								</form>

							<?php endif; // If registration required and not logged in ?>
								
						</div> <!-- respond-inner -->
					</div> <!-- respond -->
				</div>
				<!-- COMMENT FORM END -->
			<?php endif; // if you delete this the sky will fall on your head ?>
<?php 
		endif;
?>
	</div>
<?php
endif; 
?>