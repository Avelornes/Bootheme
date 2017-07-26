<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
        <?php
        if (in_category('3')) :
            ?>
            <div class="post-cat-three"></div>
        <?php else : ?>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="panel panel-default col-md-6">
                    <div class="panel-body">
                        <?php
                        if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')):
                            $thumbnail_src = $thumbnail_html['0'];
                            ?>
                            <img class="img-responsive img-thumbnail" src="<?php echo $thumbnail_src ?>" alt="">
                        <?php endif; ?>

                        <h2>
                            <a href="<?php the_permalink(); ?>" rel="bookmark"
                               title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <small>
                            <?php echo get_the_date(); ?>
                            par
                            <?php the_author_posts_link();
                            _e('Posté dans ');
                            the_category(', '); ?>
                        </small>

                        <div class="entry">
                            <?php the_excerpt();
                            get_attached_media($type, $post_id) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;
else : ?>

    <p>
        <?php _e('Sorry, no posts matched your criteria.'); ?>
    </p>

<?php endif; ?>