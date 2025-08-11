<?php
/** Services Section */
?>
<section id="services" class="section services section-muted">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Our Services', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Comprehensive digital solutions to secure and scale your business.', 'guardeons'); ?></p>
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
        ['Web Design & Development', 'Stunning, performant websites and apps built with modern stacks.', 'code', ['Responsive UX/UI','CMS integration','Performance & SEO']],
        ['Digital Marketing & SEO', 'Data-driven growth strategies, technical SEO, and content.', 'seo', ['Keyword research','On-page/Off-page SEO','Content strategy']],
        ['Domain & Web Hosting', 'Reliable domains, managed hosting, and performance tuning.', 'server', ['Domain management','Managed hosting','CDN & caching']],
        ['Penetration Testing & Security Audits', 'Proactive assessments to find and fix vulnerabilities.', 'shield', ['App & network testing','Remediation plan','Compliance mapping']],
        ['Managed SOC Services', '24/7 monitoring, detection, and rapid response.', 'soc', ['SIEM monitoring','Incident response','Threat intel']],
        ['IT Support & Consulting', 'End-user support, infrastructure, and strategic guidance.', 'headset', ['Helpdesk & SLA','Network & infra','IT roadmapping']],
        ['Cloud Solutions & Migration', 'Secure cloud architecture, migration, and optimization.', 'cloud', ['Migrations','Cost optimization','Security hardening']],
        ['Cybersecurity Training', 'Hands-on training to build a strong security culture.', 'training', ['Phishing simulations','Workshops','Playbooks']],
      ];

      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post(); ?>
          <article class="card reveal service-card">
            <div class="service-icon" aria-hidden="true"><?php echo function_exists('guardeons_get_icon_svg') ? guardeons_get_icon_svg('shield') : ''; ?></div>
            <h3><?php the_title(); ?></h3>
            <p><?php echo get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 22); ?></p>
            <div class="card-actions">
              <button type="button" class="button-outline service-toggle" aria-expanded="false"><?php esc_html_e('Learn More', 'guardeons'); ?></button>
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
              <button type="button" class="button-outline service-toggle" aria-expanded="false"><?php esc_html_e('Learn More', 'guardeons'); ?></button>
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