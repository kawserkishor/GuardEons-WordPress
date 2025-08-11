<?php
/** Contact Section */
$email = get_theme_mod('guardeons_contact_email', get_bloginfo('admin_email'));
$phone = get_theme_mod('guardeons_contact_phone');
?>
<section id="contact" class="section section-dark">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Let’s Talk', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Tell us about your needs. We’ll respond within one business day.', 'guardeons'); ?></p>
    </header>

    <form class="contact-form reveal" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="guardeons_contact" />
      <?php wp_nonce_field('guardeons_contact'); ?>

      <fieldset class="form-step" aria-label="Service interests">
        <legend><?php esc_html_e('Which services are you interested in?', 'guardeons'); ?></legend>
        <div class="grid-4">
          <?php
          $services = [
            'Web Design & Development','Digital Marketing & SEO','Domain & Web Hosting','Penetration Testing & Security Audits',
            'Managed SOC Services','IT Support & Consulting','Cloud Solutions & Migration','Cybersecurity Training'
          ];
          foreach ($services as $svc) : ?>
            <label class="card" style="cursor:pointer">
              <input type="checkbox" name="service_interest[]" value="<?php echo esc_attr($svc); ?>" />
              <span><?php echo esc_html($svc); ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </fieldset>

      <fieldset class="form-step" aria-label="Project details">
        <legend><?php esc_html_e('Project details', 'guardeons'); ?></legend>
        <div class="form-row">
          <label for="project_details"><?php esc_html_e('Briefly describe your goals and timeline', 'guardeons'); ?></label>
          <textarea id="project_details" name="project_details" placeholder="e.g., New site with secure client portal, launch in Q3..."></textarea>
        </div>
        <div class="form-row">
          <label for="budget_range"><?php esc_html_e('Budget range', 'guardeons'); ?></label>
          <select id="budget_range" name="budget_range">
            <option value="" disabled selected><?php esc_html_e('Select...', 'guardeons'); ?></option>
            <option value="< $5k">< $5k</option>
            <option value="$5k–$15k">$5k–$15k</option>
            <option value="$15k–$50k">$15k–$50k</option>
            <option value="> $50k">> $50k</option>
          </select>
        </div>
      </fieldset>

      <fieldset class="form-step" aria-label="Contact information">
        <legend><?php esc_html_e('Contact information', 'guardeons'); ?></legend>
        <div class="form-grid">
          <div class="form-row">
            <label for="name"><?php esc_html_e('Full name', 'guardeons'); ?></label>
            <input id="name" type="text" name="name" required />
          </div>
          <div class="form-row">
            <label for="company"><?php esc_html_e('Company', 'guardeons'); ?></label>
            <input id="company" type="text" name="company" />
          </div>
          <div class="form-row">
            <label for="email"><?php esc_html_e('Email', 'guardeons'); ?></label>
            <input id="email" type="email" name="email" required />
          </div>
          <div class="form-row">
            <label for="phone"><?php esc_html_e('Phone', 'guardeons'); ?></label>
            <input id="phone" type="tel" name="phone" />
          </div>
        </div>
      </fieldset>

      <div style="margin-top:1rem">
        <button type="submit" class="button"><?php esc_html_e('Submit', 'guardeons'); ?></button>
      </div>
    </form>

    <div class="grid-3" style="margin-top:2rem">
      <div>
        <h3><?php esc_html_e('Contact', 'guardeons'); ?></h3>
        <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a><br>
        <?php if ($phone) : ?><a href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a><?php endif; ?></p>
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
  </div>
</section>
<script>
// Simple progressive enhancement for multi-step feel
(function(){
  var steps = document.querySelectorAll('.contact-form fieldset');
  if (!steps.length) return;
  steps.forEach(function(fs, i){ if (i>0) fs.style.display = 'none'; });
  var current = 0;
  var submit = document.querySelector('.contact-form button[type="submit"]');
  if (!submit) return;
  var nextBtn = document.createElement('button');
  nextBtn.type = 'button'; nextBtn.className = 'button button-outline'; nextBtn.textContent = '<?php echo esc_js(__('Next', 'guardeons')); ?>';
  steps[0].appendChild(nextBtn);
  nextBtn.addEventListener('click', function(){ steps[current].style.display = 'none'; current = Math.min(current+1, steps.length-1); steps[current].style.display = ''; if (current === steps.length-1) nextBtn.remove(); });
})();
</script>