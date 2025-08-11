<?php
/**
 * Template Name: Careers
 */
get_header(); ?>
<main id="primary" class="site-main container">
  <?php get_template_part('template-parts/components/breadcrumbs'); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <header class="page-header"><h1 class="page-title"><?php the_title(); ?></h1></header>
    <div class="entry-content"><?php the_content(); ?></div>
  <?php endwhile; endif; ?>
  <?php get_template_part('template-parts/components/careers'); ?>
</main>
<?php get_footer(); ?>