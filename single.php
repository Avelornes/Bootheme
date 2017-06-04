<?php get_header(); ?>

	<?php
	get_template_part( 'template-parts/content', get_post_format() );
	?>

<?php previous_post_link(); ?>    <?php next_post_link(); ?>

<?php get_footer(); ?>

