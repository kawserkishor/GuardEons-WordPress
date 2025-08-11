<?php
/** Team Section */
?>
<section id="team" class="section">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Our Team', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Leaders in security, engineering, and design.', 'guardeons'); ?></p>
    </header>
    <div class="grid-4">
      <?php
      $q = new WP_Query([
        'post_type' => 'team_member',
        'posts_per_page' => 8,
      ]);
      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post();
          $role = get_post_meta(get_the_ID(), 'role', true);
          $linkedin = get_post_meta(get_the_ID(), 'linkedin', true);
          ?>
          <article class="card reveal" itemscope itemtype="https://schema.org/Person">
            <?php if (has_post_thumbnail()) : ?>
              <div class="headshot"><?php the_post_thumbnail('team-headshot'); ?></div>
            <?php endif; ?>
            <h3 itemprop="name"><?php the_title(); ?></h3>
            <?php if ($role) : ?><p class="help" itemprop="jobTitle"><?php echo esc_html($role); ?></p><?php endif; ?>
            <p><?php echo get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 22); ?></p>
            <div class="card-actions">
              <?php if ($linkedin) : ?><a class="button-outline" href="<?php echo esc_url($linkedin); ?>" rel="noopener" target="_blank">LinkedIn</a><?php endif; ?>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata();
      else: ?>
        <p><?php esc_html_e('Add team members to introduce your leadership.', 'guardeons'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>