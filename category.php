<?php get_header(); ?>
    <div>
        <strong>
			<?php
			single_cat_title( 'Archives de ', 'true' );
			?>
        </strong>
        : <?php echo category_description(); ?>
    </div>

<?php
get_template_part( 'template-parts/content', 'excerpt' );

get_footer(); ?>