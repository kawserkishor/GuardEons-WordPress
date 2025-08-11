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
          <?php if (is_active_sidebar('footer-1')) { dynamic_sidebar('footer-1'); } ?>
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
