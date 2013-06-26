<?php
	/* Template Name: Contact */
	get_header(); 
	
	// custom meta box info
	$meta_contact_info_contact_info = 		get_post_meta($post->ID, 'meta_contact_info_contact_info', true);
	$meta_contact_info_map = 				get_post_meta($post->ID, 'meta_contact_info_map', true);
?>

	<div id="page-contact" class="Content ContentPage">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="Post" id="post-<?php the_ID(); ?>">
				
					<div class="PageTitle"><?php the_title(); ?></div>
			
					<div class="Entry">
						<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					</div>
					
					<div id="contact-area">
						<div id="contact-info">
							<?php 
							echo nl2br($meta_contact_info_contact_info);
							echo '<div class="Spacer20"></div>';
							echo $meta_contact_info_map;
							?>
						</div>
						
						<div id="contact-form">
							<?php
								$contact_submitted = $_POST['contactsubmitted'];
								$contact_name = $_POST['contactname'];
								$contact_email = $_POST['contactemail'];
								$contact_phone = $_POST['contactphone'];
								$contact_company = $_POST['contactcompany'];
								$contact_message = $_POST['contactmessage'];
								
								// validate
								if (trim($contact_name) == "" || $contact_name == "Your Name*"){
									$contact_error = "Error: 'Name' field is blank <br />";
								}
								if (trim($contact_email) == "" || $contact_email == "Your Email*"){
									$contact_error .= "Error: 'Email' field is blank <br />";
								}
								if (trim($contact_message) == "" || $contact_message == "Your Message*"){
									$contact_error .= "Error: 'Message' field is blank <br />";
								}

								// if validated then send
								if ($contact_submitted == "yes"){
									if ($contact_error != ""){
										echo "<div id='contact-failed'>" . $contact_error . "</div>";
									}
									else{	
										// fix empty variable text to send in email
										if (trim($contact_phone) == "" || $contact_phone == "Your Phone"){
											$contact_phone = "Not Provided";
										}
										if (trim($contact_company) == "" || $contact_company == "Company Name"){
											$contact_company = "Not Provided";
										}
$contact_email_message = "
Name: " . $contact_name . "
Email: ".$contact_email . "
Phone: " . $contact_phone . "
Company: ".$contact_company . "
Message: 
".$contact_message;
										$contact_headers = 'From: '.$contact_email . "\r\n" .
														'Reply-To: '.$contact_email . "\r\n" .
														'X-Mailer: PHP/' . phpversion();
										mail (get_option('admin_email'), "Website Contact Submission", $contact_email_message, $contact_headers);
										echo "<div id='contact-success'>Thanks! Your contact submission has been sent!</div>";
									}
								}

							?>
								<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-contact">
									<input type="text" name="contactname" id="contactname" class="ContactFormItem" value="<?php if ($contact_name) {echo $contact_name;} else {echo "Your Name*";}; ?>" rel="Your Name*" size="22" tabindex="1" /> 
									<input type="text" name="contactemail" id="contactemail" class="ContactFormItem" value="<?php if ($contact_email) {echo $contact_email;} else {echo "Your Email*";}; ?>" rel="Your Email*" size="22" tabindex="2" />
									<input type="text" name="contactphone" id="contactphone" class="ContactFormItem" value="<?php if ($contact_phone) {echo $contact_phone;} else {echo "Your Phone";}; ?>" rel="Your Phone" size="22" tabindex="3" />
									<textarea name="contactmessage" id="contactmessage" class="ContactFormItem" cols="50" rows="10" tabindex="4" rel="Your Message*"><?php if ($contact_message) {echo $contact_message;} else {echo "Your Message*";}; ?></textarea>
									<input type="hidden" id="contactsubmitted" name="contactsubmitted" value="yes" />
									<input name="submit" type="submit" id="contactsubmit" class="Submit" tabindex="5" value="Submit" />
								</form>
								
								<script>
								$('#contact-form input').focus(function() {
									placeholder_text = $(this).attr("rel");
									if ($(this).val() == placeholder_text) {
										$(this).val("");
									}
								});
								$('#contact-form input').blur(function() {
									placeholder_text = $(this).attr("rel");
									if ($(this).val() == "" || $(this).val() == placeholder_text) {
										$(this).val(placeholder_text);
									}
								});
								</script>
								
						</div> <!-- contact-form -->
						<div class="Clear"></div>
					</div> <!-- contact-area -->
					<div class="Clear"></div>
				</div> <!-- Post -->
				<?php endwhile; endif; ?>
			<div class="Clear"></div>
			
	</div> <!-- .Content -->

<?php get_footer(); ?>
