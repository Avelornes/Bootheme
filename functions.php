<?php

function theme_styles()
{
    /*CSS*/
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/assets/librairies/bootstrap/css/bootstrap.css');
    wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');

}

add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js()
{
    /*JS et jquery*/
    global $wp_scripts;

    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/librairies/bootstrap/js/bootstrap.min.js', array('jquery'), true);
    //add custom javascript ? uncomment this line :
    //wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');

}

add_action('wp_enqueue_scripts', 'theme_js');

function theme_setup()
{
    //add thumbnails
    add_theme_support('post-thumbnails');

    //delete generator version
    remove_action('wp_head', 'wp_generator');

    //delete french quote
    remove_filter('the_content', 'wptexturize');

    //generate title
    add_theme_support('title-tag');

    //fix adminbar
    add_filter('body_class', 'mbe_body_class');

    // Register Custom Navigation Walker
    require_once('assets/librairies/bootstrap-navwalker/wp-bootstrap-navwalker.php');

    //menu
    register_nav_menus(array('primary'=>'Principal'));

}

add_action('after_setup_theme', 'theme_setup');

//fix adminbar
function mbe_body_class($classes)
{
    if (is_user_logged_in()) {
        $classes[] = 'body-logged-in';
    } else {
        $classes[] = 'body-logged-out';
    }
    return $classes;
}

add_action('wp_head', 'mbe_wp_head');
function mbe_wp_head()
{
    echo '<style>'
        . PHP_EOL
        . 'body{ padding-top: 70px !important; }'
        . PHP_EOL
        . 'body.body-logged-in .navbar-fixed-top{ top: 46px !important; }'
        . PHP_EOL
        . 'body.logged-in .navbar-fixed-top{ top: 46px !important; }'
        . PHP_EOL
        . '@media only screen and (min-width: 783px) {'
        . PHP_EOL
        . 'body{ padding-top: 70px !important; }'
        . PHP_EOL
        . 'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }'
        . PHP_EOL
        . 'body.logged-in .navbar-fixed-top{ top: 28px !important; }'
        . PHP_EOL
        . '}</style>'
        . PHP_EOL;
}

//publish dates

function filter_publish_dates( $the_date, $d, $post ) {
    if ( is_int( $post) ) {
        $post_id = $post;
    } else {
        $post_id = $post->ID;
    }

    if ( 'product' != get_post_type( $post_id ) )
        return $the_date;

    return date( 'Y-m-d - h:j:s', strtotime( $the_date ) );
}
add_action( 'get_the_date', 'filter_publish_dates', 10, 3 );

?>


