<?php
/** Testimonials Section */
?>
<section id="testimonials" class="section">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('What Clients Say', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Trusted by teams across industries.', 'guardeons'); ?></p>
    </header>
    <div class="grid-3">
      <?php
      $exists = post_type_exists('testimonial');
      if ($exists) {
        $q = new WP_Query([
          'post_type' => 'testimonial',
          'posts_per_page' => 6,
        ]);
      }
      if ($exists && $q->have_posts()) :
        while ($q->have_posts()) : $q->the_post();
          $company = get_post_meta(get_the_ID(), 'company', true);
          ?>
          <blockquote class="card reveal" itemprop="review" itemscope itemtype="https://schema.org/Review">
            <p itemprop="reviewBody">“<?php echo esc_html(get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 28)); ?>”</p>
            <footer>
              <strong itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_title(); ?></span></strong>
              <?php if ($company) : ?><span class="help">— <?php echo esc_html($company); ?></span><?php endif; ?>
            </footer>
          </blockquote>
        <?php endwhile; wp_reset_postdata();
      else: ?>
        <blockquote class="card reveal"><p>“GuardEons elevated our security posture and delivered a lightning-fast site.”</p><footer><strong>CTO</strong> <span class="help">— FinTech Co.</span></footer></blockquote>
        <blockquote class="card reveal"><p>“Their SOC team is proactive and responsive. We sleep better at night.”</p><footer><strong>IT Director</strong> <span class="help">— Healthcare Org</span></footer></blockquote>
        <blockquote class="card reveal"><p>“From SEO to cloud migration, results exceeded expectations.”</p><footer><strong>Founder</strong> <span class="help">— SaaS Startup</span></footer></blockquote>
      <?php endif; ?>
    </div>
  </div>
</section>