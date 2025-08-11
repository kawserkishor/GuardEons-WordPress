<?php
/** 404 template */
get_header(); ?>
<main id="primary" class="site-main container">
  <section class="error-404 not-found">
    <h1><?php esc_html_e('Page not found', 'guardeons'); ?></h1>
    <p><?php esc_html_e('The page you were looking for doesn’t exist. Try searching:', 'guardeons'); ?></p>
    <?php get_search_form(); ?>
  </section>
</main>
<?php get_footer(); ?>