<?php
/**
 * The template for displaying the footer
 * @package guardeons
 */
?>
    </div><!-- #content -->
    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="container footer-widgets">
        <div class="footer-col">
          <?php if (is_active_sidebar('footer-1')) { dynamic_sidebar('footer-1'); } else: ?>
            <div class="footer-defaults">
              <div>
                <h4><?php bloginfo('name'); ?></h4>
                <p><?php echo esc_html(get_bloginfo('description')); ?></p>
                <?php $phone = get_theme_mod('guardeons_contact_phone'); $email = get_theme_mod('guardeons_contact_email', get_bloginfo('admin_email')); ?>
                <p><?php if ($phone): ?><a href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a><br><?php endif; ?><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
              </div>
              <div>
                <h4><?php esc_html_e('Company', 'guardeons'); ?></h4>
                <ul>
                  <li><a href="<?php echo esc_url(home_url('/#about')); ?>"><?php esc_html_e('About', 'guardeons'); ?></a></li>
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('case_study')); ?>"><?php esc_html_e('Case Studies', 'guardeons'); ?></a></li>
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('job_opening')); ?>"><?php esc_html_e('Careers', 'guardeons'); ?></a></li>
                </ul>
              </div>
              <div>
                <h4><?php esc_html_e('Resources', 'guardeons'); ?></h4>
                <ul>
                  <li><a href="<?php echo esc_url(home_url('/#services')); ?>"><?php esc_html_e('Services', 'guardeons'); ?></a></li>
                  <li><a href="<?php echo esc_url(home_url('/#contact')); ?>"><?php esc_html_e('Contact', 'guardeons'); ?></a></li>
                  <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php esc_html_e('Blog', 'guardeons'); ?></a></li>
                </ul>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="footer-col">
          <?php if (is_active_sidebar('footer-2')) { dynamic_sidebar('footer-2'); } ?>
        </div>
        <div class="footer-col">
          <?php if (is_active_sidebar('footer-3')) { dynamic_sidebar('footer-3'); } ?>
        </div>
      </div>
      <div class="container footer-bottom">
        <nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'guardeons'); ?>">
          <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false]); ?>
        </nav>
        <nav class="social-navigation" aria-label="<?php esc_attr_e('Social Links Menu', 'guardeons'); ?>">
          <?php wp_nav_menu([
            'theme_location' => 'social',
            'container' => false,
            'link_before' => '<span class="screen-reader-text">',
            'link_after' => '</span>',
          ]); ?>
        </nav>
        <p class="site-info">&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'guardeons'); ?></p>
      </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>
