<?php
// Adds dynamic title tag support
function customtheme_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','customtheme_theme_support');

// For menu navigation
function customtheme_menus(){
    $locations= array(
        'primary'=> "Header Menu",
        'footer'=> "Footer Menu"
    );

    register_nav_menus($locations);
}

add_action('init','customtheme_menus');



// Adds style to header
function customtheme_register_styles()
{

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('custom-theme_style', get_template_directory_uri() . "/style.css", array('custom-theme_boostrap'), $version, 'all');
    // add array if you want to load first the bootstrap
    wp_enqueue_style('custom-theme_boostrap', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('custom-theme_fontawesome', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');

    
}

add_action('wp_enqueue_scripts', 'customtheme_register_styles');


// Adds js to footer

function customtheme_register_scripts()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_script("custom-theme_jquery","https://code.jquery.com/jquery-3.4.1.slim.min.js",array(),"3.4.1",true);

    wp_enqueue_script("custom-theme_popper","https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",array(),"1.16.0",true);

    wp_enqueue_script("custom-theme_bootstrap","https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js",array(),"4.4.1",true);

    wp_enqueue_script("custom-theme_main",get_template_directory_uri() . "/assets/js/main.js",array(),$version,true);
    
}

add_action('wp_enqueue_scripts', 'customtheme_register_scripts');
