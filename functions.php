<?php

function theme_styles()
{

    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/assets/librairies/bootstrap/css/bootstrap.css');
    wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');

}

add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js()
{

    global $wp_scripts;

    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/librairies/bootstrap/js/bootstrap.min.js', array('jquery'), true);
    //wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');

}

add_action('wp_enqueue_scripts', 'theme_js');

?>