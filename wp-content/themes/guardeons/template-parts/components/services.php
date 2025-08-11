<?php
/** Services Section */
?>
<section id="services" class="section services section-muted">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Our Services', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Practical solutions that secure and grow your business.', 'guardeons'); ?></p>
    </header>
    <div class="cards services-grid">
      <?php
      $q = new WP_Query([
        'post_type' => 'service',
        'posts_per_page' => 8,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ]);
      $fallback = [
        ['Web Design & Development', 'Designs that convert and sites that perform.', 'code', ['Responsive UX','CMS you control','Fast & SEO-ready']],
        ['Digital Marketing & SEO', 'Get found and turn traffic into revenue.', 'seo', ['Technical SEO','Content that ranks','Authority growth']],
        ['Domain & Web Hosting', 'Reliable, managed hosting with peace of mind.', 'server', ['Domain care','Managed servers','CDN & caching']],
        ['Penetration Testing & Security Audits', 'Find issues before attackers do.', 'shield', ['App & network tests','Fix plan & priorities','Compliance-ready']],
        ['Managed SOC Services', '24/7 monitoring and rapid response.', 'soc', ['SIEM visibility','Incident response','Threat intel']],
        ['IT Support & Consulting', 'Keep teams productive and systems stable.', 'headset', ['Helpdesk SLAs','Network & infra','Roadmaps']],
        ['Cloud Solutions & Migration', 'Secure, cost-efficient cloud.', 'cloud', ['Migrations','Cost control','Security hardening']],
        ['Cybersecurity Training', 'Build a strong security culture.', 'training', ['Phishing drills','Workshops','Playbooks']],
      ];

      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post(); ?>
          <article class="card reveal service-card">
            <div class="service-icon" aria-hidden="true"><?php echo function_exists('guardeons_get_icon_svg') ? guardeons_get_icon_svg('shield') : ''; ?></div>
            <h3><?php the_title(); ?></h3>
            <p><?php echo get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 20); ?></p>
            <div class="card-actions">
              <button type="button" class="button-outline service-toggle" aria-expanded="false"><?php esc_html_e('See Benefits', 'guardeons'); ?></button>
            </div>
            <div class="service-details" hidden>
              <?php echo wpautop(wp_kses_post(get_the_content())); ?>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata();
      else:
        foreach ($fallback as [$title, $desc, $icon, $bullets]) : ?>
          <article class="card reveal service-card">
            <div class="service-icon" aria-hidden="true"><?php echo function_exists('guardeons_get_icon_svg') ? guardeons_get_icon_svg($icon) : ''; ?></div>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
            <div class="card-actions">
              <button type="button" class="button-outline service-toggle" aria-expanded="false"><?php esc_html_e('See Benefits', 'guardeons'); ?></button>
            </div>
            <div class="service-details" hidden>
              <ul>
                <?php foreach ($bullets as $b) : ?><li><?php echo esc_html($b); ?></li><?php endforeach; ?>
              </ul>
            </div>
          </article>
        <?php endforeach;
      endif; ?>
    </div>
  </div>
</section>