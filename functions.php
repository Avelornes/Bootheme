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
function new_excerpt_more( $more ) {
	return '<a class="more-link" href="' . get_permalink() . '">' . '[lire la suite]' . '</a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

?>


