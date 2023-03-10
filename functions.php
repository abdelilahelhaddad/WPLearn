<?php

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', microtime());
}

function pageBanner($args = NULL)
{
    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }
    if (!isset($args['subtitle'])) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!isset($args['photo'])) {
        if (get_field('page_banner_background_image')) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)">
  </div>
  <div class="container page-banner__content container--narrow">
    <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
    <div class="page-banner__intro">
      <p><?php echo $args['subtitle']; ?></p>
    </div>
  </div>
</div>

<?php } ?>

<?php

function wplearn_scripts()
{
    wp_enqueue_script('main-wplearn-js', get_template_directory_uri() . '/js/scripts-bundled.js', [], _S_VERSION, true);
    wp_enqueue_script('search-wplearn-js', get_template_directory_uri() . '/js/search.js', [], _S_VERSION, true);
    wp_enqueue_style(
        'google-font',
        '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i',
        [],
        _S_VERSION,
        'all'
    );
    wp_enqueue_style(
        'font_awesome',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        [],
        _S_VERSION,
        'all'
    );
    wp_enqueue_style('wplearn_style', get_template_directory_uri() . '/style.css', [], _S_VERSION, 'all');
    wp_localize_script('search-wplearn-js', 'wplearnData', array(
        'root_url' => get_site_url()
    ));
}

add_action('wp_enqueue_scripts', 'wplearn_scripts');

function wplearn_setup()
{
    register_nav_menus([
        'footer-menu-explore' => 'Footer Menu Explore',
        'footer-menu-learn' => 'Footer Menu Learn',
    ]);
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'wplearn_setup');

function wplearn_adjust_events_queries($query)
{
    if (!is_admin() and is_post_type_archive('program') and is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

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