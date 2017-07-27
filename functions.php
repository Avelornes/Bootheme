<?php

function theme_styles() {
	/*CSS*/
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/librairies/bootstrap/css/bootstrap.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js() {
	/*JS et jquery*/
	global $wp_scripts;

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/librairies/bootstrap/js/bootstrap.min.js', array( 'jquery' ), true );
	//add custom javascript ? uncomment this line :
	//wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');

}

add_action( 'wp_enqueue_scripts', 'theme_js' );

//Admin Dashboard
function boot_admin_init() {
	//style Dashboard
	function boot_admin_script() {
		if ( ! isset( $_GET['page'] ) || $_GET['page'] != "boot_theme_opts" ) {
			return;
		}
		wp_enqueue_style( 'bootstrap-adm-core', get_template_directory_uri() . '/assets/librairies/bootstrap/css/bootstrap.css', array() );

		//enable wp media uploader
		wp_enqueue_media();
		//load script admin
		wp_enqueue_script( 'boot-admin-init', get_template_directory_uri() . '/assets/js/admin-options.js', array() );
	}

	add_action( 'admin_enqueue_scripts', 'boot_admin_script' );

	//
	include( 'includes/save-options-page.php' );

	add_action( 'admin_post_boot_save_options', 'boot_save_options' );
}

add_action( 'admin_init', 'boot_admin_init' );

function theme_setup() {
	//add thumbnails
	add_theme_support( 'post-thumbnails' );

	//custom header --Image d'en-tête--
	$args = array(
		'flex-width'    => true,
		'width'         => 1350,
		'flex-height'   => true,
		'height'        => 200,
		'uploads'       => true,
		'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
	);
	add_theme_support( 'custom-header', $args );

	//delete generator version
	remove_action( 'wp_head', 'wp_generator' );

	//delete french quote
	remove_filter( 'the_content', 'wptexturize' );

	//generate title
	add_theme_support( 'title-tag' );

	// Register Custom Navigation Walker
	require_once( 'assets/librairies/bootstrap-navwalker/wp-bootstrap-navwalker.php' );

	//menu
	register_nav_menus( array( 'primary' => 'Principal' ) );

}

add_action( 'after_setup_theme', 'theme_setup' );

//Add size 'medium large' for images

function my_images_sizes( $sizes ) {
	$addsizes = array(
		"medium_large" => "Medium Large"
	);

	$newsizes = array_merge( $sizes, $addsizes );

	return $newsizes;
}

add_filter( 'image_size_names_choose', 'my_images_sizes' );

//Publish dates

function filter_publish_dates( $the_date, $post ) {
	if ( is_int( $post ) ) {
		$post_id = $post;
	} else {
		$post_id = $post->ID;
	}

	if ( 'product' != get_post_type( $post_id ) ) {
		return $the_date;
	}

	return date( 'Y-m-d - h:j:s', strtotime( $the_date ) );
}

add_action( 'get_the_date', 'filter_publish_dates', 10, 3 );

//Excerpt
function excerpt_read_more_link( $output ) {
	global $post;

	return $output . '<a href="' . get_permalink( $post->ID ) . '"> Lire la suite...</a>';
}

add_filter( 'the_excerpt', 'excerpt_read_more_link' );

//API options
function boot_activ_options() {
	$theme_opts = get_option( 'boot_opts' );
	if ( ! $theme_opts ) {
		$opts = array(
			'image_01_url' => '',
			'legend_01'    => ''
		);

		add_option( 'boot_opts', $opts );
	}
}

add_action( 'after_switch_theme', 'boot_activ_options' );

//Theme Options
function boot_admin_menus() {
	add_menu_page(
		'Bootheme Options',
		'Options du thème',
		'publish_pages',
		'boot_theme_opts',
		'boot_build_options_page'
	);
	include( 'includes/build-options-page.php' );
}

add_action( 'admin_menu', 'boot_admin_menus' );

//Enable Widget
function boot_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer Widget Zone',
		'description'   => 'Widgets du footer (4 maximum)',
		'id'            => 'widgetized-footer',
		'before_widget' => '<div id="%1$s" class="col-xs-3 %2$s"><div class="inside-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="text-center">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'boot_widgets_init' );

// Bootstrap pagination function

function boot_get_bootstrap_paginate_links() {
	ob_start();
	?>
    <div class="pages clearfix">
		<?php
		global $wp_query;
		$current    = max( 1, absint( get_query_var( 'paged' ) ) );
		$pagination = paginate_links( array(
			'base'      => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
			'format'    => '?paged=%#%',
			'current'   => $current,
			'total'     => $wp_query->max_num_pages,
			'type'      => 'array',
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
		) ); ?>
		<?php if ( ! empty( $pagination ) ) : ?>
            <ul class="pagination">
				<?php foreach ( $pagination as $key => $page_link ) : ?>
                    <li class="paginated_link<?php if ( strpos( $page_link, 'current' ) !== false ) {
						echo ' active';
					} ?>"><?php echo $page_link ?></li>
				<?php endforeach ?>
            </ul>
		<?php endif ?>
    </div>
	<?php
	$links = ob_get_clean();

	return apply_filters( 'boot_bootstap_paginate_links', $links );
}

function boot_bootstrap_paginate_links() {
	echo boot_get_bootstrap_paginate_links();
}


?>


