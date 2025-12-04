<?php
function twentytwentyfive_child_enqueue_styles()
{

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

// Logged-in-only styles for Assignment 3
function assign3_logged_in_styles()
{
    if (is_user_logged_in()) {
        wp_enqueue_style(
            'assign3-logged-in',
            get_stylesheet_directory_uri() . '/logged-in.css',
            array(),
            '1.0'
        );
    }
}

add_action('wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles');
add_action('wp_enqueue_scripts', 'assign3_logged_in_styles');
