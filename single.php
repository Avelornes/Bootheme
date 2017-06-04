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
	get_template_part( 'template-parts/content', get_post_format() );
	?>
    </div>
<?php endwhile;
else : ?>

    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>
<?php previous_post_link(); ?>    <?php next_post_link(); ?>

<?php get_footer(); ?>

