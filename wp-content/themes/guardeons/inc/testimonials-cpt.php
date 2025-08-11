<?php
/** Register Testimonials CPT */
function guardeons_register_testimonials_cpt(){
    register_post_type('testimonial', [
        'label' => __('Testimonials', 'guardeons'),
        'labels' => [
            'name' => __('Testimonials', 'guardeons'),
            'singular_name' => __('Testimonial', 'guardeons'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'has_archive' => false,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'guardeons_register_testimonials_cpt');