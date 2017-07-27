<?php get_header(); ?>

    <div id="main_blog">
        <div id="articles">
			<?php

			get_template_part( 'template-parts/content', 'excerpt' );
			?>
        </div>
		<?php
		get_sidebar( 'primary' );

		?>
    </div>
<?php

if ( function_exists( 'boot_bootstrap_paginate_links' ) ) {
	boot_bootstrap_paginate_links();
}

get_footer(); ?>