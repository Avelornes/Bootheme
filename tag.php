<?php get_header(); ?>
<strong><?php
	single_tag_title( 'Etiquette : ' );
	?></strong>

<?php

$post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
if ( 'post-excerpt' === $post_display_option ) {
	get_template_part( 'template-parts/content', 'excerpt' );
} else {
	get_template_part( 'template-parts/content', get_post_format() );
}
?>

<?php get_footer(); ?>

