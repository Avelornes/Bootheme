<?php get_header();

get_template_part( 'template-parts/content', get_post_format() );
?>

<nav aria-label="">
    <ul class="pager">
        <li class="previous">
            <a href="#">
                <span aria-hidden="true">&larr;</span>
				<?php previous_post_link(); ?>
            </a>
        </li>
        <li class="next">
            <a href="#">
				<?php next_post_link(); ?>
                <span aria-hidden="true">&rarr;</span>
            </a>
        </li>
    </ul>
</nav>

<?php get_footer(); ?>

