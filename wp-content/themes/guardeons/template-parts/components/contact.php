<?php
/** Contact Section */
$email = get_theme_mod('guardeons_contact_email', get_bloginfo('admin_email'));
$phone = get_theme_mod('guardeons_contact_phone');
?>
<section id="contact" class="section contact">
  <div class="container contact-container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Let’s Talk', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Tell us about your needs. We’ll respond within one business day.', 'guardeons'); ?></p>
    </header>

    <form class="contact-form reveal" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="guardeons_contact" />
      <?php wp_nonce_field('guardeons_contact'); ?>

      <div class="form-group">
        <label for="service_interest"><?php esc_html_e('Service interested in', 'guardeons'); ?></label>
        <select id="service_interest" name="service_interest[]">
          <?php
          $services = [
            'Web Design & Development','Digital Marketing & SEO','Domain & Web Hosting','Penetration Testing & Security Audits',
            'Managed SOC Services','IT Support & Consulting','Cloud Solutions & Migration','Cybersecurity Training'
          ];
          foreach ($services as $svc) : ?>
            <option value="<?php echo esc_attr($svc); ?>"><?php echo esc_html($svc); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="project_details"><?php esc_html_e('Project details', 'guardeons'); ?></label>
        <textarea id="project_details" name="project_details" placeholder="e.g., New site with secure client portal, launch in Q3..."></textarea>
      </div>

      <div class="form-group">
        <label for="name"><?php esc_html_e('Full name', 'guardeons'); ?></label>
        <input id="name" type="text" name="name" required />
      </div>
      <div class="form-group">
        <label for="email"><?php esc_html_e('Email', 'guardeons'); ?></label>
        <input id="email" type="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="phone"><?php esc_html_e('Phone', 'guardeons'); ?></label>
        <input id="phone" type="tel" name="phone" />
      </div>

      <div style="margin-top:1rem">
        <button type="submit" class="button"><?php esc_html_e('Submit', 'guardeons'); ?></button>
      </div>
    </form>

    <div class="grid-3" style="margin-top:2rem">
      <div>
        <h3><?php esc_html_e('Contact', 'guardeons'); ?></h3>
        <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a><br>
        <?php if ($phone) : ?><a href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a><?php endif; ?></p>
        <?php $emergency = get_theme_mod('guardeons_emergency_phone'); if ($emergency): ?>
          <p><strong><?php esc_html_e('Emergency (24/7):', 'guardeons'); ?></strong> <a href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $emergency)); ?>"><?php echo esc_html($emergency); ?></a></p>
        <?php endif; ?>
      </div>
      <div>
        <h3><?php esc_html_e('Business Hours', 'guardeons'); ?></h3>
        <p><?php esc_html_e('Mon–Fri: 9am–6pm', 'guardeons'); ?><br><?php esc_html_e('Emergency support: 24/7', 'guardeons'); ?></p>
      </div>
      <div>
        <h3><?php esc_html_e('Address', 'guardeons'); ?></h3>
        <p><?php esc_html_e('Enter your office address here', 'guardeons'); ?></p>
      </div>
    </div>
    <?php $map = get_theme_mod('guardeons_map_embed_src'); if ($map): ?>
      <div class="reveal" style="margin-top:1rem">
        <iframe class="map-embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="<?php echo esc_url($map); ?>" allowfullscreen></iframe>
      </div>
    <?php endif; ?>
  </div>
</section>