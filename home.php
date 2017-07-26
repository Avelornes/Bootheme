<?php get_header();

get_template_part( 'template-parts/content', 'excerpt' );


if ( function_exists( 'boot_bootstrap_paginate_links' ) ) {
	boot_bootstrap_paginate_links();
}

get_footer(); ?>