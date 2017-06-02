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
}

add_action('after_setup_theme', 'theme_setup');

?>