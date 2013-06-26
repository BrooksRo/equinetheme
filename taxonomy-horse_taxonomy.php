<?php
	get_header(); 
?>

	<div id="content-horses" class="Content">
		
		<div class="ArchiveTitle">
			<h2>
				<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?>
			</h2>
		</div>
		
		<?php
		$archiveDiscription = term_description( '', get_query_var( 'taxonomy' ) );
		if($archiveDiscription != '') : 
		?>
			<div class="ArchiveDescription"><?php echo $archiveDiscription; ?></div>
		<?php 
		endif; 
		?>
		
		<?php get_template_part('template-part-post-horses'); ?>
		<div class="Clear"></div>
		
	</div> <!-- .Content -->	

<?php get_footer(); ?>
