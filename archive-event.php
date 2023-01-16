<?php get_header(); ?>

<?php pageBanner([
  'title' => 'All Events',
  'subtitle' => 'archive-event.php Whats going on bro?',
]); ?>

<div class="container container--narrow page-section">
  <?php while (have_posts()) {
    the_post();
    get_template_part('template-parts/content', 'event');
  }
  echo paginate_links();
  ?>
  <hr class="section-break">
  <p><a href="<?php echo site_url('/past-events'); ?>">Recap of past events</a></p>
</div>
<?php get_footer();

?>