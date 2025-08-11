<?php
/** Services Section */
?>
<section id="services" class="section services section-muted">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Our Services', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Comprehensive digital solutions to secure and scale your business.', 'guardeons'); ?></p>
    </header>
    <div class="cards">
      <?php
      $q = new WP_Query([
        'post_type' => 'service',
        'posts_per_page' => 8,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ]);
      $fallback = [
        ['Web Design & Development', 'Stunning, performant websites and apps built with modern stacks.'],
        ['Digital Marketing & SEO', 'Data-driven growth strategies, technical SEO, and content.'],
        ['Domain & Web Hosting', 'Reliable domains, managed hosting, and performance tuning.'],
        ['Penetration Testing & Security Audits', 'Proactive assessments to find and fix vulnerabilities.'],
        ['Managed SOC Services', '24/7 monitoring, detection, and rapid response.'],
        ['IT Support & Consulting', 'End-user support, infrastructure, and strategic guidance.'],
        ['Cloud Solutions & Migration', 'Secure cloud architecture, migration, and optimization.'],
        ['Cybersecurity Training', 'Hands-on training to build a strong security culture.'],
      ];

      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post(); ?>
          <article class="card reveal">
            <div class="icon" aria-hidden="true">◆</div>
            <h3><?php the_title(); ?></h3>
            <p><?php echo get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 22); ?></p>
            <div class="card-actions">
              <a class="button-outline" href="<?php the_permalink(); ?>"><?php esc_html_e('Learn More', 'guardeons'); ?></a>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata();
      else:
        foreach ($fallback as $item) : ?>
          <article class="card reveal">
            <div class="icon" aria-hidden="true">◆</div>
            <h3><?php echo esc_html($item[0]); ?></h3>
            <p><?php echo esc_html($item[1]); ?></p>
            <div class="card-actions">
              <a class="button-outline" href="#"><?php esc_html_e('Learn More', 'guardeons'); ?></a>
            </div>
          </article>
        <?php endforeach;
      endif; ?>
    </div>
  </div>
</section>