<?php get_header(); ?>

	<!-- Start the Loop. -->
<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>

	<?php if ( in_category( '3' ) ) : ?>
	<div class="post-cat-three"></div>
<?php else : ?>
	<div class="post">
<?php endif; ?>
	<?php

	$post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
	if ( 'post-excerpt' === $post_display_option ) {
		get_template_part( 'template-parts/content','excerpt' );
	} else {
		get_template_part( 'template-parts/content', get_post_format() );
	}
	?>
	</div>

<?php endwhile;
else : ?>

	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>

<?php get_footer(); ?>