<?php
/** Hero Section */
?>
<section id="home" class="hero section-dark">
  <div class="container hero-inner">
    <div class="hero-copy reveal">
      <h1 class="hero-title">Secure Your Digital Future with GuardEons</h1>
      <p class="hero-sub"><?php echo esc_html__('End-to-end IT services and cybersecurity solutions: from web development and cloud to SOC and penetration testing. We protect and grow your digital business.', 'guardeons'); ?></p>
      <div class="metrics">
        <div class="metric"><span class="counter" data-target="15">0</span><span class="suffix">+</span><div class="label"><?php esc_html_e('Years Experience', 'guardeons'); ?></div></div>
        <div class="metric"><span class="counter" data-target="200">0</span><span class="suffix">+</span><div class="label"><?php esc_html_e('Projects Delivered', 'guardeons'); ?></div></div>
        <div class="metric"><span class="counter" data-target="99.9">0</span><span class="suffix">%</span><div class="label"><?php esc_html_e('Uptime', 'guardeons'); ?></div></div>
      </div>
      <div class="hero-actions">
        <a href="#contact" class="button"><?php esc_html_e('Get Started', 'guardeons'); ?></a>
        <a href="#services" class="button secondary"><?php esc_html_e('View Our Services', 'guardeons'); ?></a>
      </div>
      <div class="hero-badges" aria-label="Trust indicators">
        <span class="badge">ISO 27001</span>
        <span class="badge">OWASP</span>
        <span class="badge">CIS Controls</span>
        <span class="badge">AWS Partner</span>
      </div>
    </div>
    <div class="hero-visual reveal">
      <div class="particles">
        <canvas id="hero-particles" aria-hidden="true"></canvas>
      </div>
      <div class="hero-illustration" aria-hidden="true" style="height:320px;background:radial-gradient(120px 120px at 40% 40%, rgba(255,255,255,.12), transparent), linear-gradient(145deg, rgba(0,230,118,.25), transparent 60%);border-radius:1rem;border:1px solid rgba(255,255,255,.15)"></div>
    </div>
  </div>
</section>
<style>
.badge{display:inline-flex;align-items:center;gap:.4rem;border:1px solid rgba(255,255,255,.25);padding:.35rem .6rem;border-radius:999px;font-size:.85rem;color:#e2f5ef}
</style>