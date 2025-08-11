<?php
/** Customizer additions: Newsletter */
function guardeons_customize_register_newsletter($wp_customize){
    $wp_customize->add_section('guardeons_newsletter', [
        'title' => __('Newsletter', 'guardeons'),
        'panel' => 'guardeons_theme_options',
    ]);
    $wp_customize->add_setting('guardeons_newsletter_action', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('guardeons_newsletter_action', [
        'label' => __('Form Action URL', 'guardeons'),
        'type' => 'url',
        'section' => 'guardeons_newsletter',
        'description' => __('Set the external endpoint (e.g., Mailchimp) to post newsletter signups.', 'guardeons'),
    ]);
}
add_action('customize_register', 'guardeons_customize_register_newsletter');