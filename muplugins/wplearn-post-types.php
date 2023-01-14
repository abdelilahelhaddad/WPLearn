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
}

add_action('init', 'wplearn_post_types');