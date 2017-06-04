<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) :
	the_post(); ?>

	<?php if ( in_category( '3' ) ) : ?>
    <div class="post-cat-three"></div>
<?php else : ?>
    <div class="post">
<?php endif; ?>
	<?php
	if ( $thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ) ):
		$thumbnail_src = $thumbnail_html['0'];
		?>
        <img class="img-responsive img-thumbnail" src="<?php echo $thumbnail_src ?>" alt=""/>
	<?php endif; ?>

    <h2><?php the_title(); ?></h2>
    <small><?php echo get_the_date(); ?>
        par <?php the_author_posts_link(); ?> <?php _e( 'Posté dans ' ); ?><?php the_category( ', ' ); ?>
    </small>

    <div class="entry">
		<?php the_content(); ?>
		<?php get_attached_media( $type, $post_id ) ?>
		<?php the_tags( 'Etiquettes : ', ' • ', '<br />' ); ?>
    </div>
    </div>
<?php endwhile;
else : ?>

    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>