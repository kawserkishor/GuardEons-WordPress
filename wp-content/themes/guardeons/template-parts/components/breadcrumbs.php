<?php
/** Breadcrumbs */
function guardeons_render_breadcrumbs(){
  if (is_front_page()) return;
  echo '<nav class="breadcrumbs" aria-label="Breadcrumbs"><ol>';
  echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'guardeons') . '</a></li>';
  if (is_singular()) {
    $post_type = get_post_type_object(get_post_type());
    if ($post_type && $post_type->has_archive) {
      echo '<li><a href="' . esc_url(get_post_type_archive_link($post_type->name)) . '">' . esc_html($post_type->labels->name) . '</a></li>';
    }
    echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
  } elseif (is_archive()) {
    echo '<li aria-current="page">' . esc_html(get_the_archive_title()) . '</li>';
  } elseif (is_search()) {
    echo '<li aria-current="page">' . esc_html__('Search', 'guardeons') . '</li>';
  } elseif (is_404()) {
    echo '<li aria-current="page">' . esc_html__('Not Found', 'guardeons') . '</li>';
  }
  echo '</ol></nav>';
}

guardeons_render_breadcrumbs();