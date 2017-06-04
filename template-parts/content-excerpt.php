<?php
if ( $thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ) ):
	$thumbnail_src = $thumbnail_html['0'];
	?>
	<img class="img-responsive img-thumbnail" src="<?php echo $thumbnail_src ?>" alt="">
<?php endif; ?>

<h2><a href="<?php the_permalink(); ?>" rel="bookmark"
       title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<small><?php echo get_the_date(); ?>
	par <?php the_author_posts_link(); ?> <?php _e( 'Posté dans ' ); ?><?php the_category( ', ' ); ?></small>

<div class="entry">
	<?php the_excerpt(); ?>
	<?php get_attached_media( $type, $post_id ) ?>
</div>