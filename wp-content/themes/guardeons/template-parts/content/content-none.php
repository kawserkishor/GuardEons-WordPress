<?php
/** Template part for displaying a message that posts cannot be found */
?>
<section class="no-results not-found">
  <h2><?php esc_html_e('Nothing Found', 'guardeons'); ?></h2>
  <p><?php esc_html_e('It seems we can’t find what you’re looking for.', 'guardeons'); ?></p>
  <?php get_search_form(); ?>
</section>