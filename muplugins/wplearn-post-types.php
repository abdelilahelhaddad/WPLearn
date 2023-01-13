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
  ]);
}

add_action('init', 'wplearn_post_types');