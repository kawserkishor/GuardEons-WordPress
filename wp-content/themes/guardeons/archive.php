<?php
/** Archive template */
get_header(); ?>
<main id="primary" class="site-main container">
  <header class="page-header">
    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
  </header>
  <div class="grid-3">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
        <?php if (has_post_thumbnail()) : ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a><?php endif; ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-summary"><?php the_excerpt(); ?></div>
      </article>
    <?php endwhile; else: get_template_part('template-parts/content/content', 'none'); endif; ?>
  </div>
  <div class="pagination"><?php the_posts_pagination(); ?></div>
</main>
<?php get_footer(); ?>