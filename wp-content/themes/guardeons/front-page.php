<?php
/**
 * Front Page Template
 * @package guardeons
 */
get_header(); ?>
<main id="primary" class="site-main">
  <?php get_template_part('template-parts/components/hero'); ?>
  <?php get_template_part('template-parts/components/services'); ?>
  <?php get_template_part('template-parts/components/trust'); ?>
  <?php get_template_part('template-parts/components/stats'); ?>
  <?php get_template_part('template-parts/components/about'); ?>
  <?php get_template_part('template-parts/components/case-studies'); ?>
  <?php get_template_part('template-parts/components/testimonials'); ?>
  <?php get_template_part('template-parts/components/team'); ?>
  <?php get_template_part('template-parts/components/careers'); ?>
  <?php get_template_part('template-parts/components/blog'); ?>
  <?php get_template_part('template-parts/components/newsletter'); ?>
  <?php get_template_part('template-parts/components/contact'); ?>
</main>
<?php get_footer(); ?>
