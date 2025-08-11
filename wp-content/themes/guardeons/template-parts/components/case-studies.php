<?php
/** Case Studies Section */
$industries = get_terms(['taxonomy' => 'industry', 'hide_empty' => true]);
?>
<section id="case-studies" class="section section-muted">
  <div class="container">
    <header class="section-header reveal">
      <h2 class="section-heading"><?php esc_html_e('Case Studies', 'guardeons'); ?></h2>
      <p class="section-sub"><?php esc_html_e('Proven results across industries.', 'guardeons'); ?></p>
    </header>
    <?php if (!is_wp_error($industries) && $industries) : ?>
      <div class="filters reveal" aria-label="Filters">
        <a class="button-outline" href="<?php echo esc_url(get_post_type_archive_link('case_study')); ?>"><?php esc_html_e('All', 'guardeons'); ?></a>
        <?php foreach ($industries as $term) : ?>
          <a class="button-outline" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <div class="grid-3">
      <?php
      $q = new WP_Query([
        'post_type' => 'case_study',
        'posts_per_page' => 6,
      ]);
      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post(); ?>
          <article class="card reveal">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('case-study-thumb'); ?></a>
            <?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 26); ?></p>
            <a class="button-outline" href="<?php the_permalink(); ?>"><?php esc_html_e('View Case Study', 'guardeons'); ?></a>
          </article>
        <?php endwhile; wp_reset_postdata();
      else: ?>
        <p><?php esc_html_e('Add case studies to showcase results.', 'guardeons'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>