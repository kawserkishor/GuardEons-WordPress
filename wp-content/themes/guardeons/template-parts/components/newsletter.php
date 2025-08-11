<?php
/** Newsletter Section */
$action = get_theme_mod('guardeons_newsletter_action', '');
?>
<section id="newsletter" class="section">
  <div class="container">
    <div class="grid-2">
      <div>
        <h2 class="section-heading"><?php esc_html_e('Stay Updated', 'guardeons'); ?></h2>
        <p class="section-sub"><?php esc_html_e('Subscribe to security insights and product updates.', 'guardeons'); ?></p>
      </div>
      <form class="reveal" method="post" action="<?php echo $action ? esc_url($action) : '#'; ?>" target="_blank" rel="noopener">
        <div class="form-grid">
          <div class="form-row">
            <label class="screen-reader-text" for="newsletter-email"><?php esc_html_e('Email address', 'guardeons'); ?></label>
            <input id="newsletter-email" type="email" name="EMAIL" placeholder="you@company.com" required />
          </div>
          <div class="form-row" style="align-self:end">
            <button type="submit" class="button"><?php esc_html_e('Subscribe', 'guardeons'); ?></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>