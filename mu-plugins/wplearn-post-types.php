<?php

function wplearn_post_types()
{
  //Event Post Type
  register_post_type('event', [
    'supports' => [
      'title', 'editor', 'excerpt'
    ],
    'rewrite' => [
      'slug' => 'events',
    ],
    'public' => true,
    'labels' => [
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ],
    'menu_icon' => 'dashicons-calendar-alt',
    'has_archive' => true,
  ]);
  //Program Post Type
  register_post_type('program', [
    'supports' => [
      'title', 'editor'
    ],
    'rewrite' => [
      'slug' => 'programs',
    ],
    'public' => true,
    'labels' => [
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ],
    'menu_icon' => 'dashicons-awards',
    'has_archive' => true,
  ]);
  //Professor Post Type
  register_post_type('professor', [
    'supports' => [
      'title', 'editor', 'thumbnail'
    ],
    'public' => true,
    'labels' => [
      'name' => 'Professors',
      'add_new_item' => 'Add New Professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor'
    ],
    'menu_icon' => 'dashicons-welcome-learn-more',
  ]);
  //SlideShow Post Type
  register_post_type('slideshow', [
    'supports' => [
      'title',
    ],
    'public' => true,
    'labels' => [
      'name' => 'Slideshows',
      'add_new_item' => 'Add New Slideshow',
      'edit_item' => 'Edit Slideshow',
      'all_items' => 'All Slideshows',
      'singular_name' => 'Slideshow'
    ],
    'menu_icon' => 'dashicons-slides',
  ]);
}

add_action('init', 'wplearn_post_types');