<?php
/**
 * Front Page Template (Simplified)
 * @package guardeons
 */
get_header(); ?>
<main id="primary" class="site-main">
  <?php get_template_part('template-parts/components/hero'); ?>
  <?php get_template_part('template-parts/components/services'); ?>
  <?php get_template_part('template-parts/components/testimonials'); ?>
  <?php get_template_part('template-parts/components/about'); ?>
  <?php get_template_part('template-parts/components/contact'); ?>
</main>
<?php get_footer(); ?>
