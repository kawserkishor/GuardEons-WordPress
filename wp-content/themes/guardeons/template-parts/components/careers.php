<?php
/** Careers Section */
?>
<section id="careers" class="section section-muted">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Join Our Team', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Build the future of secure digital experiences.', 'guardeons'); ?></p>
    </header>
    <div class="grid-2">
      <?php
      $q = new WP_Query([
        'post_type' => 'job_opening',
        'posts_per_page' => 6,
      ]);
      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post();
          $location = get_post_meta(get_the_ID(), 'location', true);
          $type = get_post_meta(get_the_ID(), 'type', true);
          ?>
          <article class="card reveal">
            <h3><?php the_title(); ?></h3>
            <?php if ($location || $type) : ?><p class="help"><?php echo esc_html(trim($type . ' • ' . $location, ' •')); ?></p><?php endif; ?>
            <p><?php echo get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 24); ?></p>
            <div class="card-actions">
              <a class="button-outline" href="<?php the_permalink(); ?>"><?php esc_html_e('View Role', 'guardeons'); ?></a>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata();
      else: ?>
        <p><?php esc_html_e('No open positions at this time. Check back soon.', 'guardeons'); ?></p>
      <?php endif; ?>
    </div>
    <div style="margin-top:1rem" class="reveal">
      <a href="<?php echo esc_url(get_post_type_archive_link('job_opening')); ?>" class="button"><?php esc_html_e('View All Positions', 'guardeons'); ?></a>
    </div>
  </div>
</section>