<?php
/**
 * Main template file
 * @package guardeons
 */
get_header(); ?>
<main id="primary" class="site-main container">
<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile;
    the_posts_navigation();
else : ?>
    <section class="no-results not-found">
        <h2><?php esc_html_e('Nothing Found', 'guardeons'); ?></h2>
        <p><?php esc_html_e('It seems we can’t find what you’re looking for.', 'guardeons'); ?></p>
        <?php get_search_form(); ?>
    </section>
<?php endif; ?>
</main>
<?php get_footer(); ?>
