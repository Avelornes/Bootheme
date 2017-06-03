<?php get_header(); ?>

<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) :
    the_post(); ?>

    <?php if (in_category('3')) : ?>
    <div class="post-cat-three"></div>
<?php else : ?>
    <div class="post">
<?php endif; ?>
    <?php the_post_thumbnail('large') ?>
    <h2><a href="<?php the_permalink(); ?>" rel="bookmark"
           title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

    <small><?php echo get_the_date(); ?> - <?php the_author_posts_link(); ?></small>

    <div class="entry">
        <?php the_content(); ?>
        <?php get_attached_media( $type, $post_id ) ?>
    </div>

    <p class="postmetadata"><?php _e('Posted in'); ?><?php the_category(', '); ?></p>
    </div> <!-- closes the first div box -->

<?php endwhile;
else : ?>

    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>

