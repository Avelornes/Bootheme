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
	function boot_admin_script() {
		wp_enqueue_style( 'bootstrap-adm-core', get_template_directory_uri() . '/assets/librairies/bootstrap/css/bootstrap.css', array() );
	}

	add_action( 'admin_enqueue_scripts', 'boot_admin_script' );
}

add_action( 'admin_init', 'boot_admin_init' );

function theme_setup() {
	//add thumbnails
	add_theme_support( 'post-thumbnails' );

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

//publish dates

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
	include('includes/build-options-page.php');
}

add_action('admin_menu', 'boot_admin_menus');

?>


