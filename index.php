<?php get_header(); ?>
<?php
$args_blog = array(
	'post_type'      => 'post',
	'posts_per_page' => 2
);

$req_blog = new WP_Query( $args_blog );
?>

<section class="page_accueil">
    <div class="container">
        <div class="row">
			<?php
			if ( $content === $pages ) {
				get_template_part( 'template-parts/content', 'page' );
			}
			?>
        </div>
    </div>
</section>
<hr>
<?php
if ( $req_blog->have_posts() ) :
	?>
    <section class="last_news">
        <div class="container">
            <div class="row">
				<?php
				while ( $req_blog->have_posts() ):
				$req_blog->the_post();
				?>
				<?php
				if ( $thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ) ):
					$thumbnail_src = $thumbnail_html['0'];
					?>
                    <img class="img-responsive img-thumbnail" src="<?php echo $thumbnail_src ?>" alt=""/>
				<?php endif; ?>

                <h2>
                    <a href="<?php the_permalink(); ?>" rel="bookmark"
                       title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h2>

                <small>
					<?php echo get_the_date(); ?>
                    par
					<?php the_author_posts_link();
					_e( ' posté dans ' );
					the_category( ', ' ); ?>
                </small>

                <div class="entry">
					<?php the_excerpt();
					get_attached_media( $type, $post_id ) ?>
                </div>
                <hr>
            </div>
			<?php endwhile;
			wp_reset_postdata() ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>

