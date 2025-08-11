<?php
/** Blog/Insights Section */
?>
<section id="insights" class="section section-muted">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Latest Insights', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Security tips, engineering, and growth strategies.', 'guardeons'); ?></p>
    </header>
    <div class="grid-3">
      <?php
      $q = new WP_Query(['post_type' => 'post', 'posts_per_page' => 3]);
      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post(); ?>
          <article class="card reveal">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
            <?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 24); ?></p>
            <a class="button-outline" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'guardeons'); ?></a>
          </article>
        <?php endwhile; wp_reset_postdata();
      else: ?>
        <p><?php esc_html_e('Publish posts to show insights here.', 'guardeons'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>