<?php

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', microtime());
}

function wplearn_scripts()
{
    wp_enqueue_script('main-wplearn-js', get_template_directory_uri() . '/js/scripts-bundled.js', [], _S_VERSION, true);
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i', [], _S_VERSION, 'all');
    wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', [], _S_VERSION, 'all');
    wp_enqueue_style('wplearn_style', get_template_directory_uri() . '/style.css', [], _S_VERSION, 'all');
}

add_action('wp_enqueue_scripts', 'wplearn_scripts');

function wplearn_setup()
{
    register_nav_menus([
        'footer-menu-explore' => 'Footer Menu Explore',
        'footer-menu-learn' => 'Footer Menu Learn',
    ]);
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'wplearn_setup');

function wplearn_adjust_events_queries($query)
{
    if (!is_admin() and is_post_type_archive('event') and is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', [
            [
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            ]
        ]);
    }
}

add_action('pre_get_posts', 'wplearn_adjust_events_queries');